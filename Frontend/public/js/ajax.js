var nome = document.getElementById('nome');
var descricao = document.getElementById('descri');
var inputde = document.getElementById('inputDateini');
var inputate = document.getElementById('inputDateter');
var range = document.getElementById('valor');

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
        title: nome.value,
        start: inputde.value.replace("T"," "),
        end: inputate.value.replace("T"," "),
        descricao: descricao.value,
        type: 'create'
    }, 
    type: "POST"})

    window.location.href = "/"

}