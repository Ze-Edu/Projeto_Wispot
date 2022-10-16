<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agenda de exercicios</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
</head>

<body class="bgMain">
    <div class="container form-control border-warning mx-1000 mt-5 mb-5">
        <h1 class="alert alert-dark text-center">Agenda de Atividades Esportivas</h1>

        <!-- Inicio calendario -->

        <div id="full_calendar_events"></div>

        <!-- Fim calendario -->
        <div class="d-flex flex-row-reverse">
            <a href="/atv"><button class="btn btn-outline-dark p-2 mt-1">Adicionar atividade</button></a>
        </div>
    </div>

    {{-- Scripts --}}
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
                select: function(event_start, event_end, allDay) {
                    var event_name = prompt('Event Name:');
                    if (event_name) {
                        var event_start = $.fullCalendar.formatDate(event_start, "Y-MM-DD HH:mm:ss");
                        var event_end = $.fullCalendar.formatDate(event_end, "Y-MM-DD HH:mm:ss");
                        $.ajax({
                            url: SITEURL + "/calendar-crud-ajax",
                            data: {
                                title: event_name,
                                start: event_start,
                                end: event_end,
                                type: 'create'
                            },
                            type: "POST",
                            success: function(data) {
                                displayMessage("Event created.");
                                calendar.fullCalendar('renderEvent', {
                                    id: data.id,
                                    title: event_name,
                                    start: event_start,
                                    end: event_end,
                                    allDay: allDay
                                }, true);
                                calendar.fullCalendar('unselect');
                            }
                        });
                    }
                },
                eventDrop: function(event, delta) {
                    var event_start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                    var event_end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                    $.ajax({
                        url: SITEURL + '/calendar-crud-ajax',
                        data: {
                            title: event.event_name,
                            start: event_start,
                            end: event_end,
                            id: event.id,
                            type: 'edit'
                        },
                        type: "POST",
                        success: function(response) {
                            displayMessage("Event updated");
                        }
                    });
                },
                eventClick: function(event) {
                    var eventDelete = confirm("Are you sure?");
                    if (eventDelete) {
                        $.ajax({
                            type: "POST",
                            url: SITEURL + '/calendar-crud-ajax',
                            data: {
                                id: event.id,
                                type: 'delete'
                            },
                            success: function(response) {
                                calendar.fullCalendar('removeEvents', event.id);
                                displayMessage("Event removed");
                            }
                        });
                    }
                }
            });
        });

        function displayMessage(message) {
            toastr.success(message, 'Event');
        }
    </script>
    <!-- Link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- Link com script.js -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>