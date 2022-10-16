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



var nome = document.getElementById('nome').value;
var descricao = document.getElementById('descri').value;
var inputde = document.getElementById('inputDateini');
var inputate = document.getElementById('inputDateter');
var range = document.getElementById('valor').value;

document.getElementById('salvar').addEventListener('click',criar);

function criar(){
$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
  $.ajax({
    url: "/calendar-crud-ajax",
    data: {
        title: nome,
        start: inputde.value.replace("T"," "),
        end: inputate.value.replace("T"," "),
        type: 'create'
    }, 
    type: "POST"})
}



  
  