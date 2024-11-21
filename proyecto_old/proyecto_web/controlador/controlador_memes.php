<?php
    require_once ("modelo/modelo_memes.php");
    $meme= new Memes();
    switch($accion) {
        case "administrar":
            require("./vista/administrador.php");
            break;
        case "insertar":
            $meme->insertar();
            header("Location:index.php");
            break;
        case "eliminar":
            $lista_de_memes = $meme->mostrar_todo();
            require("./vista/eliminador.php");
            break;
        case 'modificar':
            $lista_de_memes = $meme->mostrar_todo();
            require("./vista/modificador.php");
            break;
        default:
            $lista_de_memes = $meme->mostrar_todo();
            require_once("./vista/vista_memes.php");
            break;
                    
    }

    
?>