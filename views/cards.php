<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TAILWIND CSS LOCAL-->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        bodybg: '#202632',
                        cardbg: '#313A49',
                        title_color: '#53FDA8',
                        content_color: '#DDEEFB',
                    }
                }
            }
        }
    </script>

    <title>Advices | Doull</title>
</head>

<body class="bg-bodybg flex items-center justify-center h-screen">

    <?php
    $random = rand(1, 224);
    $id = "";
    $content = "";

    require_once "../config/database.php";
    $res = $mysqli->query("select id_advice, advice from advices where id_advice = '$random'");
    $data = $res->fetch_all(MYSQLI_ASSOC);

    //var_dump($random);
    //echo "</br>";
    //var_dump($data);
    foreach ($data as $advices) {
        //var_dump($advices["id_advice"]);
        //var_dump($advices["advice"]);
        $id = $advices["id_advice"];
        $content = $advices["advice"];
    }
    ?>

    <div class="bg-cardbg max-w-sm rounded-2xl items-center overflow-hidden shadow-lg">

        <div class="bg-cardbg px-6 py-4 text-center">
            <div class="object-center font-bold text-xl mb-2 text-title_color">ADVICE # <?php echo $id ?></div>
            <div>
                <p class="object-center text-base text-content_color"><?php echo '"'. $content .'"' ?></p>
            </div>
            <div class="object-center  text-base">
                <p>----------</p>
            </div>
        </div>
        <div class="object-center f">
            <img class="mx-auto m-5 object-cover object-center rounded" src="../img/random.svg" alt="Icono Random">
            <img class="mx-auto m-5 object-cover object-center rounded" src="../img/circle.svg" alt="Icono Circle">
        </div>

    </div>


</body>

</html>