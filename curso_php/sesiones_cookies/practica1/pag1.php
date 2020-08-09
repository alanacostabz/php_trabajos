<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <?php
  if (isset($_COOKIE['idioma_seleccionado'])) {
    if ($_COOKIE['idioma_seleccionado'] == 'es') {
      header('Location:spanish.php');
    } else if ($_COOKIE['idioma_seleccionado'] == 'in') {
      header('Location:english.php');
    }
  }
  ?>

  <table width="25%" border="0" align="center">
    <tr>
      <td colspan="2" align="center">
        <h1>Elige idioma</h1>
      </td>
    </tr>
    <tr>
      <td align="center"><a href="crea_cookie.php?lang=es"><img src="img/mex.png" width="90" height="60"></a></td>
      <td align="center"><a href="crea_cookie.php?lang=in"><img src="img/eua.png" width="90" height="60"></a></td>
    </tr>
  </table>
  <p>&nbsp</p>
  <p>&nbsp</p>
</body>

</html>