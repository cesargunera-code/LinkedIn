<?php
    header("Content-Type: application/json"); 
    include_once("../class/class-post.php");
    switch($_SERVER['REQUEST_METHOD']) {
        case 'POST':   //GUARDAR POST.
            $_POST = json_decode(file_get_contents('php://input'), true); 
            $post = new Post($_POST["codigoPost"], $_POST["codigoUsuario"], $_POST["contenidoPost"], $_POST["imagen"], $_POST["cantidadLikes"], $_POST["tiempo"]);
            $post->guardarPost();  //llamar al método guardarPost().
        break;

        case 'GET':    //OBTENER POSTS
            if (isset($_COOKIE['codigoUsuario'])){  //Retorna los posts de los usuarios, a los que sigue el usuario indicado, con el codigoUsuario.
                Post::obtenerPosts($_COOKIE['codigoUsuario']);
            }else{
                
            }
        break;
        
        case 'PUT':  //ACTUALIZAR POST.
 
        break;
        
        case 'DELETE': //ELIMINAR POST.

        break;
    }
?>
