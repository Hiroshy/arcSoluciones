<form id="form" action="<?php echo $info_empresa['url_direccion']; ?>" method="post" class="mb-5">
    <input type="hidden" name="id" value="<?php echo $detalleProducto['id']; ?>">
    <input type="hidden" name="token" value="<?php echo md5(rand(0,99999)); ?>">
    <div class="form-group mt-4">
        <p class="clasificacion text-center mt-4">
            <input id="radio5" type="radio" name="estrellas" value=5>
            <label for="radio5" class="label_estrella"><i class="fas fa-star fa-2x"></i></label>
            
            <input id="radio4" type="radio" name="estrellas" value=4>
            <label for="radio4" class="label_estrella"><i class="fas fa-star fa-2x"></i></label>
            
            <input id="radio3" type="radio" name="estrellas" value=3>
            <label for="radio3" class="label_estrella"><i class="fas fa-star fa-2x"></i></label>
            
            <input id="radio2" type="radio" name="estrellas" value=2>
            <label for="radio2" class="label_estrella"><i class="fas fa-star fa-2x"></i></label>
            
            <input id="radio1" type="radio" name="estrellas" value=1>
            <label for="radio1" class="label_estrella"><i class="fas fa-star fa-2x"></i></label>
        </p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="form__group field mx-0 ">
                    <input type="input" class="form__field text-dark" placeholder="titulo_resena_producto" name="titulo_resena_producto" id='titulo_resena_producto' required />
                    <label for="titulo_resena_producto" class="form__label text-capitalize">Titulo</label>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form__group field mx-0 ">
                    <input type="email" class="form__field text-dark" placeholder="email" name="email" id='email_resena' required />
                    <label for="email_resena" class="form__label text-capitalize">email</label>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form__group field mx-0 ">
                    <input type="input" class="form__field text-dark" placeholder="nombre_completo" name="nombre_completo" id='nombre_completo_resena' required />
                    <label for="nombre_completo_resena" class="form__label text-capitalize">nombre completo</label>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form__group field mx-0 ">
                    <input type="input" class="form__field text-dark" maxlength="12" placeholder="telefono" name="telefono" id='telefono_resena' required />
                    <label for="telefono_resena" class="form__label text-capitalize">teléfono </label>
                </div>
            </div>
            <div class="col-md-12 mb-5">
                <div class="form__group field mx-0 ">
                    <input type="input" class="form__field text-dark"  placeholder="mensaje_contacto" name="mensaje_contacto" id='mensaje_contacto_resena' required />
                    <label for="mensaje_contacto_resena" class="form__label text-capitalize">mensaje</label>
                </div>
            </div>
        </div>
        <div class="form-group text-center w-100">
            <button type="submit" name="crear_opinion" class="btn-submit-form mx-0">Vamos</button>
        </div>
    </div>
</form>

<?php
    if(isset($_POST['crear_opinion'])):
        $id_producto=$_POST['id'];
        $datos_comentario=[
            "id"=>$_POST['id'],
            "token"=>$_POST['token'],
            "estrellas"=>$_POST['estrellas'],
            "tituloComentario"=>$_POST['titulo_resena_producto'],
            "email"=>$_POST['email'],
            "nombreCompleto"=>$_POST['nombre_completo'],
            "telefono"=>$_POST['telefono'],
            "mensaje"=>$_POST['mensaje_contacto']
        ];

        /**OPERADORES */
        $sumandoDB="";
        $sumandoComment=$datos_comentario['estrellas'];
        $promedio="";
        $totalUsuarios="";
        /**Sumamos el total de personas que comentarón */
        $totalQComent_temp=new Productos();
        $totalQComent_temp=$totalQComent_temp->sqlquery("SELECT COUNT(puntuacion) as 'personas' FROM usuario_xomenta_producto WHERE id_producto=$datos_comentario[id];");
        if ($totalQComent_temp[0]['personas']==0) {
            $insertaComentario=new Productos();
            $insertaComentario=$insertaComentario->sqlquery("INSERT INTO usuario_xomenta_producto ( `id_producto`, `token`, `titulo`, `email`, `nombre`, `telefono`, `mesaje`, `puntuacion`) VALUES( $datos_comentario[id],'$datos_comentario[token]','$datos_comentario[tituloComentario]','$datos_comentario[email]','$datos_comentario[nombreCompleto]','$datos_comentario[telefono]','$datos_comentario[mensaje]',$datos_comentario[estrellas])");
            $actualiza=new Productos();
            $actualiza=$actualiza->sqlquery("UPDATE `producto` SET `puntuacion`='$datos_comentario[estrellas]' WHERE `id`= $id_producto ");
            echo '
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <strong> Gracias </strong> Tu comentario ha sido publicado.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            ';
        }else{
            $totalUsuarios=$totalQComent_temp[0]['personas'];
            $totalQComent_temp=new Productos();
            $totalQComent_temp=$totalQComent_temp->sqlquery("SELECT SUM(puntuacion) as 'puntuacionDB' FROM usuario_xomenta_producto WHERE id_producto=$datos_comentario[id];");
            $sumandoDB=$totalQComent_temp[0]['puntuacionDB'];
            $sumandoComment;
            $promedio=($sumandoDB+$sumandoComment)/($totalUsuarios+1);
            $promedio=intval($promedio);
            /**Actualizamos el ranking del producto */
            $actualiza=new Productos();
            $actualiza=$actualiza->sqlquery("UPDATE `producto` SET `puntuacion`='$promedio' WHERE `id`= $id_producto ");
            $insertaComentario=new Productos();
            $insertaComentario=$insertaComentario->sqlquery("INSERT INTO usuario_xomenta_producto ( `id_producto`, `token`, `titulo`, `email`, `nombre`, `telefono`, `mesaje`, `puntuacion`) VALUES( $datos_comentario[id],'$datos_comentario[token]','$datos_comentario[tituloComentario]','$datos_comentario[email]','$datos_comentario[nombreCompleto]','$datos_comentario[telefono]','$datos_comentario[mensaje]',$datos_comentario[estrellas])");
            echo "
                <script> 
                    location.href='$info_empresa[url_direccion]'
                </script>
            ";
        }
    endif
?>