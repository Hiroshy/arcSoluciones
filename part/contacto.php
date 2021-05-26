<div id="contacta" class="container-fluid dark-2 scroll-margin-5">
    <div class="container-fluid text-center py-4 text-light text-titulo">
        <p class="h1 m-0">contacto general</p>
    </div>
    <div class="row">
        <div class="col-md-2 dflex form-group justify-content-center align-items-center align-self-center text-center">
            <p class="text-light mb-0 rotate-lg-270 text-titulo">
                <span class="h1 display-1">ARC</span> 
                <span class="text-parrafo h2">SOLUCIONES</span>
            </p>
        </div>
        <div class="col-md-3 px-0 text-center align-self-center w-desktop "><img src="/assets/media/form/agente de arc.jpg" class="img-fluid" alt="ARC SOLUCIONES"></div>
        <div class="col-md-7 py-5 form-box">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off" class="my-0">
                <input type="hidden" name="url" value="<?php echo  $info_empresa['url_direccion']; ?>">
                <div class="form-row form-group mb-4">
                    <div class="col-md-6 mb-3">
                        <div class="form__group field">
                            <input type="input" class="form__field" placeholder="nombre" name="nombre" id='nombre' required />
                            <label for="nombre" class="form__label">Nombre</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form__group field">
                            <input type="input" class="form__field" placeholder="apellido" name="apellido" id='apellido' required />
                            <label for="apellido" class="form__label">Apellido</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form__group field">
                            <input type="input" class="form__field" placeholder="servicio" name="servicio" list="categoriaArc" id='servicio' required />
                            <label for="servicio" class="form__label">Servicio y/o Productos</label>
                            <datalist id="categoriaArc">
                                <?php  
                                    $categorias=new Categoria();
                                    $categorias=$categorias->sqlquery("SELECT * FROM categoria ORDER BY `categoria`.`categoria` ASC");
                                    foreach ($categorias as $categoria) :?>
                                <option value="<?php echo $categoria['categoria'];?>"><?php echo $categoria['categoria'];?></option>
                                <?php endforeach ?>
                            </datalist>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form__group field">
                            <input type="input" class="form__field" placeholder="5546025182" maxLength=10 pattern="[0-9]{1,12}" name="telefono" id='telefono' required />
                            <label for="telefono" class="form__label">Teléfono</label>
                        </div>
                    </div>
                    <div id="seguroAuto" class="col-12 px-0"></div>
                    <div class="col-md-12 mb-3 form-group">
                        <div class="form__group field w-90">
                            <input type="input" class="form__field" placeholder="mensaje" name="mensaje" id='mensaje' required />
                            <label for="mensaje" class="form__label">Mensaje</label>
                        </div>
                    </div>
                </div>
                <button type="submit" name="crear_interesado" class="btn-submit-form text-titulo-other">Vamos</button>
            </form>
        </div>
    </div>
</div>


<?php
    if (isset($_POST['crear_interesado'])):

        if (strtolower($_POST['servicio'])=="seguro de auto individual") {
            $registro=[
                'url'=>$_POST['url'],
                'nombre'=>$_POST['nombre'],
                'apellido'=>$_POST['apellido'],
                'servicio'=>$_POST['servicio'],
                'telefono'=>$_POST['telefono'],
                'mensaje'=>$_POST['mensaje'],
                'modelo'=>(isset($_POST['modelo']) AND strlen($_POST['modelo'])>2)?$_POST['modelo']:'',
                'serie'=>(isset($_POST['serie']) AND strlen($_POST['serie'])>2)?$_POST['serie']:'',
                'placa'=>(isset($_POST['placa']) AND strlen($_POST['placa'])>2)?$_POST['placa']:'',
                'detalle_carro'=>(isset($_POST['detalle_carro']) AND strlen($_POST['detalle_carro'])>2)?$_POST['detalle_carro']:'',
                'fecha_nacimiento'=>(isset($_POST['fecha_nacimiento']) AND strlen($_POST['fecha_nacimiento'])>2)?$_POST['fecha_nacimiento']:'null',
                'cp'=>$_POST['cp'],
                'marca_vehiculo'=>$_POST['marca']
            ];
        }else{
            $registro=[
                'url'=>$_POST['url'],
                'nombre'=>$_POST['nombre'],
                'apellido'=>$_POST['apellido'],
                'servicio'=>$_POST['servicio'],
                'telefono'=>$_POST['telefono'],
                'mensaje'=>$_POST['mensaje'],
                'modelo'=>'',
                'serie'=>'',
                'placa'=>'',
                'detalle_carro'=>'',
                'fecha_nacimiento'=>null,
                'cp'=>''
            ];
        }
        
        $interesados=new Interesado();
        $interesados->insertar($registro);
        
        $linkDesktop="web.whatsapp.com/send?phone=+521";
        $linkMobile="wa.me/521";
        $mi_mensaje_wsp="";
        if (strtolower($registro['servicio'])=='seguro de auto individual') {
            $mi_mensaje_wsp="https://$linkDesktop$info_empresa[telefono]&text=¡Hola! Mi *nombre* es $_POST[nombre] $_POST[apellido] estoy *interesado* en $_POST[servicio] mi número de *teléfono* es $_POST[telefono].  Con el siguiente *mensaje* : $_POST[mensaje] . Y mis datos son: *Modelo* : $_POST[modelo], *Serie* : $_POST[serie], *Placa* :$_POST[placa], *Versión* *del* *vehiculo* : $_POST[detalle_carro], *Fecha Nacimiento* : $_POST[fecha_nacimiento], *Código Postal* : $_POST[cp] , *Marca Vehiculo* : $_POST[marca]. *Gracias* *por* *su* *atención*";
        }else {
            $mi_mensaje_wsp="https://$linkDesktop$info_empresa[telefono]&text=¡Hola! Mi *nombre* es $_POST[nombre] $_POST[apellido] estoy *interesado* en $_POST[servicio] mi número de *teléfono* es $_POST[telefono]. Con el siguiente *mensaje* : $_POST[mensaje]. *Gracias* *por* *su* *atención* ";
        }
    ?>
   <script> 
       location.href='<?= $mi_mensaje_wsp;?>'
   </script>
       
<?php

    endif
?>