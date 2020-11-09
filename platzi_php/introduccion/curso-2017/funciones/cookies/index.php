<?php

/**
 * Las COOKIES son un mecanismo mediante el cual
 * nosotros podemos almacenar cierta informacion
 * en el navegador del cliente,es decir en lugar
 * de nosotros almacenar la informacion para
 * persistila como lo hicimos en las SESSIONS,
 * con las COOKIES estará del lado del cliente
 * 
 * Las ventajas de las COOKIES es que no se 
 * eliminan al momento de cerrar sesion
 * Se pueden utilizar para saber cuando un
 * usuario vuelve al sitio web, guardar 
 * preferencias del usuario.
 * 
 * No se recomienda guardar informacion sensible
 */

// para crear cookie
//setcookie('name', 'value', time() + 3600);
setcookie('count', '1', time() + 3600);

echo '<p>Cookie</p>';
