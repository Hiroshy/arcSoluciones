<!DOCTYPE html>
<html lang="es_Mx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <style>
        *{
            margin:0;
            box-sizing: border-box;
            background-position:center;
            background-size:50%;
        }
        .main{
            height:1060px ;
            width:720px;
            background:white;
            margin:0 auto;
            position:relative;
        }
        .background{
            background-image:url("logo_arc_transparente_30.png");
            background-size:40%;
            background-position:center;
            background-repeat:no-repeat;
        }
        .container {
            width:100%;
            margin:0 auto;
        }
        .titulo-certificado{
            font-family: 'Andika New Basic', sans-serif;
            text-align:center;
            font-size: 1.2rem;
        }
        .font-titulo{
            font-family: 'Poppins', sans-serif;
        }
        .table-layout {
            width: 100%;
            margin: 0 auto;
            border-collapse: separate;
            border-spacing: 0;
        }
        small {
            font-size: .75em;
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
        .table-layout{
            width:100%;
            margin:0 auto;
        }
        .bg-dark{
            background: black;
            color: #fff;
            padding: 4px;
        }
        .border-top{
            border-top:1px solid #000;
        }
        .border-left{
            border-left: 1px solid #000;
        }
        .border-right{
            border-right:1px solid #000;
        }
        .border-bottom{
            border-bottom:1px solid #000;
        }
        .padding-1 {
            display: block;
            margin: 2px 0px;
        }
        tr{
            outline:2px;
        }
        .text-uppercase{
            text-transform:uppercase;
        }
        td {
            outline: 0px;
        }
        .row{
            display:flex;
            flex-direction:row;
        }
        .img-fluid{
            max-width: 100%;
            height: auto;
        }
        .col-3{
            width:30%;
        }
        .col-4{
            width:40%;
        }
        .col-6 {
            width:60%;
        }
        .align-self-center{
            align-self:center;
        }
        .mt-2{
            margin-top:20px;
        }
        .border-0{
            border:0;
        }
        .arc_logo_centro{
            position:absolute;
            top:25%;
            left:25%;
            z-index:-99;
        }
        .table-fluid{
            width:100%;
        }
        .col-4-table{
            width: 33.33%;
        }
        .bottom{
            bottom: 40px;
            position: absolute;
        }
        .fondo_pantall{
            position:absolute;
            top:25%;
            left:15%;
        }
        *{
            font-size:1rem;
        }
        .d-block{
            display:block;
        }
        .text-uppercase{
            text-transform:uppercase;
        }
        html { margin: 0px} 
        @page { margin: 0px; } body { margin: 0px; } 
    </style>
    <title>DC3 - <?= $nombre; ?> </title>

</head>
<body>
    <?php

        function separar_letras($text){
            $letra_separada=str_split($text);
            $cuenta=COUNT($letra_separada);
            for($i=0;$i<$cuenta;$i++){
                echo $letra_separada[$i]." | ";
            }
        } 

        function separar_letras_despues($text){
            $separamos=str_split($text);
            echo $juntamos=implode(' | ',$separamos);
        } 

    ?>
    <div class="main background" style="top:0">    
        <div class="container" style="margin-top:20px;z-index:2;">

       <table class="table-layout text-center">
            <tr>
                <td class="border-0" style="width:10%;">
                    <img src="../../empresa/logo_arc_dc3.jpg" height="250px" style="position: relative;left: -30px;height:120px !important;" alt="">
                </td>
                <td class="border-0" style="width:auto;">
                    <small>
                        <h1 class="titulo-certificado">
                            FORMATO DC-3 <br>
                            CONSTANCIA DE COMPETENCIAS O DE HABILIDADES LABORALES 
                        </h1>
                    </small>
                </td>
                <td class="border-0 text-center" style="width:18%;">
                    <img src="../../empresa/<?= $empresa; ?>" style="width:130px !important;" alt="">
                </td>
            </tr>
        </table>
            

            <table class="table-layout">
                <tr>
                    <td class="bg-dark text-center" colspan="2" >
                        <small class="font-titulo">DATOS DEL TRABAJADOR</small>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="border-left border-right border-bottom">
                        <small>Nombre (Anotar apellido paterno, apellido materno y nombre (s)</small> <br>
                        <small class="font-weight-bold text-uppercase"><?= $nombre;?></small>
                    </td>
                </tr>
                <tr>
                    <td class="border-left border-right border-bottom">
                        <small>Clave Única de Registro de Población</small> <br>
                        <small class="font-weight-bold text-uppercase"><?= separar_letras(mb_strtoupper($curp)); ?></small>
                    </td>
                    <td class="border-right border-bottom">
                        <small>Ocupación específica (Catálogo Nacional de Ocupaciones)</small> <br>
                        <small class="font-weight-bold text-uppercase"><?= $ocupacion; ?></small>
                    </td>
                </tr>
                <tr>
                    <td class="border-left border-right border-bottom" colspan="2">
                        <small>Puesto*</small> <br>
                        <small class="font-weight-bold text-uppercase"><?= $puesto; ?></small>
                    </td>
                </tr>
            </table>
            <br>
            <table class="table-layout">
                <tr>
                    <td class="bg-dark text-center" colspan="2" >
                        <small class="font-titulo">DATOS DE LA EMPRESA</small>
                    </td>
                </tr>
                <tr>
                    <td class="border-left border-right border-bottom" colspan="2">
                        <small>Nombre o razón social (En caso de persona física, anotar apellido paterno, apellido materno y nombre(s)</small> <br>
                        <small class="font-weight-bold text-uppercase">ALBERTO LECONA VAZQUEZ</small>
                    </td>
                </tr>
                <tr>
                    <td class="border-left border-right border-bottom" colspan="2">
                        <small>Registro Federal de Contribuyentes con homoclave (SHCP)</small> <br>
                       <small class="font-weight-bold text-uppercase"> L | E | V | A | - | 8 | 8 | 0 | 8 | 2 | 3 | - | 3 | 7 | 0 |</small>
                    </td>
                </tr>
            </table>
            <br>
            <table class="table-layout">
                <tr>
                    <td class="bg-dark text-center" colspan="9" >
                        <small class="font-titulo">DATOS DEL PROGRAMA DE CAPACITACIÓN, ADIESTRAMIENTO Y PRODUCTIVIDAD</small>
                    </td>
                </tr>
                <tr>
                    <td class="border-left border-right border-bottom" colspan="9">
                        <small>Nombre del curso</small> <br>
                        <small class="font-weight-bold text-uppercase"> <?= $curso ?></small>
                    </td>
                </tr>
                <tr>
                    <td class="border-left border-right border-bottom" class="text-center">
                        <small>Duración de horas</small> <br>
                        <small class="font-weight-bold text-uppercase"><?= $horas ?> horas</small>
                    </td>

                    <td class="border-right border-bottom" >
                        <small>Periodo de <br> Ejecución : De </small>
                    </td>

                    <td class="text-center border-right border-bottom">
                        <small>Año</small> <br>
                        <small class="font-weight-bold text-uppercase"><?= separar_letras_despues(date("Y",$dia_empezo_c)); ?></small>
                    </td>

                    <td class="text-center border-right border-bottom">
                        <small>Mes</small> <br>
                        <small class="font-weight-bold text-uppercase"><?= separar_letras_despues(date("m",$dia_empezo_c)) ;?></small>
                    </td>

                    <td class="text-center border-right border-bottom">
                        <small>Día</small> <br>
                        <small class="font-weight-bold text-uppercase"><?= separar_letras_despues(date("d",$dia_empezo_c)); ?> </small>
                    </td>

                    <td class="text-center border-right border-bottom">
                        <small>a</small>
                    </td>

                    <td class="text-center border-right border-bottom">
                        <small>Año</small><br>  
                        <small class="font-weight-bold text-uppercase"><?= separar_letras_despues(date("Y",$dia_termino_c)); ?> </small>
                    </td>

                    <td class="text-center border-right border-bottom">
                        <small>Mes</small><br>  
                       <small class="font-weight-bold text-uppercase"> <?= separar_letras_despues(date("m",$dia_termino_c)); ?> </small>
                    </td>

                    <td class="text-center border-right border-bottom">
                        <small>Día</small><br>  
                        <small class="font-weight-bold text-uppercase"><?= separar_letras_despues(date("d",$dia_termino_c)); ?> </small>
                    </td>

                </tr>

                <tr>
                    <td class="border-left border-right border-bottom" colspan="9">
                        <small>Área temática del curso</small> <br>
                        <small class="font-weight-bold text-uppercase"><?php echo $area_tematica_curso; ?> </small>
                    </td>
                </tr>

                <tr>
                    <td class="border-left border-right border-bottom" colspan="9">
                        <small>Nombre del Agente Capacitador o STPS</small> <br>
                        <small class="font-weight-bold text-uppercase"><?= mb_strtoupper($profesor) ?> &nbsp;&nbsp;&nbsp;&nbsp; </small> <span class="text-right">STPS: <small class="font-weight-bold text-uppercase"><?= mb_strtoupper($codSEP) ?> </small> </span>
                    </td>
                </tr>
            </table>
            <br> <br>
            <table class="table-layout">
                    <tr>
                        <td colspan="3" class="text-center border-left border-right border-top" style="padding: 10px 5px 10px 5px;">
                            <strong>
                                Los datos se asientan en esta constancia bajo protesta de decir verdad, apercibidos de la responsabilidad en que incurre todo aquel que no se conduce con verdad.
                            </strong>
                        </td>
                    </tr>
            </table>
            <table class="table-layout">
                    <tr>
                        <td class="text-center border-left border-bottom">
                            <small>Instructor o tutor</small><br><br>
                            <img src="../../firmas/<?=$firma;?>" width="250"height="100" style="display:block; min-width:100%;height:auto;margin-top:-3px;margin-bottom: -30px;" alt="firma">
                            <small><strong class="font-weight-bold text-uppercase"><?= $profesor ?></strong></small>
                            <span>___________________________<br></span>
                            Nombre y firma
                        </td>
                        <td class="text-center border-bottom">
                            <small>Patrón o Representante Legal</small><br>
                            <div style="height:70px;"></div>
                            <small><strong class="font-weight-bold text-uppercase"><?= $repr_legal;?></strong></small>
                            <span>___________________________<br></span>
                            Nombre y firma
                            
                        </td>
                        <td class="text-center border-right border-bottom">
                            <small>Representante de los trabajadores</small> <br>
                            <div style="height:70px;"></div>
                            <small><strong class="font-weight-bold text-uppercase"><?= $repr_trabajadores;?></strong></small>
                            <span>___________________________<br></span>
                            Nombre y firma
                        </td>
                    </tr>
            </table>
            <br>
            <div style="">
                <small class="d-block">INSTRUCCIONES</small> 
                <small class="d-block">- Llenar a máquina o con letra de molde.</small>
                <small class="d-block">- Deberá entregarse al trabajador dentro de los veinte días hábiles siguientes al término del curso de capacitación aprobado.</small>
                <small class="d-block">1/ Las áreas y subáreas ocupacionales del Catálogo Nacional de Ocupaciones se encuentran disponibles en el reverso de este formato y en la página <a href="www.stps.gob.mx">www.stps.gob.mx</a></small>
                <small class="d-block">2/ Las áreas temáticas de los cursos se encuentran disponibles en el reverso de este formato y en la página <a href="www.stps.gob.mx">www.stps.gob.mx</a></small>
                <small class="d-block">3/ Cursos impartidos por el área competente de la Secretaria del Trabajo y Previsión Social.</small>
                <small class="d-block">4/ Para empresas con menos de 51 trabajadores. Para empresas con más de 50 trabajadores firmaría el representante del patrón ante la Comisión mixta de capacitación,
                adiestramiento y productividad.</small>
                <small class="d-block">5/ Solo para empresas con más de 50 trabajadores.</small>
                <small class="d-block">* Dato no obligatorio.</small>
            </div>
        </div>
    </div>
</body>
</html>