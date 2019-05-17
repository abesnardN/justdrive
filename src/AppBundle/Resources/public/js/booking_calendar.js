function setCalendar(urlCalendarLoadEvents) {
	$("#calendar-holder").fullCalendar({
		eventSources: [
			{
				url: urlCalendarLoadEvents,
				type: "POST",
				data: {
					filters: {},
				},
				error: function () {
					// alert("There was an error while fetching FullCalendar!");
				}
			}
		],
		header: {
			center: "title",
			left: "prev,next today",
			right: "month,agendaWeek,agendaDay"
		},
		lazyFetching: true,
		locale: "fr",
		navLinks: true, // can click day/week names to navigate views
	});
}