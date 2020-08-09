<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <?php require('model/paginacion.php'); ?>
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

      <?php foreach ($matrizPersonas as $persona) : ?>

        <tr>
          <td><?php echo $persona['id'] ?></td>
          <td><?php echo $persona['nombre'] ?></td>
          <td><?php echo $persona['apellido'] ?></td>
          <td><?php echo $persona['direccion'] ?></td>

          <td class="bot"><a href="borrar.php?id=<?php echo $persona['id'] ?>"> <input type='button' name='del' id='del' value='Borrar'></a></td>
          <td class='bot'> <a href="editar.php?id=<?php echo $persona['id'] ?> & nom=<?php echo $persona['nombre'] ?>&ape=<?php echo $persona['apellido'] ?>&dir=<?php echo $persona['direccion'] ?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
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

</body>

</html>