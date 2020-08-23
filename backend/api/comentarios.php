<?php
    header("Content-Type: application/json"); //para identificar que lo que se le esta enviando es un json..
    include_once("../class/class-comentario.php");
    switch($_SERVER['REQUEST_METHOD']) { //evaluar request method
        case 'POST':   //GUARDAR un comentario'
            $_POST = json_decode(file_get_contents('php://input'), true);
            $comentario = new Comentario ($_POST['codigoComentario'], $_POST['codigoPost'],$_COOKIE['nombre'],$_POST['comentario']);  //Instancia para crear un nuevo comentario
            $comentario->guardarComentario();  //llamar al método guardarComentario().
        break;
        
        case 'GET':        //Obtener

        break;
        
        case 'PUT':  //Actualizar
 
        break;
        
        case 'DELETE': //Eliminar

        break;
    }
?>