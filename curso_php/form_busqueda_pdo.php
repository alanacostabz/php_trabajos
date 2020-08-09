<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    table {
      width: 300px;
      margin: auto;
      background: lightseagreen;
      border: solid 1px black;
      padding: 5px;
    }

    td {
      text-align: center;
    }
  </style>
</head>

<body>
  <form action="pagina_busqueda_pdo.php" method="GET">
    <table>
      <tr>
        <td>
          Sección:</td>
        <td><input type="text" name="seccion"></td>
      </tr>
      <tr>
        <td> P origen:</td>
        <td> <input type="text" name="p_orig"></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="Buscar" name="enviando"></td>
      </tr>
    </table>
  </form>
</body>

</html>