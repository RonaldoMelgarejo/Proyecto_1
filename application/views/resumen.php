<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.css">
    <script src="<?php echo base_url();?>bootstrap/js/bootstrap.js" ></script>
    <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/style.css"> 
    <title>Document</title>
</head>
<body>
    
    <header>
        <?php 
            include("menu.php");
        ?>
        <h1>Resumen</h1>

    </header>

    <main>
        <div class="container card mb-3">
            
            <br>
                <div class="card-body">
                <h5 class="card-title">Resumen:</h5>
                <p class="card-text">"El prototipo consiste en un dispositivo que se instala en el panel solar y envía datos sobre su rendimiento a un servidor web, donde se pueden visualizar y analizar.
                    El prototipo consta de un microcontrolador, un sensor de corriente y voltaje, un módulo de comunicación inalámbrica y una batería. El sensor de corriente y voltaje se utiliza para medir la energía generada por el panel solar, mientras que el módulo de comunicación inalámbrica permite la transmisión de datos a través de una red WiFi.
                    La información generada por el prototipo se puede visualizar en una interfaz de usuario en un sitio web. Esta interfaz muestra datos en tiempo real sobre el rendimiento de los paneles solares, como la energía generada. Además, la plataforma de monitoreo también puede proporcionar alertas para notificar al usuario sobre posibles fallas o problemas en el sistema.
                    Con este proyecto, se busca proporcionar a los propietarios y operadores de sistemas solares una herramienta efectiva para el monitoreo y mantenimiento de sus paneles solares, lo que se traduce en una mejor eficiencia y una mayor rentabilidad.
                    "</p>
                <br>
                
                
            </div>
        </div>

    </main>    




    <footer class="pie-pagina">
        <div class="grupo-2">
            <small>&copy; 2023 <b>Melgarejo Cardozo Ronaldo </b> - Todos los Derechos Reservados.</small>
        </div>
    </footer> 


    
<script src="<?php echo base_url();?>bootstrap/js/bootstrap.bundle.js" ></script>
</body>
</html>