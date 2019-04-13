<?php
date_default_timezone_set("America/La_Paz");

$app->map('/participantes/registrar', function() use($app, $db){
    // Fecha a la cual debe cumplirse la promocion determinada
    $ahora = date("Y-m-d");
    $octubre = mktime(0, 0, 0, 10, 31, 2016);
    $fechaPromo = date("Y-m-d", $octubre);
    
    // Verificando variables que no son requeridas para la reserva
    $apat = isset($_POST["apat"]) ? $_POST["apat"] : "";
    $amat = isset($_POST["amat"]) ? $_POST["amat"] : "";
    $cel = isset($_POST["cel"]) ? $_POST["cel"] : "";
    $tipo = strtolower($_POST["tipo"][0]) == 'e' ? 'Estudiante': 'Profesional';
    $talla = isset($_POST['talla']) ? $_POST['talla'] : ""; 
    $precioEntrada = ($tipo == 'Estudiante') ? 35 : 50;
    $tazas = isset($_POST["taza"]) ? 1 : 0;
    $poleras = isset($_POST["polera"]) ? 1 : 0;
    // Sacando el total de la compra
    if($ahora < $fechaPromo){
        $totalEntrada = $precioEntrada;
        $souvenirTotal =  ($tazas * 20) + ($poleras * 39);   
    }else{
        $totalEntrada = $precioEntrada + 10;
        $souvenirTotal =  ($tazas * 20) + ($poleras * 39);   
    }
    $total = $totalEntrada + $souvenirTotal;

    $registros = $db->registro();
    // Comprobando que los campos de la foto y el recibo no estan vacios
    // si lo estan, daran un valor falso, por lo que se trata de una reserva
    $esRegistro = ($_POST["img_bd"] == "" OR $_POST["recibo"] == "") ? false: true;
    if($esRegistro){
               $data = array(
                    // El ID del evento esta siendo manejado de forma estatica por el momento
                    "ID_EVENTO" => 1,
                    "NOMBRE"    => $_POST["nombre"],
                    "APAT"      => $apat,
                    "AMAT"      => $amat,
                    "CORREO"    => $_POST["mail"],
                    "CI"        => $_POST["ci"],
                    "CELULAR"   => $_POST["cel"],
                    "TIPO"      => $tipo
                );
                $result = $registros->insert($data);
                $registro = $db->registro()->select('ID_REGISTRO')->where('CORREO = ?', $_POST["mail"])->fetch();
                $img_data = array(
                        "ID_REGISTRO"   => $registro["ID_REGISTRO"],
                        "IMG_RECIBO"    => $_POST["img_bd"],
                        "CODIGO_RECIBO" => $_POST["recibo"],
                        "BANCO"         => $_POST["banco"],
                        "TOTAL_PAGADO"  => $total
                    );
                $inscripcionWeb = $db->inscripcion_web();
                $res = $inscripcionWeb->insert($img_data);
                
                $souvenir_data = array(
                        "ID_REGISTRO"       => $registro["ID_REGISTRO"],
                        "CANTIDAD_TAZAS"    => $tazas,
                        "CANTIDAD_POLERAS"  => $poleras,
                        "TALLA_POLERA"      => $talla,
                        "TOTAL_SOUVENIR"    => $souvenirTotal
                    );
                $souvenirRegistro = $db->souvenir();
                $souvenirRegistro->insert($souvenir_data);
                echo "Bien hecho";
    }
    else{
        echo "Hubo un error";
        
    }
    $nombre = $app->request->post('');
})->via(['GET', 'POST']);
