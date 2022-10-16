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
var inputde = document.getElementById('inputDateini').value;
var inputate = document.getElementById('inputDateter').value;
var range = document.getElementById('valor').value;

document.getElementById('salvar').addEventListener('click',criar);

inputde = inputde.replace("T"," ")

setInterval(() => {
  console.log(inputde)
}, 100); 

inputate = inputate.replace("T"," ");

var SITEURL = "{{ url('/') }}";
$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

function criar(){
  $.ajax({
    url: SITEURL + "/calendar-crud-ajax",
    data: {
        title: nome,
        start: inputde,
        end: inputate,
        type: 'create'
    }, 
    type: "POST"})
}



  
  