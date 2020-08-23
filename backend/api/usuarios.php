<?php
    header("Content-Type: application/json"); 
    include_once("../class/class-usuario.php");
    switch($_SERVER['REQUEST_METHOD']) {
        case 'POST':     //GUARDAR USUARIO
            $_POST = json_decode(file_get_contents('php://input'), true);
            $usuario = new Usuario($_POST["codigoUsuario"], $_POST["nombre"], $_POST["apellido"], $_POST["correo"], $_POST["contraseña"], $_POST["imagen"], $_POST["siguiendo"]);
            $usuario->guardarUsuario();
        break;
        
        case 'GET':    //OBTENER USUARIO(S)
            if (isset($_GET['id'])){
                Usuario::obtenerUsuario($_GET['id']);    //Retornar el usuario con el id correspondiente.
            }else{
                Usuario::obtenerUsuarios();            //Retornar todos los usuarios.
            }
        break;
        
        case 'PUT':      //ACTUALIZAR USUARIO
            $_PUT = json_decode(file_get_contents('php://input'), true); 
            $usuario = new Usuario($_PUT["codigoUsuario"], $_PUT["nombre"], $_PUT["apellido"], $_PUT["correo"], $_PUT["contraseña"], $_PUT["imagen"], $_PUT["siguiendo"]); 
            $usuario->actualizarUsuario($_GET['id']);
            $resultado["mensaje"] =  "Actualizar Usuario con el id: ".$_GET['id'].
            ", Informacion a actualizar: ".json_encode($_PUT);
            echo json_encode($resultado);
        break;
        
        case 'DELETE':    //ELIMINAR USUARIO
            Usuario::eliminarUsuario($_GET['id']);
            $resultado["mensaje"] = "Usuario con el id: ".$_GET['id']." eliminado";
            echo json_encode($resultado);
        break;
    }
?>
