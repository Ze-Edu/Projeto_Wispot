<!DOCTYPE html>
<html>
    <head>
    <title>Agenda Exercícios</title>

        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

        <link rel="shortcut icon" href="/img/calendario.png" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fullcalendar.css') }}">
        <script src="../../public/js/fullcalendar.js"></script>
        

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class="bgMain">

        <div class="container form-control border-warning mx-1000 mt-5 mb-5">
           <h1 class="alert alert-dark text-center">Agenda de Atividades Esportivas</h1>

            <!-- Inicio calendario -->

            <div id="calendar"></div>

            <!-- Fim calendario -->
            <div class="d-flex flex-row-reverse">
           <a href="/atv"><button class="btn btn-outline-dark p-2 mt-1">Adicionar atividade</button></a>
           </div>
        </div>

        <!-- Link bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

        <script>
            // Code goes here
$(document).ready(function() {

// page is now ready, initialize the calendar...

var calendar = $('#calendar').fullCalendar({
  // put your options and callbacks here
  header: {
    left: 'prev,next today',
    center: 'title',
    right: 'year,month,basicWeek,basicDay'

  },
  timezone: 'local',
  height: "auto",
  selectable: true,
  dragabble: true,
  defaultView: 'year',
  yearColumns: 3,

  durationEditable: true,
  bootstrap: false,

  events: [{
    title: "Some event",
    start: new Date('2017-1-10'),
    end: new Date('2017-1-20'),
    id: 1,
    allDay: true,
    editable: true,
    eventDurationEditable: true,
  }, ],
  select: function(start, end, allDay) {
    var title = prompt('Event Title:');
    if (title) {
      var event = {
        title: title,
        start: start.clone(),
        end: end.clone(),
        allDay: true,
        editable: true,
        eventDurationEditable: true,
        eventStartEditable: true,
        color: 'yellow',
      };


      calendar.fullCalendar('renderEvent', event, true);
    }
  },
})
});
        </script>
        
        <!-- <script>
            
    
            $(document).ready(function (){
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var calendar = $('#calendar').fullCalendar({
                    editable:true,
                    header:{
                        left:'prev,next today',
                        center:'title',
                        right:'month,agendaWeek,agendaDay'
                    },
                    events:'/full-calender',
                    selectable:true,
                    selectHelper: true,
                    select:function(start, end, allDay){
                        var title = prompt('Nome do evento:');
                        if(title){
                            var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
                            
                            var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

                            $.ajax({
                                url:"/full-calender/action",
                                type:"POST",
                                data:{
                                    title: title,
                                    start: start,
                                    end: end,
                                    type: 'add'
                                },
                                success:function(data){
                                    calendar.fullCalendar('refetchEvents');
                                    alert("Atividade esportiva criada com sucesso!")
                                }
                            })
                        }
                    },
                    editable:true,
                    eventResize: function(event, delta){
                        var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
                        var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');
                        var title = event.title;
                        var id = event.id;
                        $.ajax({
                            url:"/full-calender/action",
                            type:"POST",
                            data:{
                                title: title,
                                start: start,
                                end: end,
                                id: id,
                                type: 'update'
                            },
                            success:function(response){
                                calendar.fullCalendar('refetchEvents');
                                alert("Evento alterado com sucesso!")
                            }
                        })
                    },
                    eventDrop: function(event, delta){
                        var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
                        var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');
                        var title = event.title;
                        var id = event.id;
                        $.ajax({
                            url:"/full-calender/action",
                            type:"POST",
                            data:{
                                title: title,
                                start: start,
                                end: end,
                                id: id,
                                type: 'update'
                            },
                            success:function(response){
                                calendar.fullCalendar('refetchEvents');
                                alert("Evento alterado com sucesso!")
                            }
                        })
                    },

                    eventClick: function(event){
                        if(confirm("Confirma a remoção desta atividade esportiva?")){
                            var  id = event.id;
                            $.ajax({
                                url:"/full-calender/action",
                                type:"POST",
                                data:{
                                    id:id,
                                    type:"delete"
                                },
                                success:function(response){
                                    calendar.fullCalendar('refetchEvents');
                                    alert("Atividade esportiva removida com sucesso");
                                }
                            })
                        }
                    }
                });
            });
        </script> -->

        <!-- Link com script.js -->
        <script src="{{ asset('js/script.js') }}"></script>
    </body>
</html>
