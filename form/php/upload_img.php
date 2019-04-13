<?php
// Declarando carpeta de fotografias de recibos
$ruta_fotos = "../img_recibos/";
// Encontrando la extension de la imagen
$extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
$nuevo_nombre = uniqid();
// Concatenando el nuevo nombre en base a un id unico y la extension de la imagen
$nuevo_nombre = $nuevo_nombre . '.' . $extension;
$nombreTemporal=$_FILES['foto']['tmp_name'];
// Moviendo la imagen con el nuevo nombre hacia la carpeta ../img_recibos
move_uploaded_file($nombreTemporal,$ruta_fotos . $nuevo_nombre);
echo $nuevo_nombre;
?>