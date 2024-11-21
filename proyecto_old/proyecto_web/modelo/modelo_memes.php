<?php 
    class Memes{
        private $base_de_datos ;
        private $lista_de_memes ;
        public function __construct()
        {
            include ("./conectar.php");
            $this->base_de_datos = Conectar::conexion();
            $this->lista_de_memes = array();
        }

        public function mostrar_todo(){
            $sql="SELECT * FROM meme_tipo";
            if($resultado =$this->base_de_datos->query($sql)){
                if($resultado->num_rows > 0) {
                    while($row = $resultado->fetch_assoc()) {
                        $this->lista_de_memes[]=$row; 
                    }
                } else {
                      echo "No hay datos";
                }

                return $this->lista_de_memes;
            }
            else{
                echo "hay un error en la sentencia de codigo UwU";
                return $this->lista_de_memes;
            }

           
        }

        public function insertar(){
            echo "sended";
            $sql="INSERT  INTO meme_tipo(li_imagen,nombre_meme,c_punt) VALUES('".$_POST['limg']."','".$_POST['nombre']."',".$_POST['punt'].")";
            if($resultado =$this->base_de_datos->query($sql)){
                echo "mensaje enviado con exito";
            }
            else{
                echo "hay un error en la sentencia de sql";
            }
        }
        public function eliminar($arrayIds){
            $sql="";
            foreach($arrayIds as $id){
                $sql.="DELETE FROM meme_tipo WHERE id_meme=".$id.";";
            }
            var_dump($sql);
            if($this->base_de_datos->query($sql)){
               echo "eliminado con exito" ;
            }
            else{
                echo "fallado";
            }
        }

        
    }
?>