<nav class="navbar navbar-expand-lg navbar-dark subir bg-navbar p-3 mostrarmenos">

    <a class="navbar-brand" href="./" style="display:flex; flex-direction:row;">

        <?php $img = <<<IMG
       <img src="$rutalogo/logo.png" width="80" height="80" alt="logo grupo 8">
    IMG;
        echo $img;
        ?>
        <h5 class="text-center p-4 ">Trabajo Práctico N°5</h5>
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


            echo $navbar;
            ?>



        </ul>

    </div>

</nav>
<!--<div class="linea "> </div> -->