const today = new Date();
const tomorrow = new Date(today);
tomorrow.setDate(today.getDate() + 1);

const dateInput = document.getElementById('date');
dateInput.min = tomorrow.toISOString().slice(0, 10);
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
      timeTip.innerText = 'Please select a date first';
  }
});
