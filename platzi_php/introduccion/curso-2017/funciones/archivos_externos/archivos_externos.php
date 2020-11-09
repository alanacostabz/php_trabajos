♠<?php
    /**
     * La diferencia entre include y require
     * es que en include si hay un error en el 
     * archivo en el archivo externo, nuestro 
     * código no se detendrá, caso contrario
     * en require donde si se detendrá
     */
    include_once 'functions.php';
    //require 'functions.php';
    echo '<p>Text from archivos_externos.php</p>';

    sum(10, 20);


    /**
     * include_once hace una verificacion para
     * saber si previamente ha sido el archivo
     * cargado, y en caso de que sea así no lo
     * vuelve hacer, de esta forma evitamos que 
     * se dupliquen las funciones por ejemplo,
     * lo mismo con el require once.
     */
