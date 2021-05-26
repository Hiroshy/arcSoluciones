<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <!--Swipper-->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    

    <script>
        window.addEventListener("load",()=>{
            if(screen.width<500){
                var swiper = new Swiper('.swiper-container', {
                slidesPerView: 1,
                loop: false,
                spaceBetween: 30,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                autoplay: {
                    delay: 5000,
                }
            });

            }else{
                var swiper = new Swiper('.swiper-container', {
                slidesPerView: 3,
                loop: false,
                spaceBetween: 30,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                autoplay: {
                    delay: 5000,
                }
            });
            }
        })

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        $(function () {
			$('[data-toggle="popover"]').popover()
		})

        window.addEventListener("DOMContentLoaded" , () => {
            let menuBoton=document.getElementById("boton");
            let navbarBar=document.getElementById("navbar");
            menuBoton.addEventListener("click",(e)=>{
                e.preventDefault();
                navbarBar.classList.add("bg-light");
            });
            window.onscroll = function (e) {  
                var element = document.getElementById("navbar");
                if (parseInt(document.documentElement.scrollTop)>10) {
                    element.classList.add("bg-light");   
                }else{
                    element.classList.remove("bg-light");  
                }
            } 
        });


    </script>
    <!-- enviando info de la empresa -->
    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "Organization",
        "brand" : "<?php echo $info_empresa['empresa']?>",
        "url": "https://<?php echo $_SERVER['HTTP_HOST'] ?>",
        "logo": "https://<?php echo $_SERVER['HTTP_HOST'] ?>/img/site/<?= $miLogo;?>"
        }
    </script>
    <!-- Cursos -->
    <?php if($_SERVER['PHP_SELF']=='producto.php'){?>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Course",
      "name": "<?php echo $detalleProducto['producto']; ?>",
      "description": "<?php echo $detalleProducto['resumen_largo']; ?>",
      "provider": {
        "@type": "Organization",
        "name": "<?php echo $info_empresa['empresa']; ?>",
        "sameAs": "https://<?php echo $_SERVER['HTTP_HOST'] ?><?php echo $_SERVER['REQUEST_URI'] ?>"
      }
    }
    </script>
    <?php }?>

    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@type": "ListItem",
                "position": 1,
                "name": "",
                "item": "https://<?php echo $_SERVER['HTTP_HOST'] ?><?php echo $_SERVER['REQUEST_URI'] ?>"
            }
        ]
        }
    </script>
    <!-- Ficha Google-->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Store",
      "image": [
        "https://<?php echo $_SERVER['HTTP_HOST'] ?>/img/site/<?= $miLogo;?>"
       ],
      "@id": "https://<?php echo $_SERVER['HTTP_HOST'] ?>",
      "name": "<?php echo $info_empresa['empresa']?>",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "<?php echo  $info_empresa['direccion']; ?>",
        "addressLocality": "Naucalpan de Ju��rez",
        "addressRegion": "CDMX",
        "postalCode": "53100",
        "addressCountry": "MX"
      },
      "review": {
        "@type": "Review",
        "reviewRating": {
          "@type": "Rating",
          "ratingValue": "4",
          "bestRating": "5"
        },
        "author": {
          "@type": "Person",
          "name": "Lillian Ruiz"
        }
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 40.761293,
        "longitude": -73.982294
      },
      "url": "https://<?php echo $_SERVER['HTTP_HOST'] ?><?php echo $_SERVER['REQUEST_URI'] ?>"
      "telephone": "+521<?php echo  $info_empresa['telefono']; ?>",
      "servesCuisine": "Mexico",
      "priceRange": "$$$",
      "openingHoursSpecification": [
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": [
            "Monday",
            "Tuesday"
          ],
          "opens": "09:00",
          "closes": "06:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": [
            "Wednesday",
            "Thursday",
            "Friday"
          ],
          "opens": "09:00",
          "closes": "06:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": "Saturday",
          "opens": "09:00",
          "closes": "06:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": "Sunday",
          "opens": "09:00",
          "closes": "06:00"
        }
      ],
      "acceptsReservations": "True"
    }
    </script>

    <script>
          //document.oncontextmenu = function(){return false}
          let boxNotification=document.getElementById("notificacion");
          let ContentBarTime=document.getElementById("content-bar-time")

          function temporizadorContador(porcentaje){
            ContentBarTime.style.width = `${porcentaje}%`;
          }

          let disparador=0;
          let i=1

          function temporizadorNotificacion(action="") {
              if (disparador==20) {
                i=i+1
                  if(action=="cerrar" | i%2==0){
                      boxNotification.classList.add("close-notification")
                      boxNotification.classList.remove("animate__animated")
                      boxNotification.classList.remove("animate__fadeInLeft")
                      disparador=0
                  }else{
                      boxNotification.classList.remove("close-notification")
                      boxNotification.classList.add("animate__animated")
                      boxNotification.classList.add("animate__fadeInLeft")
                      disparador=0
                  }
              }
              let dispara=disparador+=1
              temporizadorContador(10*(.5*dispara))
          }

          setInterval('temporizadorNotificacion()', 1000);

          window.addEventListener('click', function(e){ 
          if (boxNotification.contains(e.target)){ 
          } else{ 
              disparador=20
              temporizadorNotificacion("cerrar");
          } 
          }); 

    </script>

    <script>
        let servicios=document.getElementById("servicio");
        let seguroAuto=document.getElementById("seguroAuto");
        function addElement(){
            console.log(servicios.value)
            if(servicios.value.toLowerCase()=="seguro de auto individual"){
                if (!document.getElementById("ext_seguro_particular")) {
                    div=document.createElement("div")
                    div.id="ext_seguro_particular"
                    div.className="col-12 form-row px-0 animate__animated animate__bounceIn"
                    div.innerHTML=`
                    
                        <div class="col-md-6 mb-3">
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="modelo" maxLength=4 pattern="[0-9]{1,4}" name="modelo" id='modelo' required />
                                <label for="modelo" class="form__label">Modelo</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="serie" name="serie" id='serie' required />
                                <label for="serie" class="form__label">Serie</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="placa" name="placa" id='placa' required />
                                <label for="placa" class="form__label">Placa</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form__group field">
                                <input type="date" class="form__field" placeholder="fecha_nacimiento" name="fecha_nacimiento" id='fecha_nacimiento'  
                                max="<?php echo date("Y-m-d",strtotime($fecha_actual."- 18 year")); ?>" required />
                                <label for="fecha_nacimiento" class="form__label">Fecha Nacimiento</label>
                            </div>
                        </div>

                        
                        <div class="col-md-6 mb-3">
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="Marca" maxLength=50 name="marca" id='marca_carro' required />
                                <label for="marca_carro" class="form__label">Marca</label>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="cp" maxLength=7 name="cp" id='cp' pattern="[0-9]{1,8}" required />
                                <label for="cp" class="form__label">CP</label>
                            </div>
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <div class="form__group w-90 field">
                                <input type="input" class="form__field" placeholder="Versión del Vehiculo" maxLength=50 name="detalle_carro" id='detalle_carro' required />
                                <label for="detalle_carro" class="form__label">Versión del Vehiculo</label>
                            </div>
                        </div>

                        
                    
                    `
                    seguroAuto.appendChild(div)
                }
            }else{
                if (document.getElementById("ext_seguro_particular")) {
                    document.getElementById("ext_seguro_particular").remove()
                }
                console.log(servicios.value + "No cumple con condición, limpiando!")
            }
        }
        servicios.addEventListener("keyup",(e)=>{
            e.stopPropagation()
            addElement()
        })
        servicios.addEventListener("change",(e)=>{
            e.stopPropagation()
            addElement()
        })
    </script>
    
    <script>
        let go_back=document.getElementById("go_back");
        go_back.addEventListener("click",()=>{
            window.history.back()
        })
    </script>

    <script>
        const localConfig = localStorage.getItem('tema');
        let theme=document.querySelectorAll(".dark-2")
        if(localConfig=='dark'){
            for(let i=0;i<theme.length;i++){
                if(theme[i].classList.contains("dark-2")!=true){
                    theme[i].classList.toggle("dark-2")
                }
            }
        }else if(localConfig=='light'){
            for(let i=0;i<theme.length;i++){
                if(theme[i].classList.contains("dark-2")){
                    theme[i].classList.toggle("light-theme")
                }
            }
        }else{

        }
    </script>

    <script src="/script.js"></script>