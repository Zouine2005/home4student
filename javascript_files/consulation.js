const slides = document.querySelectorAll(".slides img");
let slideIndex = 0;

 
 
document.addEventListener("DOMContentLoaded",initial);

function initial(){
	if(slides.length >0){
		slides[slideIndex].classList.add ("dislide");
	   
	}
}
function show(index){
	if(index >= slides.length){
		slideIndex=0;
	}
	else if(index < 0){
		slideIndex = slides.length -1;
	}
	slides.forEach(slide =>{
		 slide.classList.remove("dislide");
	});
	slides[slideIndex].classList.add("dislide");
}
function prev(){
	 slideIndex--;
	 
  show(slideIndex);
}
function next(){
  slideIndex++;
  show(slideIndex);
}
