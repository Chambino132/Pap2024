<div>
    <x-slot name="pageTitle">
        Calendario
    </x-slot>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
    <div wire:ignore class="border-black dark:text-white" id="calendar"></div>

    <div>
    <script>
    document.addEventListener('livewire:initialized', function(){
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        timezone: 'local',
        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        selectMirror: true,
        events: @json($events),
        select: function(data) {
            var event_name = prompt('Nome do Evento:');
            if (!event_name) {
                return;
            }
            @this.newEvent(event_name, data.start.toISOString(), data.end.toISOString())
                .then(
                    function(id) {
                        calendar.addEvent({
                            id: id,
                            title: event_name,
                            start: data.startStr,
                            end: data.endStr,
                        });
                        calendar.unselect();
                    });
        },
        eventDrop: function(data) {
            @this.updateEvent(
                data.event.id,
                data.event.name,
                data.event.start.toISOString(),
                data.event.end.toISOString()).then(function() {
            })
        },
        eventClick: function(data) {
            @this.deleteEvent(data.event.id).then(function(){                
            })
        },
        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        });

        calendar.render();

        setTimeout(function() {
            window.dispatchEvent(new Event('resize'));
        }, 100);
    })
    </script>
</div>
