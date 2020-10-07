<?php
session_start();

// destruir una variable
unset($_SESSION['count']);

// otra opcion es destruir la session
// esta funcion la destruye  y cierra
// session_destroy();
