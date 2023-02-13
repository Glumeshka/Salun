// плаынй переезд в якоря

const anchors = document.querySelectorAll('a[href*="#"]')

for (let anchor of anchors) {
  anchor.addEventListener('click', function (e) {
    e.preventDefault()
    
    const blockID = anchor.getAttribute('href').substr(1)
    
    document.getElementById(blockID).scrollIntoView({
      behavior: 'smooth',
      block: 'start'
    })
  })
}

// тут будет таймер

let x = setInterval(function() {
  let now = new Date().getTime();
  let distance = countDownDate - now;
  // console.log(countDownDate);
  // console.log(distance);
  // console.log(now);
  // console.log(count_id);
  // let days = Math.floor(distance/(1000 * 60 * 60 * 24));
  let hours = Math.floor((distance%(1000 * 60 * 60 * 24))/(1000 * 60 * 60));
  let minutes = Math.floor((distance%(1000 * 60 * 60))/(1000 * 60));
  let seconds = Math.floor((distance%(1000 * 60))/1000);
  document.querySelector('#timer').innerHTML = hours + "ч " + minutes + "м " + seconds + "с ";
 
  if(distance<0) {
    clearInterval(x);
    document.querySelector('#timer').innerHTML = "Вышло!";    
  }
}, 1000);

let y = setInterval(function() {
  let now = new Date().getTime();
  let distance = countDownDateDr - now;
  // console.log(countDownDate);
  // console.log(distance);
  // console.log(now);
  // console.log(count_id);
  let days = Math.floor(distance/(1000 * 60 * 60 * 24));
  let hours = Math.floor((distance%(1000 * 60 * 60 * 24))/(1000 * 60 * 60));
  let minutes = Math.floor((distance%(1000 * 60 * 60))/(1000 * 60));
  let seconds = Math.floor((distance%(1000 * 60))/1000);
  document.querySelector('#timerdr').innerHTML = days + "д " + hours + "ч " + minutes + "м " + seconds + "с ";

  if(distance<0) {
  clearInterval(y);
  document.querySelector('#timerdr').innerHTML = "Сегодня!"; // ну это вы не увидите оно в цикле с новым годом
  }
}, 1000);