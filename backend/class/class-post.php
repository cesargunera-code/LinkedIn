<?php
    class Post {
        private $codigoPost;
        private $codigoUsuario;
        private $contenidoPost;
        private $imagen;
        private $cantidadLikes;
        private $tiempo;
 
        public function __construct($codigoPost, $codigoUsuario, $contenidoPost, $imagen, $cantidadLikes, $tiempo)
        {
            $this->codigoPost = $codigoPost;
            $this->codigoUsuario = $codigoUsuario;
            $this->contenidoPost = $contenidoPost;
            $this->imagen = $imagen;
            $this->cantidadLikes = $cantidadLikes;
            $this->tiempo = $tiempo;
        }

        public static function obtenerPosts($idUsuario){                  //static porque solo necesito leer.
            //USUARIOS
            $contenidoArchivoUsuarios = file_get_contents('../data/usuarios.json');
            $usuarios = json_decode($contenidoArchivoUsuarios, true); 
            $usuario = null;                                            //para guardar el usuario indicado en el for..
            for ($i=0; $i<sizeof($usuarios); $i++) {
                if($usuarios[$i]["codigoUsuario"] ==  $idUsuario) {     //Si el usuario actual, es igual al id que viene de parametro en la funcion significa que es el usuario que se desea obtener.
                    $usuario = $usuarios[$i]; 
                    break;
                }
            } 
            //COMENTARIOS
            $contenidoArchivoComentarios = file_get_contents('../data/comentarios.json');
            $comentarios = json_decode($contenidoArchivoComentarios, true);  
            
            //POSTS
            $contenidoArchivoPosts = file_get_contents('../data/posts.json');        //obtener los usuarios que sigue el usuario obtenido para mostrar los posts correspondientes.
            $posts = json_decode($contenidoArchivoPosts, true);
            for ($i=0; $i<sizeof($posts); $i++) {    
                if(in_array($posts[$i]["codigoUsuario"], $usuario["siguiendo"])) { 

                    $posts[$i]["comentarios"] = array();
                    
                    //OBTENER COMENTARIOS.
                    for ($j=0; $j<sizeof($comentarios); $j++) { 
                        if($posts[$i]["codigoPost"] ==  $comentarios[$j]["codigoPost"]){
                        
                            //OBTENER IMAGEN DE PERFIl DEl USUARIO QUE COMENTA.
                            for ($k=0; $k<sizeof($usuarios) ;$k++) { 
                                if($comentarios[$j]["usuario"] == $usuarios[$k]["nombre"]){
                                    $comentarios[$j]["imagenPerfilComentario"] = $usuarios[$k]["imagen"];
                                }
                            }
                            
                            $posts[$i]["comentarios"][] = $comentarios[$j];
                        }
                    }

                    //OBTENER NOMBRE DE USUARIO DEl POST E IMAGEN DE PERFIl.
                    for ($j=0; $j<sizeof($usuarios); $j++) { 
                        if($posts[$i]["codigoUsuario"] ==  $usuarios[$j]["codigoUsuario"]){ //verificar si codigoUsuario del post corresponde a codigoUsuario del arreglo de usuarios se extrae el nombre e imagen.
                            $posts[$i]["nombre"] = $usuarios[$j]["nombre"];  
                            $posts[$i]["imagenPerfilUsuario"] = $usuarios[$j]["imagen"];  
                        }
                    }
                    $i = (integer)$i;
                    $resultadoPost[$i] = $posts[$i];            //post completo con comentarios.
                }
            }
            echo json_encode($resultadoPost);
        }

        public function guardarPost(){
            $contenidoArchivoPosts = file_get_contents('../data/posts.json');
            $posts = json_decode($contenidoArchivoPosts, true);  
            $posts[] = array(         
                "codigoPost" => $this->codigoPost,  
                "codigoUsuario" => $_COOKIE["codigoUsuario"],
                "contenidoPost" => $this->contenidoPost,
                "imagen" => $this->imagen,
                "cantidadLikes" => $this->cantidadLikes,
                "tiempo" => $this->tiempo
            );

            $archivo = fopen('../data/posts.json', 'w');    //abrir eL archivo para escribir en el y guarde automaticamente en posts.json
            fwrite($archivo, json_encode($posts));          //se guarda La informacion que ya estaba mas eL nuevo post
            fclose($archivo);                               //cerrar eL fLujo deL archivo
            
            echo '{"codigoResultado":1, "mensaje":"Post guardado con exito"}'; 
        }

        //MÉTODOS SET Y GET.
        public function getCodigoPost()
        {
                return $this->codigoPost;
        }

        public function setCodigoPost($codigoPost)
        {
                $this->codigoPost = $codigoPost;

                return $this;
        }

        public function getCodigoUsuario()
        {
                return $this->codigoUsuario;
        }

        public function setCodigoUsuario($codigoUsuario)
        {
                $this->codigoUsuario = $codigoUsuario;

                return $this;
        }

        public function getContenidoPost()
        {
                return $this->contenidoPost;
        }

        public function setContenidoPost($contenidoPost)
        {
                $this->contenidoPost = $contenidoPost;

                return $this;
        }

        public function getImagen()
        {
                return $this->imagen;
        }

        public function setImagen($imagen)
        {
                $this->imagen = $imagen;

                return $this;
        }

        public function getCantidadLikes()
        {
                return $this->cantidadLikes;
        }

        public function setCantidadLikes($cantidadLikes)
        {
                $this->cantidadLikes = $cantidadLikes;

                return $this;
        }
    }
?>