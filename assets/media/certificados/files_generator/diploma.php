<!DOCTYPE html>
<html lang="es_Mx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Roboto', sans-serif;
        }
        .main{
            margin-top:2px !important;
            position:relative;
        }
        .background{
            background-image:url("wallpaper_metal.jpg");
            background-size:cover;
            background-position:center;
        }

        .titulo-certificado {
            text-align: center;
            font-size: 2.7rem;
            font-weight: bolder;
        }
        
        
        .align_self_center{
            display: table-cell;
            vertical-align: middle;
            text-align:center;
        }
        
        .line_name{
            display:block;
            width:1500px;
            height:3px;
            background:black;
            margin: 0 auto;
            margin-bottom:70px;
        }
        .text-uppercase{
            text-transform: uppercase;
        }

    </style>
    <title>Certificado - <?php echo $nombre; ?></title>
</head>
<body>
    <img src="marco.png" style="position:absolute;top:-6.3%;left:-4.7%;width:40%;">
    <img src="marco.png" style="position:absolute;top:-6.3%;right:-4.7%;width:40%;transform:rotate(-90deg);transform: scaleX(-1);">
    <img src="marco_down.png" style="position:absolute;bottom:-70.9%;left:-4.7%;width:40%;transform:rotate(0deg);transform: scaleX(1);">
    <img src="marco_down.png" style="position:absolute;bottom:-70.9%;right:-4.7%;width:40%;transform:rotate(90deg);transform: scaleX(-1);">
    
    
    <div class="main background">
        <header class="container_data" style="display: table;width: 100%;">
            <div class="col-md-4 align_self_center"></div>
            <div class="col-md-4 align_self_center">
                <h3 class="titulo-certificado">
                    <img src="casa.png" style="width: 300px!important;margin-bottom:2px;"><br>
                    DIPLOMA
                </h3>
            </div>
            <div class="col-md-4 align_self_center"></div>
        </header>
        
        <img src="circulos.png" style="margin:0 auto;margin-left:30%;">
        
        <main class="container_data" style="display: table;width: 100%;margin-top:100px">
            <div class="align_self_center">
                <h2 class="nombre text-uppercase" style="display:block;"><?php echo $nombre; ?></h2>
                <span class="line_name"></span>
            </div>
        </main>
        <div>
            <p class="container_data" style="width: 80%;margin:0 auto;text-align:center;font-weight:bold;">
                Por su valiosa participación al cuso: <br> 
                <span style="color:#2C3F5F;font-weight:bold;"> “<?= $curso ?>” </span><br>
                El <span style="color:#2C3F5F;font-weight:bold;" > <?= $el_dia ?> </span> de
                <span style="color:#2C3F5F;font-weight:bold;" ><?= $el_mes ?></span> del <span style="color:#2C3F5F;font-weight:bold;" ><?= $el_ano ?></span>, 
                con una duración de <span style="text-transform:uppercase;"><span style="color:#2C3F5F;font-weight:bold;" ><?= $horas ?> horas</span></span>. 
            </p>
            <p class="container_data" style="width: 80%;margin:0 auto;text-align:center;font-weight:bold;">
                Edo de México, a 
                <span style="color:#2C3F5F;font-weight:bold;" ><?= $el_dia_creado ?></span> de
                <span style="color:#2C3F5F;font-weight:bold;" ><?= $el_mes_creado ?></span> del <span style="color:#2C3F5F;font-weight:bold;" ><?= $el_ano_creado ?></span>
            </p>
        </div>
        
         <div style="margin:0 auto;text-align:center;position:relative;width:1100px;margin-top:200px">
            <img src="../../firmas/<?= $firma ?>" class="img-fluid" width="1100px" style="display:block;margin:0 auto;margin-top:-50px;">
            <div>
                <small style="font-weight:bold"><?= $profesor ?><br></small>
                <strong><?= $titulo_profesor ?> </strong> <br>
            </div>
        </div>
        
    </div>
    <img src="wallpaper_metal.jpg" style="position:absolute;top:-10%;left:-10%;width:200%;height:200%;z-index:-1;"/>
</body>
</html>