<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Lista de Funcionarios</h4>
            </div>
            <div class="card-body">
                <table id="tableFunci" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th style="text-align: center;"> Nome</th>
                            <th style="text-align: center;">CPF</th>
                            <th style="text-align: center;">Perfil</th>
                            <th style="text-align: center;">Número da OAB</th>
                            <th style="text-align: center;">Email</th>
                            <th style="text-align: center;">Telefone</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = dadosFunc();
                        while ($dados = $query->fetch_array()) {
                        ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $dados['nome']; ?></td>
                                <td style="text-align: center;"><?php echo $dados['cpf']; ?></td>
                                <td style="text-align: center;"><?php echo $dados['perfil']; ?></td>
                                <td style="text-align: center;"><?php echo $dados['numero_oab']; ?></td>
                                <td style="text-align: center;"><?php echo $dados['email']; ?></td>
                                <td style="text-align: center;"><?php echo $dados['telefone']; ?></td>
                                <td style="text-align: center;"><?php echo $dados['status']; ?></td>
                                <td style="text-align: center;">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modalfunci" data-id="<?php echo $dados['id']; ?>"
                                        data-nome="<?php echo $dados['nome']; ?>"
                                        data-cpf="<?php echo $dados['cpf']; ?>"
                                        data-perfil="<?php echo $dados['perfil']; ?>"
                                        data-numeroOAB="<?php echo $dados['numero_oab']; ?>"
                                        data-email="<?php echo $dados['email']; ?>"
                                        data-telefone="<?php echo $dados['telefone']; ?>"
                                        data-cep="<?php echo $dados['cep']; ?>"
                                        data-numero="<?php echo $dados['numero']; ?>"
                                        data-status="<?php echo $dados['status']; ?>"><i class="fa fa-pencil"></i></button>

                                    <a href="scripts/del_funci.php?id=<?php echo $dados['id']; ?>" class="btn btn-danger" title="Excluir">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th style="text-align: center;"> Nome</th>
                            <th style="text-align: center;">CPF</th>
                            <th style="text-align: center;">Perfil</th>
                            <th style="text-align: center;">Número da OAB</th>
                            <th style="text-align: center;">Email</th>
                            <th style="text-align: center;">Telefone</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Editar</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="Modalfunci">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Funcionario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" method="POST" action="scripts/atualizar_funci.php">
                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Nome</label>
                        <input type="text" required name="nome" class="form-control" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCep" class="form-label">CPF</label>
                        <input type="text" required id="cpf" name="cpf" class="form-control" placeholder="000.000.000-00" maxlength="14" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPerfil" class="form-label">Perfil</label>
                        <select required name="perfil" class="form-control" id="opcao" onchange="habilitarCampo()">
                            <option value="">Selecione um perfil</option>
                            <option value="advogado">Advogado</option>
                            <option value="secretaria">Secretaria</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Número da OAB</label>
                        <input type="num" id="numOAB" required name="numeroOAB" class="form-control" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Email</label>
                        <input type="text" required name="email" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Telefone</label>
                        <input type="text" id="telefone" required name="telefone" class="form-control" placeholder="(00)00000-0000">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCep" class="form-label">CEP</label>
                        <input type="text" id="cep" required name="cep" class="form-control" placeholder="00000-000" onblur="pesquisacep(this.value)">
                    </div>
                    <div class="col-md-6">
                        <label for="inputRua" class="form-label">Número</label>
                        <input type="text" required name="numero" id="numero" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="inputRua" class="form-label">Rua</label>
                        <input type="text" required name="rua" id="rua" class="form-control" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="inputBairro" class="form-label">Bairro</label>
                        <input type="text" required name="bairro" id="bairro" class="form-control" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCidade" class="form-label">Cidade</label>
                        <input type="text" required name="cidade" id="cidade" class="form-control" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEstado" class="form-label">Estado</label>
                        <input type="text" required name="estado" id="estado" class="form-control" readonly>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
            </div>
            </form>
        </div>

    </div>
</div>

<script>
    function habilitarCampo() {
        const select = document.getElementById("opcao");
        const imput = document.getElementById("numOAB");
        if (select.value === "advogado") {
            imput.disabled = false;
        } else {
            imput.disabled = true;
        }
    }
</script>

<script>
    function limpa_formulário_cep() {
        document.getElementById('rua').value = "";
        document.getElementById('bairro').value = "";
        document.getElementById('cidade').value = "";
        document.getElementById('estado').value = "";
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            document.getElementById('rua').value = conteudo.logradouro;
            document.getElementById('bairro').value = conteudo.bairro;
            document.getElementById('cidade').value = conteudo.localidade;
            document.getElementById('estado').value = conteudo.uf;
        } else {
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {
        var cep = valor.replace(/\D/g, '');
        if (cep != "") {
            var validacep = /^[0-9]{8}$/;
            if (validacep.test(cep)) {
                document.getElementById('rua').value = "...";
                document.getElementById('bairro').value = "...";
                document.getElementById('cidade').value = "...";
                document.getElementById('estado').value = "...";

                var script = document.createElement('script');
                script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';
                document.body.appendChild(script);
            } else {
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } else {
            limpa_formulário_cep();
        }
    }
</script>

<script>
    var modal = document.getElementById('Modalfunci');
    modal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;

        var id = button.getAttribute('data-id');
        var nome = button.getAttribute('data-nome');
        var cpf = button.getAttribute('data-cpf');
        var perfil = button.getAttribute('data-perfil');
        var numeroOAB = button.getAttribute('data-numeroOAB');
        var email = button.getAttribute('data-email');
        var telefone = button.getAttribute('data-telefone');
        var status = button.getAttribute('data-status');
        var cep = button.getAttribute('data-cep');
        var numero = button.getAttribute('data-numero');

        console.log('Nome:', nome);
        console.log('CPF:', cpf);
    

        modal.querySelector('input[name="nome"]').value = nome;
        modal.querySelector('input[name="cpf"]').value = cpf;
        modal.querySelector('select[name="perfil"]').value = perfil;
        modal.querySelector('input[name="numeroOAB"]').value = numeroOAB;
        modal.querySelector('input[name="email"]').value = email;
        modal.querySelector('input[name="telefone"]').value = telefone;
        modal.querySelector('input[name="cep"]').value = cep;
        modal.querySelector('input[name="numero"]').value = numero;

        var form = modal.querySelector('form');
        var idInput = document.createElement('input');
        idInput.type = 'hidden';
        idInput.name = 'id';
        idInput.value = id;
        form.appendChild(idInput);
    });
</script>