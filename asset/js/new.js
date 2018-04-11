var btn = document.getElementById('btn');

btn.onclick = function (){
     var height = document.getElementById('height').value;
     var width = document.getElementById('width').value;
     var color = document.getElementById('color').value;
     var radius = document.getElementById('radius').value;
     
     var element = document.getElementById('element');
     
     element.style.height=height+'px';
     element.style.width=width+'px';
     element.style.backgroundColor=color;
     element.style.borderRadius=radius+'px';
};

var txt = document.getElementById('txt');
txt.onkeyup = function (){
  var txt = document.getElementById('txt').value;  
  document.getElementById('output').innerHTML=txt;  
};


