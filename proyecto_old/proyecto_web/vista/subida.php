<?php
include ("../conectar.php");
class Memes{
    private $base_de_datos ;
    private $lista_de_memes ;
    public function __construct()
    {
        
        $this->base_de_datos = Conectar::conexion();
        $this->lista_de_memes = array();
    }
    /*
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
    */
    
    public function insertar($rute,$nombre,$punt){
        die($rute);
        $sql="INSERT  INTO meme_tipo(li_imagen,nombre_meme,c_punt) VALUES('".$rute."','".$nombre."',".$punt.")";

        echo $sql;

        if($resultado =$this->base_de_datos->query($sql)){
            echo "mensaje enviado con exito";
        }
        else{
            echo "hay un error en la sentencia de sql";
        }
    }

    /*
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
    }*/
    public function modificar_imagen($rute,$id){
        $sql="UPDATE meme_tipo SET li_imagen='".$rute."' WHERE id_meme=".$id."";
        echo $sql;
        if($resultado =$this->base_de_datos->query($sql)){
            echo "meme actualizado exitosamente";
        }
        else{
            echo "el mensaje ha fallado en ser enviado.....o algo mas";
            //el algo mas va con segundas
        }
    }

    
}



if(isset($_POST["datosImagen"]) && !empty($_POST["datosImagen"]) && isset($_POST["extImagen"]) && !empty($_POST["extImagen"])){
    $id="";
    if(isset($_POST["idmeme"])) {
        if(!(empty($_POST["idmeme"])))
        {
            $id=$_POST["idmeme"];
        }
    }
    echo "CERO";
    $data = $_POST["datosImagen"];
    $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data)); // Convertir de base64 al fichero de imagen
    $ext = $_POST["extImagen"];
    $time = microtime();
    $time = str_replace(".","",$time);
    $time = str_replace(" ","",$time);
    chdir("../imagenes/");
    $rute =$time.".".$ext;
    //echo getcwd();

    echo "UNO";
    if(file_put_contents($rute,$data)){
        $modificador = new Memes();
        if(!(empty($id))){
            $modificador->modificar_imagen(("./imagenes/".$rute),$id);
        }
        else {
            echo "DOS";
            $punt = $_POST["punt"];
            $nom = $_POST["nom"];
            $modificador->insertar(("./imagenes/".$rute),$nom,$punt);

        }
    }
}
if (isset($_POST["text_test"])&&(!(empty($_POST["text_test"]))))   {
    echo $_POST["text_test"];
}
else {
    echo "task failed succesfully"
}
?>