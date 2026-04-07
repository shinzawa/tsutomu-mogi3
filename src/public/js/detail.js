document.addEventListener("DOMContentLoaded", () => {

    // 日付
    const inputDate = document.getElementById("input-date");
    const displayDate = document.getElementById("display-date");

    if (inputDate && displayDate) {
        inputDate.addEventListener("change", () => {
            displayDate.textContent = inputDate.value;
        });
    }

    // 時間
    const inputTime = document.getElementById("input-time");
    const displayTime = document.getElementById("display-time");

    if (inputTime && displayTime) {
        inputTime.addEventListener("change", () => {
            displayTime.textContent = inputTime.value;
        });
    }

    // 人数
    const inputPeople = document.getElementById("input-people");
    const displayNumber = document.getElementById("display-number");

    if (inputPeople && displayNumber) {
        inputPeople.addEventListener("change", () => {
            displayNumber.textContent = inputPeople.value + "人";
        });
    }

});
