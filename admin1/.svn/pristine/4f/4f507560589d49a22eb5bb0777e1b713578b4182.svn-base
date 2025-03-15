var base = controller = action = null;
$(function() {
    base = $('#base').val();
    controller = $('#controller').val();
    action = $('#action').val();

    var h = {};

    if ($('#calendar').width() <= 400) {
        $('#calendar').addClass("mobile");
        h = {
            left: 'title, prev, next',
            center: '',
            right: 'today,month,agendaWeek,agendaDay'
        };
    } else {
        $('#calendar').removeClass("mobile");

        h = {
            left: 'title',
            center: '',
            right: 'prev,next,today,month,agendaWeek,agendaDay'
        };
    }

    $('#calendar').fullCalendar('destroy'); // destroy the calendar
    $('#calendar').fullCalendar({//re-initialize the calendar
        disableDragging: true,
        header: h,
        editable: false,
        events: base + controller + '/json'
    });
});
