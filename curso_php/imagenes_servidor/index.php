<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    table {
      margin: auto;
      width: 450px;
      border: 1px dotted crimson;
    }
  </style>
</head>

<body>
  <form action="datos_imagen.php" method="POST" enctype="multipart/form-data">
    <table>
      <tr>
        <td>
          <label for="imagen">Imagen:</label>
        </td>
        <td>
          <input type="file" name="imagen" size="20">
        </td>
        <td colspan="2" style="text-align: center">
          <button type="submit" value="Enviar">Enviar imagen</button>
        </td>
      </tr>
    </table>
  </form>
</body>

</html>