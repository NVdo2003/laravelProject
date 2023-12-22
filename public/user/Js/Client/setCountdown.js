var days = document.querySelector(".days span:nth-child(1)");
var hours = document.querySelector(".hours span:nth-child(1)");
var minutes = document.querySelector(".minutes span:nth-child(1)");
var seconds = document.querySelector(".seconds span:nth-child(1)");

const countdownDate = new Date("Jan 30, 2024 15:37:25").getTime();

// fix bug không countdown khi reload lại trang
const now = new Date().getTime();
const distance = countdownDate - now;
const day = Math.floor(distance / (1000 * 60 * 60 * 24));
const hour = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
const minute = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
const second = Math.floor((distance % (1000 * 60)) / 1000);
days.innerHTML = day;
hours.innerHTML = hour;
minutes.innerHTML = minute;
seconds.innerHTML = second;

const countdown = setInterval(() => {
  const now = new Date().getTime();
  const distance = countdownDate - now;

  const day = Math.floor(distance / (1000 * 60 * 60 * 24));
  const hour = Math.floor(
    (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
  );
  const minute = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  const second = Math.floor((distance % (1000 * 60)) / 1000);

  days.innerHTML = day;
  hours.innerHTML = hour;
  minutes.innerHTML = minute;
  seconds.innerHTML = second;

  if (distance < 0) {
    clearInterval(countdown);
    days.innerHTML = 0;
    hours.innerHTML = 0;
    minutes.innerHTML = 0;
    seconds.innerHTML = 0;
  }
}, 1000);
