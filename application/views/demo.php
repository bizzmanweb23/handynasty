<link href="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.10.2/main.min.css">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.10.2/main.min.js"></script>
<div class="content-wrapper">
<div id='calendar'></div>
</div>
<style>

#calendar {
  width: 900px;
  margin: 40px auto;
}
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    timeZone: '',
    initialView: 'resourceTimelineDay',
    aspectRatio: 1.5,
    headerToolbar: {
      left: 'prev,next',
      center: 'title',
      right: 'resourceTimelineDay'
    },
    editable: true,
    resourceAreaHeaderContent: 'Rooms',
       resources: [
        { id: 'a', title: 'Cindy' },
        { id: 'b', title: 'Mindy' },
        { id: 'c', title: 'Poltu' },
        { id: 'd', title: 'Laltu' },
        { id: 'e', title: 'Hadu' },
        { id: 'f', title: 'Chungi'},
        { id: 'g', title: 'Minku' },
        { id: 'h', title: 'Twinkle' },
        { id: 'i', title: 'Demmy' },

      ],
    events: ''
  });

  calendar.render();
});
</script>    