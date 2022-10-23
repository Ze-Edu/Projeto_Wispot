<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agenda de exercicios</title>
    <link rel="icon" href="img/calendario.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="../css/app.css">
</head>

<body class="bgMain">


    <div class="container form-control border-dark mx-1000 mt-5 mb-5">
        <h1 class="alert alert-secondary text-center border-dark" style="color: #000;">Agenda de Atividades Esportivas</h1>

        <!-- Inicio calendario -->
        <div class="container border border-dark rounded-3">
            <div id="descriweb">
                <h5>descrição</h5>
                <div class="d-flex flex-row mb-2">
                    <div class="p-2" id="bol_agendado"></div>
                    <h6 id="h6a">Agendado</h6>

                    <div class="p-2" id="bol_livre"></div>
                    <h6 id="h6h">Horários livres</h6>
                </div>
                <h6 id="descri">Pressione na atividade para ver a descrição ou exclui-la.</h6>
            </div>
        </div>
        <br>
        <!-- Mostra atividade -->
        <div class="container border border-info rounded-3 text-center alert alert-light " id="mostraAtividade" style="display: none;width: 700px">
            <div id="descriweb">
                <h2 class="alert alert-info text-center">Atividade esportiva</h2>
                <div><h6 id="h6Nome">Nome: </h6></div>
                <div><h6 id="h6Descri">Descrição: </h6></div>
                <div><h6 id="h6Dataini">Data-inicio:</h6></div>
                <div><h6 id="h6Datafin">Data-final:</h6></div>
                
                <div><button id="Excluir" data-id class="btn btn-outline-danger p-2 mt-1">Apagar atividade</button>
                <button id="Fechar" data-id class="btn btn-outline-secondary p-2 mt-1">Fechar</button></div>
                <br>
            </div>
        </div>
        <!-- FIm - Mostra atividade -->
        <br>
        <div id="full_calendar_events"></div>
        <br>
        <!-- Fim calendario -->
        <div class="text-center">
            <a href="/atv"><button class="btn btn-dark btn-lg">Adicionar atividade</button></a>
        </div>
    </div>

    <!-- {{-- Scripts --}} -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>


        $(document).ready(function() {
            var SITEURL = "{{ url('/') }}";
            var evento = SITEURL + "/calendar-event";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var calendar = $('#full_calendar_events').fullCalendar({
                editable: true,
                editable: true,
                events: evento,
                displayEventTime: true,
                eventRender: function(event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                selectable: true,
                selectHelper: true,
               
                eventDrop: function(event, delta) {
                    console.log(delta)
                    var event_start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                    var event_end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                    $.ajax({
                        url: SITEURL + '/calendar-crud-ajax',
                        data: {
                            title: event.title,
                            start: event_start,
                            end: event_end,
                            id: event.id,
                            type: 'edit'
                        },
                        type: "POST",
                        success: function(response) {
                            displayMessage("Atividade atualizada");
                        }
                    });
                },


                eventClick: function(event) {
                    
                    var event_start = $.fullCalendar.formatDate(event.start, " DD/MM/Y HH:mm:ss");
                    var event_end;

                    if(event.end == null){
                        event_end = event_start                        
                    }else{
                        event_end = $.fullCalendar.formatDate(event.end, " DD/MM/Y HH:mm:ss");
                    }

                    document.getElementById('h6Nome').innerHTML = "Nome - " + event.title;
                    document.getElementById('h6Descri').innerHTML = "Descrição - " + event.descricao;
                    document.getElementById('h6Dataini').innerHTML = "Data Inicial - " + event_start;
                    document.getElementById('h6Datafin').innerHTML = "Data Final - " + event_end;

                    document.getElementById('mostraAtividade').style.display="block";

                    document.getElementById('Excluir').dataset.id = event.id;
                }

            });

        });



        function displayMessage(message) {
            toastr.success(message, 'Event');
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

    <!-- Link com script.js -->
    <script src="{{ asset('js/home.js') }}"></script>
</body>

</html>