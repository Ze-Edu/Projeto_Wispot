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