<?php
    class Usuario{
        private $codigoUsuario;
        private $nombre;
        private $apellido;
        private $correo;
        private $contraseña;
        private $imagen;
        private $siguiendo;

        public function __construct($codigoUsuario, $nombre, $apellido, $correo, $contraseña, $imagen, $siguiendo)
        {
            $this->codigoUsuario = $codigoUsuario;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->correo = $correo;
            $this->contraseña = $contraseña;
            $this->imagen = $imagen;
            $this->siguiendo = $siguiendo;
        }

       public function guardarUsuario(){
                $contenidoArchivo = file_get_contents('../data/usuarios.json');
                $usuarios = json_decode($contenidoArchivo, true);  //Arreglo Asociativo
                $usuarios[] = array(                               //Anexar un nuevo elemento al arreglo $usuarios.
                        "codigoUsuario"=> $this->codigoUsuario,
                        "nombre"=> $this->nombre,
                        "apellido"=> $this->apellido,
                        "correo"=> $this->correo,
                        "contraseña"=> sha1($this->contraseña),
                        "imagen"=> $this->imagen,
                        "siguiendo"=> $this->siguiendo
                );
                $archivo = fopen("../data/usuarios.json","w");     //Leer archivo.
                fwrite($archivo, json_encode($usuarios));          //Escribir en archivo.
                fclose($archivo); 
                echo '{"codigoResultado":1,"mensaje":"usuario guardado con exito"}';                                 //Cerrar el flujo del archivo.
        }

        public static function obtenerUsuarios(){
                $contenidoArchivo = file_get_contents('../data/usuarios.json');
                $datosU = json_decode($contenidoArchivo,true);
                
                for($i=0;$i<sizeof($datosU);$i++){

                }
        }
        
        public static function obtenerUsuario($id){
                $contenidoArchivo = file_get_contents('../data/usuarios.json');  //leer el archivo.
                $usuarios = json_decode($contenidoArchivo, true);
                echo json_encode($usuarios[$id]);
        }

        public static function verificarUsuario($correo, $contraseña){ //con $correo y $contraseña se verifica que lo que venga del login sea igual al usuarios.json
                $contenidoArchivoUsuarios = file_get_contents('../data/usuarios.json');
                $usuarios = json_decode($contenidoArchivoUsuarios, true);
                for ($i=0; $i<sizeof($usuarios); $i++) {
                        if($usuarios[$i]["correo"]==$correo && $usuarios[$i]["contraseña"]==sha1($contraseña)) {
                                return $usuarios[$i];
                        }
                }
                return null;  //si sale del ciclo for signifca que nunca hubo usuario (NO ENCONTRO NADA) y retorna null.
        }

        public function actualizarUsuario($id){ 
                $contenidoArchivo = file_get_contents('../data/usuarios.json');  //leer el contenido del archivo.
                $usuarios = json_decode($contenidoArchivo, true); 
                $usuario = array(
                        "codigoUsuario"=> $this->codigoUsuario,
                        "nombre"=> $this->nombre,
                        "apellido"=> $this->apellido,
                        "correo"=> $this->correo,
                        "contraseña"=> $this->contraseña,
                        "imagen"=> $this->imagen,
                        "siguiendo"=> $this->siguiendo
                );
                $usuarios[$id] =  $usuario;           
                $archivo = fopen('../data/usuarios.json', 'w');
                fwrite($archivo, json_encode($usuarios));
                fclose($archivo);
        }

        public static function eliminarUsuario($id){    //metodo estatico para no tener que crear una instancia para llamarlo..
                $contenidoArchivo = file_get_contents('../data/usuarios.json');  //leer el contenido del archivo.
                $usuarios = json_decode($contenidoArchivo, true); //cargar en un arreglo asociativo, y de ese arreglo asociativo eliminaremos el elemento que se envia en el id
                array_splice($usuarios, $id, 1);
                
                $archivo = fopen('../data/usuarios.json', 'w'); //abre el archivo usuarios.json
                fwrite($archivo, json_encode($usuarios));  //sustituiria la información 
                fclose($archivo);
        }


        //MÉTODOS SET y GET 
        public function getCodigoUsuario()
        {
                return $this->codigoUsuario;
        }
        public function setCodigoUsuario($codigoUsuario)
        {
                $this->codigoUsuario = $codigoUsuario;

                return $this;
        }

        public function getNombre()
        {
                return $this->nombre;
        }
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        public function getApellido()
        {
                return $this->apellido;
        }
        public function setApellido($apellido)
        {
                $this->apellido = $apellido;

                return $this;
        }

        public function getCorreo()
        {
                return $this->correo;
        }
        public function setCorreo($correo)
        {
                $this->correo = $correo;

                return $this;
        }

        public function getContraseña()
        {
                return $this->contraseña;
        }
        public function setContraseña($contraseña)
        {
                $this->contraseña = $contraseña;

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

        public function getSiguiendo()
        {
                return $this->siguiendo;
        }
        public function setSiguiendo($siguiendo)
        {
                $this->siguiendo = $siguiendo;

                return $this;
        }
   }
?>