var s_Index = 0;
showSlides();

function showSlides() {
  var i;
  var s = document.getElementsByClassName("mySlides");
  var d = document.getElementsByClassName("dot");
  for (i = 0; i < s.length; i++) {
    s[i].style.display = "none";  
  }
  s_Index++;
  if (s_Index > s.length) {s_Index = 1}    
  for (i = 0; i < d.length; i++) {
    d[i].className = d[i].className.replace(" active", "");
  }
  s[s_Index-1].style.display = "block";  
  d[s_Index-1].className += " active";
  setTimeout(showSlides, 3000); 
}