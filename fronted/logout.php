<?php
    //limpiar las cookies y variable de sesión para posteriormente redireccionar a login.
    session_start(); 
    session_destroy();  //limpiar las variable de sesión.
    
    setcookie("token", "", time()-1, "/");   //limpiar cookies
    setcookie("nombre", "", time()-1, "/");  
    setcookie("apellido", "", time()-1, "/");
    setcookie("correo", "", time()-1, "/"); 
    setcookie("imagen", "", time()-1, "/"); 
    setcookie("codigoUsuario", "", time()-1, "/"); 


    //Redireccionar a login.
    header('location: login.html');
?>