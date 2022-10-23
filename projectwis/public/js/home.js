var btnExcluir = document.getElementById('Excluir');

btnExcluir.addEventListener('click', ()=>{
   $.ajax({
     type: "POST",
     url: '/calendar-crud-ajax',
     data: {
         id: btnExcluir.dataset.id,
         type: 'delete'
     }
     
   })
   window.location.href = "/"
})  

var btnFechar = document.getElementById('Fechar');

btnFechar.addEventListener('click', ()=>{
  //window.location.href = "/"
  document.getElementById('mostraAtividade').style.display="none";
})