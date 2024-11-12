<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Suits - Processos</title>
</head>

<body>
</body>

</html>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Lista de Processos</h4>
            </div>
            <div class="card-body">
                <table id="tableProcessos" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Cliente</th>
                            <th style="text-align: center;">Número do Processo</th>
                            <th style="text-align: center;">Data</th>
                            <th style="text-align: center;">Horário</th>
                            <th style="text-align: center;">Vara</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $query = dadosProcessos();

                        while ($dados = $query->fetch_array()) {
                        ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $dados['cliente_nome']; ?></td>
                                <td style="text-align: center;"><?php echo $dados['numero_processo']; ?></td>
                                <td style="text-align: center;"><?php echo date('d-m-Y', strtotime($dados['data'])); ?></td>
                                <td style="text-align: center;"><?php echo $dados['horario']; ?></td>
                                <td style="text-align: center;"><?php echo $dados['vara']; ?></td>
                                <td style="text-align: center;"><?php echo $dados['status_process']; ?></td>
                                <td style="text-align: center;">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalProcesso" data-id="<?php echo $dados['id']; ?>"
                                        data-cliente_nome="<?php echo $dados['cliente_nome']; ?>"
                                        data-numero_processo="<?php echo $dados['numero_processo']; ?>"
                                        data-data="<?php echo $dados['data']; ?>"
                                        data-horario="<?php echo $dados['horario']; ?>"
                                        data-vara="<?php echo $dados['vara']; ?>"
                                        data-status-process="<?php echo $dados['status_process']; ?>"
                                        data-cliente_cpf="<?php echo $dados['cliente_cpf']; ?>"><i class="fa-solid fa fa-chevron-down"></i></button>

                                    <a href="scripts/del_processo.php?id=<?php echo $dados['id']; ?>" class="btn btn-danger btn-del-processo" title="Excluir">
                                        <i class="fa-solid fa-folder-open"></i>
                                    </a>

                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style="text-align: center;">Cliente</th>
                            <th style="text-align: center;">Número do Processo</th>
                            <th style="text-align: center;">Data</th>
                            <th style="text-align: center;">Horário</th>
                            <th style="text-align: center;">Vara</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Editar</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>



<div class="modal" tabindex="-1" id="ModalProcesso">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalhes do Processo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <small class="text-muted">Clique duas vezes no campo para editar</small>
                <form id="modalProcesso" class="row g-3" method="POST" action="scripts/atualizar_processo.php">
                    <input type="hidden" name="id" value="">

                    <div class="col-md-6">
                        <label for="numero_processo" class="form-label">Número do Processo</label>
                        <input type="text" name="numero_processo" class="form-control" readonly ondblclick="tornarEditavel(this)">
                    </div>

                    <div class="col-md-6">
                        <label for="data" class="form-label">Data</label>
                        <input type="date" name="data" class="form-control" readonly ondblclick="tornarEditavel(this)">
                    </div>

                    <div class="col-md-6">
                        <label for="horario" class="form-label">Horário</label>
                        <input type="time" name="horario" class="form-control" readonly ondblclick="tornarEditavel(this)">
                    </div>

                    <div class="col-md-6">
                        <label for="vara" class="form-label">Vara</label>
                        <input type="text" name="vara" class="form-control" readonly ondblclick="tornarEditavel(this)">
                    </div>
                    <div class="col-md-6">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-control" ondblclick="tornarEditavel(this)" readonly>
                            <option value="ativo">Ativo</option>
                            <option value="arquivado">Arquivado</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="cliente_nome" class="form-label">Cliente</label>
                        <input type="text" name="cliente_nome" class="form-control" readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="cliente_cpf" class="form-label">CPF do Cliente</label>
                        <input type="text" name="cliente_cpf" class="form-control" readonly>
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
    var modal = document.getElementById('ModalProcesso');
    modal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;

        var id = button.getAttribute('data-id');
        var numero_processo = button.getAttribute('data-numero_processo');
        var data = button.getAttribute('data-data');
        var horario = button.getAttribute('data-horario');
        var vara = button.getAttribute('data-vara');
        var status = button.getAttribute('data-status-process');
        var cliente_nome = button.getAttribute('data-cliente_nome');
        var cliente_cpf = button.getAttribute('data-cliente_cpf');

        status = status.toLowerCase();

        modal.querySelector('input[name="id"]').value = id;
        modal.querySelector('input[name="numero_processo"]').value = numero_processo;
        modal.querySelector('input[name="data"]').value = data;
        modal.querySelector('input[name="horario"]').value = horario;
        modal.querySelector('input[name="vara"]').value = vara;
        modal.querySelector('input[name="cliente_nome"]').value = cliente_nome;
        modal.querySelector('input[name="cliente_cpf"]').value = cliente_cpf;
        modal.querySelector('select[name="status"]').value = status;
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.btn-del-processo');

        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                Swal.fire({
                    title: 'Confirmar Arquivamento',
                    text: "Tem certeza de que deseja arquivar este processo?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, arquivar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = button.href;
                    }
                });
            });
        });


        document.getElementById('modalProcesso').addEventListener('submit', function(event) {
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
    });


    function tornarEditavel(campo) {
        campo.readOnly = false;
        campo.classList.add("editavel");
    }
</script>