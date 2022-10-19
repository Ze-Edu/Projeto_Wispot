<!-- Modal -->
<div class="modal fade" id="modalCalendar" tabindex="-1" aria-labelledby="titleModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="titleModal">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Titulo</label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" id="title">
                </div>
            </div>
            <div class="form-group row">
                <label for="start" class="col-sm-2 col-form-label">Data/hora Inicial</label>
                <div class="col-sm-10">
                    <input type="text" name="start" class="form-control" id="start">
                </div>
            </div>
            <div class="form-group row">
                <label for="end" class="col-sm-2 col-form-label">Data/hora Final</label>
                <div class="col-sm-10">
                    <input type="text" name="end" class="form-control" id="end">
                </div>
            </div>
            <div class="form-group row">
                <label for="descricao" class="col-sm-2 col-form-label">Descrição</label>
                <div class="col-sm-10">
                    <textarea name="descricao" id="descricao" cols="40" rows="4"></textarea>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-danger deleteEvent">Excluir</button>
      </div>
    </div>
  </div>
</div>