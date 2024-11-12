<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suits</title>
    <style>
        body {
            margin: 40px, 10px;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 1100px;
            margin: 0 auto;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                initialDate: '2024-11-07',
                navLinks: true,
                selectable: true,
                selectMirror: true,
                locale: 'pt-br',
                editable: true,
                dayMaxEvents: true,
                events: '../site/scripts/agenda.php',
                eventClick: function(info) {

                    document.getElementById('visualizar_evento_id').value = info.event.id;


                    document.getElementById('visualizar_titulo').innerHTML = info.event.title;
                    document.getElementById('visualizar_inicio').innerHTML = info.event.start.toLocaleString();
                    document.getElementById('visualizar_fim').innerHTML = info.event.end ? info.event.end.toLocaleString() : 'Data não disponível';
                    document.getElementById('visualizar_descricao').innerHTML = info.event.extendedProps.descricao;
                    document.getElementById('visualizar_processo').innerHTML = info.event.extendedProps.processo;
                    document.getElementById('visualizar_cliente').innerHTML = info.event.extendedProps.cliente;
                    document.getElementById('visualizar_usuario').innerHTML = info.event.extendedProps.usuario;
                    document.getElementById('visualizar_status').checked = info.event.extendedProps.status;


                    new bootstrap.Modal(document.getElementById('visualizarModal')).show();
                }
            });

            calendar.render();


            const excluirButton = document.getElementById('excluirEvento');
            if (excluirButton) {
                excluirButton.addEventListener('click', function() {
                    const eventId = document.getElementById('visualizar_evento_id').value;
                    if (confirm("Tem certeza que deseja excluir este evento?")) {

                        fetch('../site/scripts/del_agenda.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded'
                                },
                                body: `id=${eventId}`
                            })
                            .then(response => response.text())
                            .then(data => {
                                alert(data);
                                calendar.refetchEvents();
                                new bootstrap.Modal(document.getElementById('visualizarModal')).hide();
                            })
                            .catch(error => {
                                alert('Erro ao tentar excluir o evento');
                            });
                    }
                });
            }

            const adiarButton = document.getElementById('adiarEvento');
            const confirmarAdiarButton = document.getElementById('confirmarAdiar');

            if (adiarButton) {
                adiarButton.addEventListener('click', function() {
                    new bootstrap.Modal(document.getElementById('adiarModal')).show();
                });
            }
            if (confirmarAdiarButton) {
                confirmarAdiarButton.addEventListener('click', function() {
                    const eventId = document.getElementById('visualizar_evento_id').value;
                    const novaDataInicio = document.getElementById('novaDataInicio').value;
                    const novoHorarioInicio = document.getElementById('novoHorarioInicio').value;
                    const novaDataFim = document.getElementById('novaDataFim').value;
                    const novoHorarioFim = document.getElementById('novoHorarioFim').value;

                    if (novaDataInicio && novoHorarioInicio && novaDataFim && novoHorarioFim) {
                        fetch('../site/scripts/adiar_evento.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded'
                                },
                                body: `id=${eventId}&nova_dataInicio=${novaDataInicio}&nova_horaInicio=${novoHorarioInicio}&nova_dataFim=${novaDataFim}&nova_horaFim=${novoHorarioFim}`
                            })
                            .then(response => response.text())
                            .then(data => {
                                alert(data);
                                calendar.refetchEvents();
                                bootstrap.Modal.getInstance(document.getElementById('adiarModal')).hide();
                            })
                            .catch(error => {
                                alert('Erro ao tentar adiar o evento');
                            });
                    } else {
                        alert('Por favor, selecione a nova data e horário.');
                    }
                });
            }
        });
    </script>
</head>

<body>
    <div id='calendar'></div>

    <div class="modal fade" id="visualizarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="VisualizarModalLabel">Detalhes do Evento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <dl class="row">
                        <dt class="col-sm-3">Titulo:</dt>
                        <dd class="col-sm-9" id="visualizar_titulo"></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-3">Inicio:</dt>
                        <dd class="col-sm-9" id="visualizar_inicio"></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-3">Fim:</dt>
                        <dd class="col-sm-9" id="visualizar_fim"></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-3">Descrição:</dt>
                        <dd class="col-sm-9" id="visualizar_descricao"></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-3">Processo:</dt>
                        <dd class="col-sm-9" id="visualizar_processo"></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-3">Cliente:</dt>
                        <dd class="col-sm-9" id="visualizar_cliente"></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-3">Responsável:</dt>
                        <dd class="col-sm-9" id="visualizar_usuario"></dd>
                    </dl>

                    <input type="hidden" id="visualizar_evento_id" value="1">
                </div>

                <div class="form-check d-flex justify-content-end me-3 mt-3">
                    <input class="form-check-input" type="checkbox" id="visualizar_status" onchange="atualizarStatus(this)">
                    <label class="form-check-label ms-2" for="visualizar_status">
                        Marcar como concluída
                    </label>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" id="adiarEvento">Adiar</button>
                    <button type="button" class="btn btn-danger" id="excluirEvento">Excluir</button>
                    <button type="button" class="btn btn-secondary" id="fecharEvento" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="adiarModal" tabindex="-1" aria-labelledby="adiarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adiarModalLabel">Adiar Evento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formAdiar">
                        <div class="mb-3">
                            <label for="novaData" class="form-label">Nova Data de Inicio</label>
                            <input type="date" class="form-control" id="novaDataInicio" required>
                        </div>
                        <div class="mb-3">
                            <label for="novoHorario" class="form-label">Novo Horário de Inicio</label>
                            <input type="time" class="form-control" id="novoHorarioInicio" required>
                        </div>
                        <div class="mb-3">
                            <label for="novaData" class="form-label">Nova Data de Fim</label>
                            <input type="date" class="form-control" id="novaDataFim" required>
                        </div>
                        <div class="mb-3">
                            <label for="novoHorario" class="form-label">Novo Horário de Fim</label>
                            <input type="time" class="form-control" id="novoHorarioFim" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="confirmarAdiar">Confirmar</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        const modal = document.getElementById("visualizarModal");
        const closeModalBtn = document.getElementById("fecharEvento");

        closeModalBtn.onclick = function() {
            modal.style.display = "none";
            location.reload();
        };

        window.onclick = function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
                location.reload();
            }
        }
    </script>

    <script>
        function atualizarStatus(checkbox) {
            const eventoId = document.getElementById('visualizar_evento_id').value;
            const status = checkbox.checked ? 1 : 0;

            console.log(eventoId);
            console.log(status);

            const formData = new FormData();
            formData.append('evento_id', eventoId);
            formData.append('status', status);

            fetch('../site/scripts/status_evento.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    console.log(data);
                })
                .catch(error => {
                    console.error('Erro ao atualizar status:', error);
                });
        }
    </script>
    <script src='../site/js/index.global.js'></script>
    <script src='../../SUITS/assets/js/core/pt-br.global.js'></script>
</body>

</html>