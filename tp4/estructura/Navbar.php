<nav class="navbar navbar-expand-lg navbar-dark subir bg-navbar p-3 mostrarmenos">

    <a class="navbar-brand" href="./" style="display:flex; flex-direction:row;">

        <?php $img = <<<IMG
       <img src="$rutalogo/logo.png" width="80" height="80" alt="logo grupo 8">
    IMG;
        echo $img;
        ?>
        <h5 class="text-center p-4 ">Trabajo Práctico N°4</h5>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navegacion" aria-controls="navegacion" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon "></span>
    </button>

    <div class="collapse navbar-collapse" id="navegacion">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">


            <?php


            $navbar = "";
            //Menu básico
            foreach ($menu as $item) {
                $navbar .= <<<NAVBAR
            <li class="nav-item">
            <a class="nav-link" href="{$item['link']}">{$item['nombre']}</a>
            </li>
            NAVBAR;
            }

            //Menu autos
            $navbar .= <<<SUBMENUAUTO
             <li class="nav-item dropdown" data-bs-theme="dark">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Menu Autos
            </a>
            <ul class="dropdown-menu">
            SUBMENUAUTO;

            foreach ($menuAuto as $item) {
                $navbar .= <<<MENUAUTOS
                    <li>
                    <a class="dropdown-item text-white" href="{$item['link']}">{$item['nombre']}</a>
                    </li>
                    MENUAUTOS;
            }
            $navbar .= "</ul>";

            //Menu personas
            $navbar .= <<<SUBMENUPERSONA
                    <li class="nav-item dropdown" data-bs-theme="dark">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Menu Personas
                    </a>
                    <ul class="dropdown-menu">
                    SUBMENUPERSONA;

            foreach ($menuPersona as $item) {
                $navbar .= <<<MENUPERSONAS
                        <li>
                        <a class="dropdown-item text-white" href="{$item['link']}">{$item['nombre']}</a>
                        </li>
                        MENUPERSONAS;
            }

            $navbar .= "</ul>";


            echo $navbar;
            ?>



        </ul>

    </div>

</nav>
<!--<div class="linea "> </div> -->