<?php
    class Comentario {
        private $codigoComentario;
        private $codigoPost;
        private $usuario;
        private $comentario;

        public function __construct($codigoComentario, $codigoPost, $usuario, $comentario)
        {
            $this->codigoComentario = $codigoComentario;
            $this->codigoPost = $codigoPost;
            $this->usuario = $usuario;
            $this->comentario = $comentario;
        }

        public function guardarComentario(){
            $contenidoArchivoComentarios = file_get_contents('../data/comentarios.json');
            $comentarios = json_decode($contenidoArchivoComentarios, true);  //Cargar en un arreglo asociativo.
            $datos = array(    //Crear un nuevo comentario y agregarlo
                "codigoComentario" => $this->codigoComentario,
                "codigoPost" => $this->codigoPost,
                "usuario" => $this->usuario,
                "comentario" => $this->comentario
            );
            $comentarios[]=$datos;
            $archivo = fopen("../data/comentarios.json", "w");
            fwrite($archivo, json_encode($comentarios));
            fclose($archivo);
            echo json_encode($datos);
        }

        //METODOS SET Y GET.
        public function getCodigoComentario()
        {
            return $this->codigoComentario;
        }
        public function setCodigoComentario($codigoComentario)
        {
            $this->codigoComentario = $codigoComentario;

            return $this;
        }

        public function getCodigoPost()
        {
            return $this->codigoPost;
        }
        public function setCodigoPost($codigoPost)
        {
            $this->codigoPost = $codigoPost;

            return $this;
        }

        public function getUsuario()
        {
            return $this->usuario;
        }
        public function setUsuario($usuario)
        {
            $this->usuario = $usuario;

            return $this;
        }

        public function getComentario()
        {
            return $this->comentario;
        }
        public function setComentario($comentario)
        {
            $this->comentario = $comentario;

            return $this;
        }
    } 
?>