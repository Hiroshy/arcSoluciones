<!DOCTYPE html>
<html lang="es_Mx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/theme.css">
    <!- fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Andika+New+Basic:wght@700&display=swap" rel="stylesheet">
    <?php
    $datos=[
        "nombre"=>"wissell brayan hiroshy pérez díaz",
        "curso"=>"manejo preventivo un hábito consciente",
        "finalizo"=>"13 de noviembre del 2020",
        "duracion"=>"5 horas",
        "profesor"=>"Julio César Chávez",
        "titulo_profesor"=>"Coordinador de Capacitación",
        "codSEP"=>"MUZJ-740110-N94-0005",
        "firma"=>"firma.png"
    ];
?>
    <style>
        *{
    margin:0;
    box-sizing: border-box;
    background-position:center;
    background-size:50%;
}
.main{
    width:100%;
    height:100vh;
    background:white;
    margin:-2px;
}
.background{
    background-image:url("/assets/media/logo_arc_transparente_30.png");
    background-size:40%;
    background-position:center;
    background-repeat:no-repeat;
}
.container {
    width:80%;
    margin:0 auto;
}
.titulo-certificado{
    font-family: 'Andika New Basic', sans-serif;
    text-align:center;
    font-size:4rem;
}
.nombre{
    font-family: 'Andika New Basic', sans-serif;
    text-transform:uppercase;
    text-align:center;
    font-size:2.8rem;
}
.subtitulo-certificacion{
    display:block;
    font-size:3rem;
    line-height:10px;
}
.escarapela {
    position: absolute;
    right: 5%;
    top: 5%;
}
.bar-sm{
    display:block;
    width:100px;
    height:3px;
    margin:35px auto 5px;
    background-color:#26374F;
}
.bar{
    display:block;
    width:100%;
    height:3px;
    margin-bottom:15px;
    background-color:#26374F;
}
.form-group{
    width:100%;
}
.text-center{
    text-align:center;
}
.img-fluid {
    max-width: 100%;
    height: auto;
}
.firmas{
    width:50%;
    margin:0 auto;
}
.bar-firma{
    display:block;
    width:250px;
    height:3px;
    margin: 0 auto;
    margin-top:-23px;
    margin-bottom:15px;
    background-color:#26374F;
}
.font-weight-bold{
    font-weight:bold;
}
    </style>
    <title>Certificado</title>
</head>
<body>
    <div class="main background">
        <div style="background:url(header.png);width:100%;height:100px;background-repeat:no-repeat;background-position:center;"></div>
        <div class="escarapela">
            <img src="escarapela.png" class="escarapela" alt="">
        </div>
        <div class="container">
            <div class="form-group">
                <h1 class="titulo-certificado" style="color:#DFA559">CERTIFICADO <span class="subtitulo-certificacion" style="color:#26374F;">de culminación</span></h1>
            </div>

            <span class="bar-sm"></span>

            <div class="form-group text-center">
                <h1 class="nombre" style=""><?php echo $datos['nombre']; ?></h1>
                <span class="bar"></span>
            </div>
            <div class="form-group text-center">
                <p class="lead">
                    Por su valiosa participación al cuso <span class="font-weight-bold">“<?php echo $datos['curso']; ?>”</span>.
                    El <?php echo $datos['finalizo']; ?>, con una duración de <?php echo $datos['duracion']; ?>. México, Edo de México, a 13 de noviembre del 2020
                </p>
            </div>

            <div class="form-group text-center">
                <div class="col-md-6 mx-0">
                    <div class="firmas text-center">
                        <img src="firma.png" class="img-fluid" width="300px" style="display:block;margin:0 auto;margin-top:20px;" alt="">
                        <span class="bar-firma"></span>
                        <?php echo $datos['profesor']; ?> <br>
                        <strong><?php echo $datos['titulo_profesor']; ?></strong> <br>
                        Registro ante la S.T.P.S.: <strong><?php echo $datos['codSEP']; ?></strong>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="footer">
            <img src="footer.png" style="position: absolute;width:100%;position:absolute;bottom:0;height:80px" alt="">
        </div>
    </div>
</body>
</html>