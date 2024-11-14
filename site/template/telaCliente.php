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
                <h4 class="card-title">Lista de Clientes</h4>
            </div>
            <div class="card-body">
                <table id="tableCliente" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Nome</th>
                            <th style="text-align: center;">CPF</th>
                            <th style="text-align: center;">Email</th>
                            <th style="text-align: center;">Telefone</th>
                            <th style="text-align: center;">Data de Nascimento</th>
                            <th style="text-align: center;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = dadosClientes();
                        while ($dados = $query->fetch_assoc()) {
                        ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $dados['nome']; ?></td>
                                <td style="text-align: center;"><?php echo $dados['cpf']; ?></td>
                                <td style="text-align: center;"><?php echo $dados['email']; ?></td>
                                <td style="text-align: center;"><?php echo $dados['telefone']; ?></td>
                                <td style="text-align: center;"><?php echo date('d/m/Y', strtotime($dados['data_nascimento'])); ?></td>
                                <td style="text-align: center;">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalCliente"
                                        data-id="<?php echo $dados['id']; ?>"
                                        data-nome="<?php echo $dados['nome']; ?>"
                                        data-cpf="<?php echo $dados['cpf']; ?>"
                                        data-email="<?php echo $dados['email']; ?>"
                                        data-telefone="<?php echo $dados['telefone']; ?>"
                                        data-data-nascimento="<?php echo date('d/m/Y', strtotime($dados['data_nascimento'])) ?>"
                                        data-estado-civil="<?php echo $dados['estado_civil']; ?>"
                                        data-profissao="<?php echo $dados['profissao']; ?>"
                                        data-cep="<?php echo $dados['cep']; ?>"
                                        data-rua="<?php echo $dados['rua']; ?>"
                                        data-bairro="<?php echo $dados['bairro']; ?>"
                                        data-cidade="<?php echo $dados['cidade']; ?>"
                                        data-estado="<?php echo $dados['estado']; ?>"
                                        data-numero="<?php echo $dados['numero']; ?>"
                                        data-status="<?php echo $dados['status']; ?>"><i class="fa fa-chevron-down"></i></button>

                                    <a href="../site/scripts/del_Cliente.php?id=<?php echo $dados['id']; ?>" class="btn btn-danger delFunci" title="Excluir">
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
                            <th style="text-align: center;">Nome</th>
                            <th style="text-align: center;">CPF</th>
                            <th style="text-align: center;">Email</th>
                            <th style="text-align: center;">Telefone</th>
                            <th style="text-align: center;">Data de Nascimento</th>
                            <th style="text-align: center;">Ações</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="ModalCliente">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalhes do Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <small class="text-muted">Clique duas vezes no campo para editar</small>
                <form id="modalCliente" class="row g-3" method="POST" action="scripts/atualizar_cliente.php">
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
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" readonly ondblclick="tornarEditavel(this)">
                    </div>

                    <div class="col-md-6">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" id="telefone" name="telefone" class="form-control" readonly ondblclick="tornarEditavel(this)">
                    </div>

                    <div class="col-md-6">
                        <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                        <input type="text" name="data_nascimento" class="form-control" readonly ondblclick="tornarEditavel(this)">
                    </div>

                    <div class="col-md-6">
                        <label for="estado_civil" class="form-label">Estado Civil</label>
                        <select required name="estado_civil" class="form-control" id="opcao" onchange="habilitarCampo()" readonly ondblclick="tornarEditavel(this)">
                            <option value="">Selecione</option>
                            <option value="solteiro">Solteiro(a)</option>
                            <option value="casado">Casado(a)</option>
                            <option value="viuvo">Viúvo(a)</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="profissao" class="form-label">Profissão</label>
                        <select required name="profissao" class="form-control" id="opcao" onchange="habilitarCampo()" readonly ondblclick="tornarEditavel(this)">
                            <option value="">Selecione profissão</option>
                            <option value="secretario">Secretario(a)</option>
                            <option value="advogado">Advogado(a)</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="cep" class="form-label">CEP</label>
                        <input type="text" name="cep" id="cep" class="form-control" readonly onchange="pesquisacep(this.value)" ondblclick="tornarEditavel(this)">
                    </div>
                    <div class="col-md-6">
                        <label for="numero" class="form-label">Numero</label>
                        <input type="text" name="numero" class="form-control" readonly ondblclick="tornarEditavel(this)">
                    </div>

                    <div class="col-md-6">
                        <label for="rua" class="form-label">Rua</label>
                        <input type="text" name="rua" id="rua" class="form-control" readonly ondblclick="tornarEditavel(this)">
                    </div>

                    <div class="col-md-6">
                        <label for="bairro" class="form-label">Bairro</label>
                        <input type="text" name="bairro" id="bairro" class="form-control" readonly ondblclick="tornarEditavel(this)">
                    </div>

                    <div class="col-md-6">
                        <label for="cidade" class="form-label">Cidade</label>
                        <input type="text" name="cidade" id="cidade" class="form-control" readonly ondblclick="tornarEditavel(this)">
                    </div>

                    <div class="col-md-6">
                        <label for="estado" class="form-label">Estado</label>
                        <input type="text" name="estado" id="estado" class="form-control" readonly ondblclick="tornarEditavel(this)">
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
    var modalCliente = document.getElementById('ModalCliente');
    modalCliente.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;

        var id = button.getAttribute('data-id');
        var nome = button.getAttribute('data-nome');
        var cpf = button.getAttribute('data-cpf');
        var email = button.getAttribute('data-email');
        var telefone = button.getAttribute('data-telefone');
        var estadoCivil = button.getAttribute('data-estado-civil');
        var profissao = button.getAttribute('data-profissao');
        var cep = button.getAttribute('data-cep');
        var numero = button.getAttribute('data-numero');
        var rua = button.getAttribute('data-rua');
        var bairro = button.getAttribute('data-bairro');
        var cidade = button.getAttribute('data-cidade');
        var estado = button.getAttribute('data-estado');

        var dataNascimento = button.getAttribute('data-data-nascimento');
        
        
        modalCliente.querySelector('input[name="id"]').value = id;
        modalCliente.querySelector('input[name="nome"]').value = nome;
        modalCliente.querySelector('input[name="cpf"]').value = cpf;
        modalCliente.querySelector('input[name="email"]').value = email;
        modalCliente.querySelector('input[name="telefone"]').value = telefone;
        modalCliente.querySelector('input[name="data_nascimento"]').value = dataNascimento;
        modalCliente.querySelector('select[name="estado_civil"]').value = estadoCivil;
        modalCliente.querySelector('select[name="profissao"]').value = profissao;
        modalCliente.querySelector('input[name="cep"]').value = cep;
        modalCliente.querySelector('input[name="numero"]').value = numero;
        modalCliente.querySelector('input[name="rua"]').value = rua;
        modalCliente.querySelector('input[name="bairro"]').value = bairro;
        modalCliente.querySelector('input[name="cidade"]').value = cidade;
        modalCliente.querySelector('input[name="estado"]').value = estado;
    });

    function tornarEditavel(campo) {
        campo.readOnly = false;
        campo.classList.add("editavel");
    }
</script>

<script>
    document.getElementById('ModalCliente').addEventListener('submit', function(event) {
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


    document.querySelectorAll('.delCliente').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Confirmar Exclusão',
                text: "Tem certeza de que deseja excluir este Cliente?",
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
        document.querySelector('#ModalCliente #rua').value = "";
        document.querySelector('#ModalCliente #bairro').value = "";
        document.querySelector('#ModalCliente #cidade').value = "";
        document.querySelector('#ModalCliente #estado').value = "";
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            document.querySelector('#ModalCliente #rua').value = conteudo.logradouro;
            document.querySelector('#ModalCliente #bairro').value = conteudo.bairro;
            document.querySelector('#ModalCliente #cidade').value = conteudo.localidade;
            document.querySelector('#ModalCliente #estado').value = conteudo.uf;
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
                document.querySelector('#ModalCliente #rua').value = "...";
                document.querySelector('#ModalCliente #bairro').value = "...";
                document.querySelector('#ModalCliente #cidade').value = "...";
                document.querySelector('#ModalCliente #estado').value = "...";

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