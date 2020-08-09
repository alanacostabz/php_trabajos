<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>CRUD</title>
  <link rel="stylesheet" type="text/css" href="hoja.css">


</head>

<body>

  <?php
  include('conexion.php');
  // $conexion = $base->query('SELECT * FROM DATOS_USUARIOS');
  // $registros = $conexion->fetchAll(PDO::FETCH_OBJ);


  //-------------------------------- Pagiacion ------------------------------------------------
  $tamanioPaginas = 3;
  $pagina = 1;

  if (isset($_GET['pagina'])) {
    if ($_GET['pagina'] == 1) {
      header('Location:index.php');
    } else {
      $pagina = $_GET['pagina'];
    }
  } else {
    $pagina = 1;
  }

  $empezarDesde = ($pagina - 1) * $tamanioPaginas;

  $sqlTotal = "SELECT * FROM DATOS_USUARIOS";
  $resultado = $base->prepare($sqlTotal);
  $resultado->execute(array());
  $numFilas = $resultado->rowCount();
  $totalPaginas = ceil($numFilas / $tamanioPaginas);
  //--------------------------------------------------------------------------------
  $registros = $base->query("SELECT * FROM DATOS_USUARIOS LIMIT $empezarDesde,$tamanioPaginas")->fetchAll(PDO::FETCH_OBJ);

  if (isset($_POST['cr'])) {
    $nombre = $_POST['nom'];
    $apellido = $_POST['ape'];
    $direccion = $_POST['dir'];
    $sql = 'INSERT INTO DATOS_USUARIOS (NOMBRE, APELLIDO, DIRECCION) VALUES (:nom, :ape, :dir)';
    $resultado = $base->prepare($sql);
    $resultado->execute(array(':nom' => $nombre, ':ape' => $apellido, ':dir' => $direccion));
    header('Location:index.php');
  }

  ?>


  <h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <table width="50%" border="0" align="center">
      <tr>
        <td class="primera_fila">Id</td>
        <td class="primera_fila">Nombre</td>
        <td class="primera_fila">Apellido</td>
        <td class="primera_fila">Dirección</td>
        <td class="sin">&nbsp;</td>
        <td class="sin">&nbsp;</td>
        <td class="sin">&nbsp;</td>
      </tr>

      <?php foreach ($registros as $persona) : ?>

        <tr>
          <td><?php echo $persona->id ?></td>
          <td><?php echo $persona->nombre ?></td>
          <td><?php echo $persona->apellido ?></td>
          <td><?php echo $persona->direccion ?></td>

          <td class="bot"><a href="borrar.php?id=<?php echo $persona->id ?>"> <input type='button' name='del' id='del' value='Borrar'></a></td>
          <td class='bot'> <a href="editar.php?id=<?php echo $persona->id ?> & nom=<?php echo $persona->nombre ?>&ape=<?php echo $persona->apellido ?>&dir=<?php echo $persona->direccion ?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
        </tr>
      <?php endforeach; ?>


      <tr>
        <td></td>
        <td><input type='text' name='nom' size='10' class='centrado'></td>
        <td><input type='text' name='ape' size='10' class='centrado'></td>
        <td><input type='text' name='dir' size='10' class='centrado'></td>
        <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
      </tr>
      <tr>
        <td>
          <?php
          //----------------------- PAGINACIÓN ----------------------------
          for ($i = 1; $i <= $totalPaginas; $i++) {
            echo ' <a href="?pagina=' . $i . '">' . $i . '</a>';
          }
          ?>
        </td>
      </tr>
    </table>
  </form>


  <p>&nbsp;</p>
</body>

</html>