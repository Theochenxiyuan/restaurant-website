const dateInput = document.getElementById('date');
let today = new Date();
let dd = today.getDate() + 1;
let mm = today.getMonth() + 1;
let yyyy = today.getFullYear();

if (dd < 10) {
  dd = '0' + dd;
}
if (mm < 10) {
  mm = '0' + mm;
}

tomorrow = `${yyyy}-${mm}-${dd}`;

dateInput.min = tomorrow;

const timeInput = document.getElementById('time');
const timeTip = document.querySelector('.time-tip');

const guestsSlider = document.getElementById('guests');
const guestsOutput = document.querySelector('.guestsOutput');

guestsSlider.oninput = function () {
  guestsOutput.innerHTML = this.value;
};

function changeTimeRange(start, end) {
  timeInput.disabled = false;
  timeInput.min = start;
  timeInput.max = end;
}

dateInput.addEventListener('input', () => {
  const selectedDate = new Date(dateInput.value);
  const dayOfWeek = selectedDate.getDay();
  switch (dayOfWeek) {
    case 0:
      changeTimeRange('10:00', '19:00');
      timeTip.innerText = 'Sunday: 10:00 - 19:00';
      break;
    case 1:
      changeTimeRange('10:00', '19:00');
      timeTip.innerText = 'Monday: 10:00 - 19:00';
      break;
    case 2:
      changeTimeRange('10:00', '19:00');
      timeTip.innerText = 'Tuesday: 10:00 - 19:00';
      break;
    case 3:
      changeTimeRange('10:00', '19:00');
      timeTip.innerText = 'Wednesday: 10:00 - 19:00';
      break;
    case 4:
      changeTimeRange('10:00', '21:00');
      timeTip.innerText = 'Thursday: 10:00 - 21:00';
      break;
    case 5:
      changeTimeRange('10:00', '21:00');
      timeTip.innerText = 'Friday: 10:00 - 21:00';
      break;
    case 6:
      changeTimeRange('10:00', '19:00');
      timeTip.innerText = 'Saturday: 10:00 - 19:00';
      break;
    default:
      timeInput.disabled = true;
      timeTip.innerText = 'Please select a date first';
  }
});
