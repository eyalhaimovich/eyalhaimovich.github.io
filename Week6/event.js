//Timer
const second = 1000;
const minute = second * 60;
const hour = minute * 60;
const day = hour * 24;

const countdown = () =>{
    const countDate = new Date("May 17, 2023 00:00:00").getTime();
    const now = new Date().getTime();
    const distance = countDate - now;

    const outDay = Math.floor(distance / day);
    const outHour = Math.floor((distance % day) / hour);
    const outMinute = Math.floor((distance % hour) / minute);
    const outSecond = Math.floor((distance % minute) / second);

    document.getElementById("days").innerHTML = outDay;
    document.getElementById("hours").innerHTML = outHour;
    document.getElementById("minutes").innerHTML = outMinute;
    document.getElementById("seconds").innerHTML = outSecond;

};
setInterval(countdown,1000);

//Button popup
var videoButton = document.getElementById("btn");
var videoPopup = document.getElementById("popup");
var videoPlayer = document.getElementById("player");
var closeButton = document.getElementById("closeButton");

//open
videoButton.addEventListener("click", function() {
  // Show the video popup
  videoPopup.style.display = "block";

});

//close
closeButton.addEventListener("click", function() {
  // Hide the video popup
  videoPopup.style.display = "none";
});

