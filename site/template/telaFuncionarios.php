<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Suits</title>
</head>

<body>

</body>

</html>
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
                                <td style="text-align: center;"><?php echo $dados['email']; ?></td>
                                <td style="text-align: center;"><?php echo $dados['telefone']; ?></td>
                                <td style="text-align: center;"><?php echo $dados['status']; ?></td>
                                <td style="text-align: center;">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modalfunci" data-id="<?php echo $dados['id']; ?>"
                                        data-nome="<?php echo $dados['nome']; ?>"
                                        data-cpf="<?php echo $dados['cpf']; ?>"
                                        data-perfil="<?php echo $dados['perfil']; ?>"
                                        data-numeroOAB="<?php echo $dados['numero_oab']; ?>"
                                        data-especializacao="<?php echo $dados['especializacao']; ?>"
                                        data-email="<?php echo $dados['email']; ?>"
                                        data-telefone="<?php echo $dados['telefone']; ?>"
                                        data-cep="<?php echo $dados['cep']; ?>"
                                        data-rua="<?php echo $dados['rua']; ?>"
                                        data-bairro="<?php echo $dados['bairro']; ?>"
                                        data-cidade="<?php echo $dados['cidade']; ?>"
                                        data-estado="<?php echo $dados['estado']; ?>"
                                        data-numero="<?php echo $dados['numero']; ?>"
                                        data-status="<?php echo $dados['status']; ?>"><i class="fa fa-chevron-down"></i></button>

                                    <a href="../site/scripts/del_funci.php?id=<?php echo $dados['id']; ?>" class="btn btn-danger delFunci" title="Excluir">
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
                <h5 class="modal-title">Detalhes do Funcionário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <small class="text-muted">Clique duas vezes no campo para editar</small>
                <form id="modalFunci" class="row g-3" method="POST" action="scripts/atualizar_funci.php">
                    <input type="hidden" name="id" value="">
                    <div class="col-md-12">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control" readonly ondblclick="tornarEditavel(this)">
                    </div>
                    <div class="col-md-6">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" id="cpf" name="cpf" class="form-control" readonly ondblclick="tornarEditavel(this)">
                    </div>
                    <div class="col-md-6">
                        <label for="perfil" class="form-label">Perfil</label>
                        <select name="perfil" class="form-control" id="opcao" onchange="habilitarCampo()" ondblclick="tornarEditavel(this)">
                            <option value="">Selecione um perfil</option>
                            <option value="advogado">Advogado</option>
                            <option value="secretaria">Secretaria</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="numeroOAB" class="form-label">Número da OAB</label>
                        <input type="text" id="numOAB" name="numeroOAB" class="form-control" readonly ondblclick="tornarEditavel(this)">
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="especializacao" class="form-label">Especialização</label>
                        <select required name="especializacao" class="form-control" id="especializacao" readonly ondblclick="tornarEditavel(this)">
                            <option value="">Selecione uma especialização</option>
                            <option value="direito_civil">Direito Civil</option>
                            <option value="direito_penal">Direito Penal</option>
                            <option value="direito_trabalhista">Direito Trabalhista</option>
                            <option value="direito_tributario">Direito Tributário</option>
                            <option value="direito_empresarial">Direito Empresarial</option>
                            <option value="direito_administrativo">Direito Administrativo</option>
                            <option value="direito_ambiental">Direito Ambiental</option>
                            <option value="direito_familia">Direito de Família</option>
                            <option value="direito_internacional">Direito Internacional</option>
                            <option value="direito_consumidor">Direito do Consumidor</option>
                            <option value="direito_imobiliario">Direito Imobiliário</option>
                            <option value="direito_digital">Direito Digital</option>
                            <option value="direito_bancario">Direito Bancário</option>
                            <option value="direito_previdenciario">Direito Previdenciário</option>
                            <option value="direito_propriedade_intelectual">Direito de Propriedade Intelectual</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" readonly ondblclick="tornarEditavel(this)">
                    </div>
                    <div class="col-md-6">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" id="telefone" name="telefone" class="form-control" readonly ondblclick="tornarEditavel(this)">
                    </div>
                    <div class="col-md-6">
                        <label for="cep" class="form-label">CEP</label>
                        <input type="text" id="cep" name="cep" class="form-control" onchange="pesquisacep(this.value)" readonly ondblclick="tornarEditavel(this)">
                    </div>

                    <div class="col-md-6">
                        <label for="numero" class="form-label">Número</label>
                        <input type="text" name="numero" class="form-control" readonly ondblclick="tornarEditavel(this)">
                    </div>
                    <div class="col-md-6">
                        <label for="rua" class="form-label">Rua</label>
                        <input type="text" id="rua" name="rua" class="form-control" readonly ondblclick="tornarEditavel(this)">
                    </div>
                    <div class="col-md-6">
                        <label for="bairro" class="form-label">Bairro</label>
                        <input type="text" id="bairro" name="bairro" class="form-control" readonly ondblclick="tornarEditavel(this)">
                    </div>
                    <div class="col-md-6">
                        <label for="cidade" class="form-label">Cidade</label>
                        <input type="text" id="cidade" name="cidade" class="form-control" readonly ondblclick="tornarEditavel(this)">
                    </div>
                    <div class="col-md-6">
                        <label for="estado" class="form-label">Estado</label>
                        <input type="text" id="estado" name="estado" class="form-control" readonly ondblclick="tornarEditavel(this)">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('modalFunci').addEventListener('submit', function(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Confirmar Alterações',
            text: "Tem certeza de que deseja salvar as alterações?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, salvar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.submit();
            }
        });
    });

    
    document.querySelectorAll('.delFunci').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();

            Swal.fire({
                title: 'Confirmar Exclusão',
                text: "Tem certeza de que deseja excluir este funcionário?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, excluir',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = button.href; 
                }
            });
        });
    });
</script>

<script>
    function tornarEditavel(campo) {
        campo.readOnly = false;
        campo.classList.add("editavel");
    }


    var modal = document.getElementById('Modalfunci');
    modal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;


        var id = button.getAttribute('data-id');
        var nome = button.getAttribute('data-nome');
        var cpf = button.getAttribute('data-cpf');
        var perfil = button.getAttribute('data-perfil');
        var numeroOAB = button.getAttribute('data-numeroOAB');
        var especializacao = button.getAttribute('data-especializacao');
        var email = button.getAttribute('data-email');
        var telefone = button.getAttribute('data-telefone');
        var cep = button.getAttribute('data-cep');
        var numero = button.getAttribute('data-numero');
        var rua = button.getAttribute('data-rua');
        var bairro = button.getAttribute('data-bairro');
        var cidade = button.getAttribute('data-cidade');
        var estado = button.getAttribute('data-estado');


        modal.querySelector('input[name="id"]').value = id;
        modal.querySelector('input[name="nome"]').value = nome;
        modal.querySelector('input[name="cpf"]').value = cpf;
        modal.querySelector('select[name="perfil"]').value = perfil;
        modal.querySelector('input[name="numeroOAB"]').value = numeroOAB;
        modal.querySelector('select[name="especializacao"]').value = especializacao;
        modal.querySelector('input[name="email"]').value = email;
        modal.querySelector('input[name="telefone"]').value = telefone;
        modal.querySelector('input[name="cep"]').value = cep;
        modal.querySelector('input[name="numero"]').value = numero;
        modal.querySelector('input[name="rua"]').value = rua;
        modal.querySelector('input[name="bairro"]').value = bairro;
        modal.querySelector('input[name="cidade"]').value = cidade;
        modal.querySelector('input[name="estado"]').value = estado;

        habilitarCampo();
    });
</script>




<script>
    function habilitarCampo() {
        const select = document.getElementById("opcao");
        const imput = document.getElementById("numOAB");
        const imputEsp = document.getElementById("especializacao");
        if (select.value === "advogado") {
            imput.disabled = false;
            imputEsp.disabled = false;
        } else {
            imput.disabled = true;
            imputEsp.disabled = true;
        }
    }
</script>

<script>
    function limpa_formulário_cep() {
        document.querySelector('#Modalfunci #rua').value = "";
        document.querySelector('#Modalfunci #bairro').value = "";
        document.querySelector('#Modalfunci #cidade').value = "";
        document.querySelector('#Modalfunci #estado').value = "";
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            document.querySelector('#Modalfunci #rua').value = conteudo.logradouro;
            document.querySelector('#Modalfunci #bairro').value = conteudo.bairro;
            document.querySelector('#Modalfunci #cidade').value = conteudo.localidade;
            document.querySelector('#Modalfunci #estado').value = conteudo.uf;
        } else {
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {
        var cep = valor.replace(/\D/g, '');
        if (cep !== "") {
            var validacep = /^[0-9]{8}$/;
            if (validacep.test(cep)) {
                document.querySelector('#Modalfunci #rua').value = "...";
                document.querySelector('#Modalfunci #bairro').value = "...";
                document.querySelector('#Modalfunci #cidade').value = "...";
                document.querySelector('#Modalfunci #estado').value = "...";

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