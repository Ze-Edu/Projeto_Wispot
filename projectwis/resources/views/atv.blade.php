<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

  <title>Agendar Esporte</title>
</head>

<body class="bgMain">
  <div class="container form-control border-warning mx-auto mt-5 mb-5" style="width: 1000px;">
      <h1 class="alert alert-dark text-center" style="color: #000;"><a href="/home"><img src="/img/left.png" style="width: 40px;"></a>
        Criação de atividade esportiva</h1>

      <form>
        <div class="row mb-3">
          <label for="inputNome" class="col-sm-2 col-form-label">Nome</label><br>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nome" placeholder="Nome atividade">
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputDescri" class="col-sm-2 col-form-label">Descrição</label><br>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="descri" placeholder="Descrição atividade">
          </div>
        </div>

        <div class="row mb-3">
          <label for="inputNome" class="col-sm-2 col-form-label">Data</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="inputDate">
          </div>
        </div>

        <div class="row mb-3">
          <label for="inputNome" class="col-sm-2 col-form-label">De:</label>
          <div class="col-sm-10">
            <input type="time" class="form-control" id="inputDate">
          </div>
        </div>

        <div class="row mb-3">
          <label for="inputNome" class="col-sm-2 col-form-label">Até:</label>
          <div class="col-sm-10">
            <input type="time" class="form-control" id="inputDate">
          </div>
        </div>

        <fieldset class="row mb-3">
          <div class="col-sm-10">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gridRadios" id="norepeat" value="option1">
              <label class="form-check-label" for="gridRadios1">
                Não se repete
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gridRadios" id="repeat" value="option2" checked>
              <label class="form-check-label" for="gridRadios2">
                Repete
              </label>
            </div>
          </div>
        </fieldset>
        <div class=" " id="intervalo">
          <div class="">
            <div class="form-check">
            <p id="resultado">.</p>
              <label class="form-check-label">
                Intervalo de semanas:</label>  
              <input id="valor" class="estilo" type="range" min="0" max="16" value="0">
            </div>
          </div>
        </div>
        <div class="d-grid gap-2">
        <button type="submit" class="btn btn-outline-dark btn-block">Salvar</button>
        </div>
        
      </form>

    </div>
    
  </div>
  <!-- Link bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  <!-- Link com script.js -->
  <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>