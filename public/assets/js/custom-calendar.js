// $(document).ready(function () {
//     // document.addEventListener('DOMContentLoaded', function () {
//     var calendarEl = document.getElementById('calendar');


//     var calendar = new FullCalendar.Calendar(calendarEl, {

//         headerToolbar: {
//             left: 'prev,next today',
//             center: 'title',
//             right: 'dayGridMonth,timeGridWeek,timeGridDay'
//         },
//         initialDate: '2021-09-12',
//         navLinks: true, // can click day/week names to navigate views
//         selectable: true,
//         selectMirror: true,
//         select: function (arg) {
//             var title = prompt('Event Title:');
//             if (title) {
//                 calendar.addEvent({
//                     title: title,
//                     description: description,
//                     start: arg.start,
//                     end: arg.end,
//                     allDay: arg.allDay
//                 })
//             }
//             calendar.unselect()
//             window.location.href('/meetings-list')

//         },
//         eventClick: function (arg) {
//             // if (confirm('Are you sure you want to delete this event?')) {
//             //     arg.event.remove()
//             // }
//             // window.location.href('meeting-list.html')
//         },
//         editable: true,
//         dayMaxEvents: true, // allow "more" link when too many events
//         events: [{


//             title: '<?php echo hi ?>',
//             textEscape: false,
//             start: '2021-09-01 09:30:00',
//             end: '2021-09-01 :30:00',
//             backgroundColor: '#03C977',
//             color: 'green',
//             description: 'abcs',
//             url: '/meetings-list',
//         },
//         ],
//         eventRender: function (event, element) {
//             element.find('.fc-event-title').append("<br/>" + event.description);
//         }
//         // new option to disable the auto escape
//         // eventRender: function (event, element) {
//         //     element.find('.fc-title').append("<br/>" + event.description);
//         // }
//     });

//     calendar.render();
// });
// // });