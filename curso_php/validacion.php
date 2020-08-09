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

<?php
if (isset($_POST["enviando"])) {
  $usuario = $_POST["nombre_usuario"];
  $edad = $_POST["edad_usuario"];

  if ($usuario == "Alan" && $edad >= 18) {
    echo '<p class="validado">Puedes entrar</p>';
  } else {
    echo '<p class="no_valido">No puedes entrar</p>';
  }
}
?>