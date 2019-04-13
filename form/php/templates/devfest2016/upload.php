<?php

$ruta_fotos = "fotos/";
$extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);


$nuevo_nombre = uniqid();
$nuevo_nombre = $nuevo_nombre . '.' . $extension;

$nombreTemporal=$_FILES['foto']['tmp_name'];

move_uploaded_file($nombreTemporal,$ruta_fotos . $nuevo_nombre);

echo $nuevo_nombre;

?>