var slider1 = document.getElementById("myRange1");
var output1 = document.getElementById("demo1");
output1.innerHTML = slider1.value;

var slider2 = document.getElementById("myRange2");
var output2 = document.getElementById("demo2");
output2.innerHTML = slider2.value;

var slider3 = document.getElementById("myRange3");
var output3 = document.getElementById("demo3");
output3.innerHTML = slider3.value;

//Slider1
slider1.oninput = function() {
  output1.innerHTML = this.value;
  if(slider1.value > slider2.value) {
    output2.innerHTML = this.value;
    output3.innerHTML = this.value;
    slider2.value = slider1.value;
    slider3.value = slider1.value;
  } else {
    console.log(1);
  }
}

//slieder2
slider2.oninput = function() {
  output2.innerHTML = this.value;
  if(slider2.value > slider3.value) {
    output3.innerHTML = this.value;
    slider3.value = slider2.value;
  } else if(slider2.value < slider1.value) {
    output1.innerHTML = this.value;
    slider1.value = slider2.value;
  } else {
    console.log(2);
  }
}

//slider3
slider3.oninput = function() {
  output3.innerHTML = this.value;
  if(slider3.value < slider2.value) {
    output1.innerHTML = this.value;
    output2.innerHTML = this.value;
    slider2.value = slider3.value;
    slider1.value = slider3.value;
  } else {
    console.log(3);
  }
}

//process bar load
function update() { 
  clearInterval()
  var element = document.getElementById("progress-bar");    
  var width = 0; 
  var identity = setInterval(scene, 10); 
  function scene() { 
    if (width >= 100) { 
      clearInterval(identity); 
    } else { 
      width++;  
      element.style.width = width + '%';  
    } 
  } 
} 