<!DOCTYPE html>
<html lang="es_Mx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!- fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap');
        *{
            font-family: 'Open Sans', sans-serif !important;
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
            font-size: 2rem;
            font-family: 'Open Sans', sans-serif;
        }
        
        .nombre{
            margin:0 !important;
            text-align: center;
            font-size: 1.7rem;
            font-family: 'Open Sans', sans-serif;
            text-transform:uppercase;
        }
        
        .titulo-certificado small{
            text-align: center;
            font-size: .5em;
            font-family: 'Open Sans', sans-serif;
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

    </style>
    <title>Certificado - <?php echo $nombre; ?></title>
</head>
<body>
    <img src="../img/ARC.png" style="height: 400px !important;position:absolute;top:-1.1%;left:2.5%;">
    <img src="../../producto/<?= $insignia_sello; ?>" style="width: 500px !important;position:absolute;top:-3%;right:-1%;">
    <div class="main background">
        <header class="container_data" style="display: table;width: 100%;">
            <div class="col-md-4 align_self_center">
            </div>
            <div class="col-md-4 align_self_center">
                <h3 class="titulo-certificado" style="margin:1px">
                    <small>OTORGA EL PRESENTE</small> <br> 
                    RECONOCIMIENTO A:
                </h3>
                <h2 class="nombre" style="color:#2C3F5F;font-weight:bold;"><?php echo $nombre; ?></h2>
            </div>
            <div class="col-md-4 align_self_center">
            </div>
        </header>
        <main class="container_data" style="display: table;width: 100%;margin-bottom:100px">
            <div class="align_self_center">
                <!--<h2 class="nombre" style="color:#2C3F5F;font-weight:bold;"><?php echo $nombre; ?></h2>-->
            </div>
        </main>
        <div>
            <p class="container_data" style="width: 85%;margin:0 auto;text-align:center;font-size: 1.em;">
                Por su valiosa participación en el curso: <br><br>
                <span class="titulo-certificado" style="color:#2C3F5F;font-weight:bold;">“<?= $curso ?>”</span> <br>
                El <span style="color:#2C3F5F;font-weight:bold;" ><?= $el_dia ?></span> de
                <span style="color:#2C3F5F;font-weight:bold;" ><?= $el_mes ?></span> del <span style="color:#2C3F5F;font-weight:bold;" ><?= $el_ano ?></span>,
                con una duración de <span style="text-transform:uppercase;"><span style="color:#2C3F5F;font-weight:bold;" ><?= $horas ?> horas</span></span>. 
            </p>
            <br><br>
            <p class="container_data" style="width: 85%;margin:0 auto;text-align:center;font-size: 1.em;">
                Edo de México, a 
                <span style="color:#2C3F5F;font-weight:bold;" ><?= $el_dia_creado ?></span> de
                <span style="color:#2C3F5F;font-weight:bold;" ><?= $el_mes_creado ?></span> del <span style="color:#2C3F5F;font-weight:bold;" ><?= $el_ano_creado ?></span>
                <h3 class="titulo-certificado" style="margin:1px">
                    ATENTAMENTE
                </h3>
            </p>
        </div>
        
         <div style="margin:0 auto;text-align:center;position:relative;width:1100px;margin-top:100px">
            <img src="../../firmas/<?= $firma ?>" class="img-fluid" width="1100px" style="display:block;margin:0 auto;margin-top:-50px;">
            <div>
                <?= $profesor ?><br>
                <strong><?= $titulo_profesor ?> </strong> <br>
            </div>
        </div>
        
        <div style="margin:0 auto;text-align:center;position:relative;width:100%;margin-top:330px">
            <img src="linea_reconocimiento.png" width="109%" style="margin:0 auto;margin-left:-115px;"/>
        </div>
    </div>
    <img src="wallpaper_metal.jpg" style="position:absolute;top:-10%;left:-10%;width:200%;height:200%;z-index:-1;"/>
</body>
</html>