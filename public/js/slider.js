//Written By Ludvig Olausson
var slides = document.querySelectorAll('#slides .slide');
var currentSlide = 0;
var slideInterval = setInterval(nextSlide,5000);

function nextSlide() {
    slides[currentSlide].className = 'slide';
    currentSlide = (currentSlide+1)%slides.length;
    slides[currentSlide].className = 'slide showing';
  slides[currentSlide].style.backgroundColor = "#414141";
}
function forward(){
  slides[currentSlide].className = 'slide';
    currentSlide = (1)%slides.length;
    slides[currentSlide].className = 'slide showing';
}
function back(){
  if(currentSlide != 0){
    slides[currentSlide].className = 'slide';
    currentSlide = (2)%slides.length;
    slides[currentSlide].className = 'slide showing';
    }
}