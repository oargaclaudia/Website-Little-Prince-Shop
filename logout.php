<?php
// Începeți sau reluați sesiunea
session_start();

// Distrugeți toate variabilele de sesiune
$_SESSION = array();

// Distrugem sesiunea efectiv
session_destroy();

// Redirecționați utilizatorul către pagina de login sau altă destinație
header("location:http://localhost/little-prince-shop/prima_pagina.php");
exit; // Asigură că scriptul nu continuă execuția după redirecționare
?>