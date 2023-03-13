import "./bootstrap";
import flatpickr from "flatpickr";
import monthSelectPlugin from "flatpickr/dist/plugins/monthSelect/index";
import { Japanese } from "flatpickr/dist/l10n/ja.js";
// creates multiple instances

var now = new Date();
var Hour = now.getHours();
console.log(Hour > 17);
let overDeadTime = Hour < 17;
let minDateData = 'today';
if (overDeadTime) {
    minDateData = 'today';
} else {
    minDateData = new Date().fp_incr(2);
}
console.log(minDateData);
flatpickr(".js__calendar", {
    locale: Japanese,
    dateFormat: "Y-m-d",
    minDate: minDateData,
    maxDate: new Date().fp_incr(14),
    disable: [
        function (date) {
            // return true to disable
            return (
                date.getDay() === 0 ||
                date.getDay() === 2 ||
                date.getDay() === 4 ||
                date.getDay() === 6
            );
        },
    ],
});
