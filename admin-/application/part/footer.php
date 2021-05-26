<div class="footer pt-5 pb-4 footer-light" id="footer-main">
        <div class="row text-center text-sm-left align-items-sm-center">
          <div class="col-sm-6">
            <p class="text-sm mb-0">&copy; 2019 <a href="" class="h6 text-sm" target="_blank">INVIRIX</a>. All rights reserved.</p>
          </div>
          <div class="col-sm-6 mb-md-0">
            <ul class="nav justify-content-center justify-content-md-end">
              <li class="nav-item">
                <a class="nav-link" href="tel:5620222283">Support</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="tel:5220222283">Terms</a>
              </li>
              <li class="nav-item">
                <a class="nav-link pr-0" href="tel:5220222283">Privacy</a>
              </li>
            </ul>
          </div>
        </div>
      </div>


      
      <script>
        const boton=document.querySelector("#switch")
        const configUser=window.matchMedia('prefers-color-scheme: dark')
        const localConfig = localStorage.getItem('tema');

        /** Lugares del Backoffice */
        let main=document.querySelector(".container-fluid.container-application")
        let button=document.querySelector(".custom-control-input.session_storage")
        let button_menu=document.querySelector("a.btn.btn-square.text-sm.active")

        if(localConfig=='dark'){
          console.log(localConfig)
          document.body.classList.toggle("dark-theme")
          main.classList.toggle("container-application-dark-theme")
          button.classList.toggle("bg-button-dark")
          if(button_menu){
              button_menu.classList.toggle("bg-button-dark")
          }
          
          boton.checked = true;
        }else if(localConfig=='light'){
          console.log(localConfig)
          document.body.classList.toggle("light-theme")
          main.classList.toggle("container-application-light-theme")
          button.classList.toggle("bg-button-light")
          if(button_menu){
              button_menu.classList.toggle("bg-button-light")
          }
          boton.checked = false;
        }

        boton.addEventListener("click",()=>{
          let ColorTema;
          if(configUser.matches){
            //Entramos si es Dark
            document.body.classList.toggle("light-theme")
            main.classList.toggle("container-application-light-theme")
            button.classList.toggle("bg-button-light")
            if(button_menu){
              button_menu.classList.toggle("bg-button-light")
            }
            ColorTema=document.body.classList.contains("light-theme")?'light':'dark'
            boton.checked = false;
          }else{
            document.body.classList.toggle("dark-theme")
            main.classList.toggle("container-application-dark-theme")
            button.classList.toggle("bg-button-dark")
            if(button_menu){
              button_menu.classList.toggle("bg-button-dark")
          }
          
            ColorTema=document.body.classList.contains("dark-theme")?'dark':'light'

          }

          localStorage.setItem('tema',ColorTema)
        })
      </script>