<?php
$finCurso="24-09-2020";
date_default_timezone_set("Europe/Madrid");
                setlocale(LC_TIME, "spanish");
                echo $finCurso=strftime("%d de %B del %Y",strtotime($finCurso));
?>
