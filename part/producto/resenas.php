<div class="container py-5">
    <div class="box-comment">
        <ul class="list-unstyled">
            <?php  
                $comments=new Productos();
                $comments=$comments->sqlquery("SELECT * FROM usuario_xomenta_producto  WHERE id_producto=$id_producto ORDER BY id DESC");
                if($comments){
                foreach($comments as $comment):
            ?>
            <li class="media pb-3">
                <div class="media-body">
                    <h5 class="mt-0 mb-1"><?php echo htmlspecialchars($comment['titulo']); ?></h5>
                    <div class="my-2">
                        <?php
                            for ($i=0; $i <$comment['puntuacion'] ; $i++) { 
                        ?>
                            <i class="fas fa-star text-golden"></i>
                        <?php
                            }
                        ?>
                    </div>
                    <p>
                        <?php echo htmlspecialchars($comment['mesaje']); ?>
                        <br>    
                        <abbr title="<?php echo htmlspecialchars($comment['nombre']); ?> cliente de ARC SOLUCIONES">- <?php echo htmlspecialchars($comment['nombre']); ?></abbr>  
                    </p>  
                </div>
            </li>
            <?php endforeach;
                }else{
                    ?>
                    <div class="form-group py-5 text-justify text-center">
                        <p class="h1 text-parrafo font-title">Aún no hay ningún comentario. <br> Que esperas para ser el primero...</p>
                        <i class="far fa-laugh-squint fa-5x text-secondary"></i>
                    </div>
                    <?php
                }
            ?>
        </ul>
    </div>
</div>