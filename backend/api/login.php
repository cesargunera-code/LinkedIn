<?php
    session_start();
    header("Content-Type: application/json"); 
    include_once("../class/class-usuario.php");
    $_POST = json_decode(file_get_contents('php://input'), true);  //para poblar el arreglo $_POST 
    switch($_SERVER['REQUEST_METHOD']) { 
        case 'POST':   //Verificar si el usuario existe.
            $usuario = Usuario::verificarUsuario($_POST['correo'], $_POST['contraseña']);  
            if ($usuario){
                $resultado = array(              
                    "codigoResultado"=>1,
                    "mensaje"=>"Usuario Autentificado",
                    "token"=>sha1(uniqid(rand(), true))
                );
                $_SESSION["token"] = $resultado["token"]; //Se guardará en la variable de sesion, la cookie enviada al cliente; es decir tienen el mismo token.
                setcookie("token", $resultado["token"], time()+(60*60*24*31), "/"); //la ruta tiene que ser la raiz es decir "/" para podeer acceder a la cookie desde cualquier lado.
                setcookie("codigoUsuario", $usuario["codigoUsuario"], time()+(60*60*24*31), "/");  
                setcookie("nombre", $usuario["nombre"], time()+(60*60*24*31), "/");  
                setcookie("apellido", $usuario["apellido"], time()+(60*60*24*31), "/");
                setcookie("correo", $usuario["correo"], time()+(60*60*24*31), "/"); 
                setcookie("imagen", $usuario["imagen"], time()+(60*60*24*31), "/"); 
                echo json_encode($resultado);
            }else{  //en el caso de login incorrecto, eliminar las cookies.
                setcookie("codigoUsuario", "", time()+(60*60*24*31), "/");  
                setcookie("token", "", time()-1, "/"); 
                setcookie("nombre", "", time()-1, "/");  
                setcookie("apellido", "", time()-1, "/");
                setcookie("correo", "", time()-1, "/"); 
                setcookie("imagen", "", time()-1, "/"); 
                echo '{"codigoResultado":0,"mensaje":"Usuario o Contraseña Incorrectos"}';        
            }
        break; 
    }
?>