<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Advices | Doull</title>
</head>

<body>
    <h2>Recorrer y Consumir API Advices</h2>
    <p>El siguiente listado esta formateado para que pueda utilizarse para ser importado en la Base de Datos por medio de un INSERT INTO.</p>
    <p>Solamente se debe modificar en el codigo dentro del ciclo FOR en rango de los ID que se desean insertar en la BDD.</p>

    <?php

    // Ciclo para recorrer el API https://api.adviceslip.com
    // para copiarlo en un TXT para luego ser importado en una BDD local MySQL
    for ($i = 201; $i <= 224; $i++) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.adviceslip.com/advice/' . $i );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        $obj = json_decode($res);

        //var_dump($obj->slip->id);

        //var_dump($res["slip"][0]);
        //print_r($obj['slip']);
        echo '(';
        echo json_encode($obj->slip->id);
        echo ', ';
        echo json_encode($obj->slip->advice);
        echo '),';
        //echo '</br></br>';
        echo '</br>';

        curl_close($ch);
    }
    ?>

</body>

</html>