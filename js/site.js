var calendars = {};
$(document).ready(function() {
    var n = moment().format("YYYY-MM"),
        e = [{ startDate: n + "-10", endDate: n + "-14", title: "Multi-Day Event" }, { startDate: n + "-21", endDate: n + "-23", title: "Another Multi-Day Event" }];
    calendars.clndr1 = $(".cal1").clndr({ events: e, clickEvents: { click: function(n) { console.log(n), $(n.element).hasClass("inactive") ? console.log("not a valid datepicker date.") : console.log("VALID datepicker date.") }, nextMonth: function() {}, previousMonth: function() {}, onMonthChange: function() {}, nextYear: function() {}, previousYear: function() {}, onYearChange: function() {} }, multiDayEvents: { startDate: "startDate", endDate: "endDate" }, showAdjacentMonths: !0, adjacentDaysChangeMonth: !1 }), $(document).keydown(function(n) { 37 == n.keyCode && (calendars.clndr1.back(), calendars.clndr2.back()), 39 == n.keyCode && (calendars.clndr1.forward(), calendars.clndr2.forward()) })
});