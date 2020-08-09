<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Lato|Staatliches" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" media="screen and (max-width: 768px)" href="css/mobile.css">
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>NewsGrid | Latest News</title>
</head>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mb-3">
        <a role="button" class="btn btn-primary botonBuscar btn-sm" href="movies_form.php">
          <span data-feather="plus-circle"></span> Añadir Pélicula</a>
      </div>
    </div>
  </div>




  <form action="search_movie.php" method="POST">
    <div class="input-group mb-3">
      <input type="text" class="form-control form-control-sm" name="buscar" placeholder="Buscar Pélicula">
      <div class="input-group-append">
        <button type="submit" class="btn btn-success btn-sm" name="Buscar">Buscar</button>
      </div>
    </div>

  </form>



  <h2>Registros</h2>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Estreno</th>
          <th>Productora</th>
          <th>Clasificación</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>

        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>
</main>


</html>