var muda = 0;

var nrepete = document.getElementById('norepeat');
var repete = document.getElementById('repeat');
var interval = document.getElementById('valor');

nrepete.addEventListener('click',()=>{
  document.getElementById('intervalo').style.display="none";
});
repete.addEventListener('click',()=>{
  document.getElementById('intervalo').style.display="block";
});

function range(){
  let resultado = document.getElementById("resultado");
  let valor = document.getElementById("valor").value;
  resultado.innerHTML = valor
 }
 
 range()
 
 document.addEventListener("input", range);