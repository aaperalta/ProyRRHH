<?php

require'../class/sessions.php';
$objses = new Sessions();
$objses->init();

$objses->destroy();

header('Location: http://localhost:8080/proyecto_rrhh/');

?>