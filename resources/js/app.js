import "./bootstrap";
import flatpickr from "flatpickr";
import monthSelectPlugin from "flatpickr/dist/plugins/monthSelect/index";
import { Japanese } from "flatpickr/dist/l10n/ja.js";
import { left } from "@popperjs/core";
// creates multiple instances
var input = document.getElementById("nousedate");
var value = input.getAttribute("value");
// 配列
let nouseDates = value.split(",");
let dateTextArray = [];
nouseDates.forEach(element=>{
    let dateText = String('"' + element + '"');
    // console.log(dateText)
    dateTextArray.push(dateText);
});
var now = new Date();
var Hour = now.getHours();
let overDeadTime = Hour < 17;
let minDateData = new Date().fp_incr(2);
if (overDeadTime) {
    minDateData = new Date().fp_incr(2);
} else {
    minDateData = new Date().fp_incr(3);
}
console.log(minDateData);
flatpickr(".js__calendar", {
    locale: Japanese,
    dateFormat: "Y-m-d",
    minDate: minDateData,
    maxDate: new Date().fp_incr(14),
    disable: [
        function (date) {
            return (
                date.getDay() === 0 ||
                date.getDay() === 2 ||
                date.getDay() === 4 ||
                date.getDay() === 6
            );
        }
    ],
});
flatpickr(".js__calendar2", {
    locale: Japanese,
    dateFormat: "Y-m-d",
    minDate: "today",
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
