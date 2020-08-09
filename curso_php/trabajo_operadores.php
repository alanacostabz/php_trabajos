<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    h1 {
      text-align: center;
    }

    table {
      background-color: #ffc;
      padding: 5px;
      border: #666 5px solid;
    }

    .no_valido {
      font-size: 18px;
      color: #f00;
      font-weight: bold;
      text-align: center;
    }

    .validado {
      font-size: 18px;
      text-align: center;
      color: #0c3;
      font-weight: bold;
    }
  </style>
</head>

<body>

  <h1>OPERADORES USANDO COMPARACIÓN</h1>

  <form action="validacion.php" method="POST" name="datos_usuario" id="datos_usuario">
    <table width="15%" align="center">
      <tr>
        <td>Nombre:</td>
        <td><label for="nombre_usuario"></label>
          <input type="text" name="nombre_usuario" id="nombre_usuario"></td>
      </tr>
      <tr>
        <td>Edad:</td>
        <td><label for="edad_usuario"></label>
          <input type="text" name="edad_usuario" id="edad_usuario"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" value="Enviar" name="enviando" id="enviando"></td>
      </tr>
    </table>
  </form>

</body>

</html>