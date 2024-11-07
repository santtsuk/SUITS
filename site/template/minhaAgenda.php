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
                            
                            document.getElementById('visualizar_titulo').innerHTML = info.event.title;
                            document.getElementById('visualizar_inicio').innerHTML = info.event.start.toLocaleString();
                            document.getElementById('visualizar_fim').innerHTML = info.event.end ? info.event.end.toLocaleString() : 'Data não disponível';
                            document.getElementById('visualizar_descricao').innerHTML = info.event.extendedProps.descricao;
                            const usuario = info.event.extendedProps.id_usuario || 'Não disponível';
                            document.getElementById('visualizar_usuario').innerHTML = usuario;

                            document.getElementById('excluirEvento').dataset.eventId = info.event.id;

                            
                            new bootstrap.Modal(document.getElementById('visualizarModal')).show();

                            
                            
                        }


                    });

                        calendar.render();
                        const excluirButton = document.getElementById('excluirEvento');
                        if (excluirButton) {
                            excluirButton.addEventListener('click', function() {
                                const eventId = this.dataset.eventId;
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
                                            new bootstrap.Modal(document.getElementById('visualizarModal')).hide(); // 
                                        })
                                        .catch(error => {
                                            alert('Erro ao tentar excluir o evento');
                                        });
                                }
                            });
                        }

                    });
    </script>
</head>

<body>
    <div id='calendar'></div>

    <!-- Modal -->
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
                        <dt class="col-sm-3">Responsável:</dt>
                        <dd class="col-sm-9" id="visualizar_usuario"></dd>
                    </dl>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="excluirEvento">Excluir</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <script src='../site/js/index.global.js'></script>
    <script src='../../SUITS/assets/js/core/pt-br.global.js'></script>
</body>

</html>