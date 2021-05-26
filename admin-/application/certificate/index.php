<?php
    $datos=[
        "id_certificado"=>"uxtx-232fn",
        "nombre"=>"Rodrigo Abascal Munguia",
        "curso"=>"manejo preventivo un hábito consciente",
        "finalizo"=>"13 de noviembre del 2020",
        "horas"=>"5 horas",
        "profesor"=>"Julio César Chávez",
        "titulo_profesor"=>"Coordinador de Capacitación",
        "codSEP"=>"MUZJ-740110-N94-0005",
        "firma"=>"firma.png"
    ]
?>
<!DOCTYPE html>
<html lang="es_Mx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!- fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Andika+New+Basic:wght@700&display=swap" rel="stylesheet">
    <style>
        *{
            margin:0;
            box-sizing: border-box;
            background-position:center;
            background-size:50%;
        }
        .main{
            width:1060px ;
            height:640px;
            background:white;
            margin:0 auto;
            position:relative;
        }
        .background{
            background-image:url("logo_arc_transparente_30.png");
            background-size:40%;
            background-position:center;
            background-repeat:no-repeat;
            background:white;
        }
        .container {
            width:100%;
            margin:0 auto;
        }
        .titulo-certificado{
            font-family: 'Andika New Basic', sans-serif;
            text-align:center;
            font-size:2.8rem;
        }
        .nombre{
            font-family: 'Andika New Basic', sans-serif;
            text-transform:uppercase;
            text-align:center;
            font-size:1.5rem;
        }
        .subtitulo-certificacion{
            display:block;
            line-height:50px;
        }
        .escarapela {
            position: absolute;
            right: 8%;
            top: 5%;
            width:100px;
        }
        .w-100{
            width:100%;
        }
        .w-80{
            width:80%;
        }
        .w-70{
            width:70%;
        }
        .w-60{
            width:60%;
        }
        .w-50{
            width:50%;
        }
        .mx-0{
            margin:0 auto;
        }
        .bar-sm{
            display:block;
            width:100px;
            height:3px;
            margin:15px auto 25px;
            background-color:#26374F;
        }
        .bar{
            display:block;
            width:80%;
            height:3px;
            background-color:#26374F;
            margin: 0 auto;
            margin-bottom:15px;
        }
        .form-group{
            margin-bottom:1rem;
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
        .header{
            position:absolute;  
            top:0;
        }
        .text-uppercase{
            text-transform:uppercase;
        }
        .footer{
            width:100%;
            position:absolute;
            bottom:0;
            margin:0;
        }
    </style>
    <title>Certificado</title>
</head>
<body>
    <div class="main background">
        <div class="header">
            <img src="header.png" class="img-fluid" alt="">
        </div>
        <div class="escarapela">
            <img src="escarapela.png" class="escarapela" alt="">
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>    
        <br>
        <img src="logo_arc_transparente_30.png" class=img-fluid style="z-index:-1;width:500px;margin:0 auto;margin-left:25%" alt="">
        <div class="container" style="margin-top:50px;z-index:2;">
            <div class="form-group">
                <h1 class="titulo-certificado" style="color:#DFA559">CERTIFICADO <span class="subtitulo-certificacion" style="color:#26374F;">de culminación</span></h1>
            </div>

            <span class="bar-sm"></span>

            <div class="form-group text-center">
                <h1 class="nombre" style=""><?php echo $datos['nombre']; ?></h1>
                <span class="bar"></span>
            </div>
            <div class="form-group text-center w-70 mx-0">
                <p class="lead">
                    Por su valiosa participación al cuso <span class="font-weight-bold">“<?php echo $datos['curso']; ?>”</span>.
                    El <?php echo $datos['finalizo']; ?>, con una duración de <?php echo $datos['horas']; ?>. México, Edo de México, a 13 de noviembre del 2020
                </p>
            </div>

            <div class="form-group w-100 text-center">
                <div class="w-50 mx-0" style="position:relative;">
                    <div class="firmas text-center">
                        <div class="form-group">
                            <img src="firma.png" class="img-fluid" width="300px" style="display:block;margin:0 auto;margin-top:20px;" alt="">
                            <br>
                        </div>
                    </div>
                </div>

                <div class="w-70 mx-0" style="margin-top:80px;">
                    <div class="firmas text-center">
                        <div class="form-group">
                                                    <!-- <span class="bar-firma"></span> -->
                            <?php echo $datos['profesor']; ?> <br>
                            ID : <strong class="text-uppercase"><?php echo $datos['id_certificado']; ?></strong> <br>
                            <strong><?php echo $datos['titulo_profesor']; ?></strong> <br>
                           <!-- Registro ante la S.T.P.S.: <strong><?php echo $datos['codSEP']; ?></strong> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="footer">
            <img src="footer.png" style="width:100%" class="img-fluid" alt="">
        </div>
    </div>
</body>
</html>