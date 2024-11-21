<section>
    <br><br><br><br><br><br><br><br><br>
    <?php
     
    
    if (isset($_GET["dni"]) && isset($_GET["edad"])){
        $sql="UPDATE infopersona SET nombre='".$_GET['nombre']."',edad=".$_GET['edad'].",sexo='".$_GET['sexo']."' WHERE DNI='".$_GET["dni"]."'";
        if(true == $conn ->query($sql)){
            echo "SI";
           // header("Location: index.php?opcion=informacion");
        }
        else{
            echo "No";
        }

    }
    elseif(isset($_GET["dni"]) && !empty($_GET["dni"])){
        $sql="DELETE FROM infopersona WHERE DNI = '".$_GET["dni"]."'";
        if(true == $conn ->query($sql)){
            echo "Se ha eliminadu su registro exitosamente </a><br>";
            //header("Location: index.php?opcion=informacion");
        }
        else{
            echo "hubo un error en la eliminacion de su registro";
        }
    }
    if(isset($_GET["busqueda"])){
        $sql="SELECT * FROM infopersona WHERE DNI LIKE '%".$_GET['busqueda']."%' OR nombre LIKE '%".$_GET['busqueda']."%' ";
    }
    else {
        $sql="SELECT * FROM infopersona"; 
    }
    //echo $sql;
    
    if($resultado = $conn->query($sql)){
             
        if($resultado->num_rows > 0) {
            
        } else {
              echo "No hay datos";
        }
    }
    else{
        echo "hay un error en la sentencia de codigo UwU";
    }
    
      
    ?>
    <label for="busqueda">buscar</label><input type="text" id="busqueda"><a id="linker" href="index.php?opcion=informacion">BUSCAR</a>
    <script>
        function actualizar(event) {
            event.preventDefault();
            let Link_=Act_1.getAttribute("href");
            let Nom= document.getElementById("nombre");
            let N_value=Nom.value;
            let Edad= document.getElementById("edad");
            let E_value=Edad.value;
            let Sex= document.getElementById("sexo");
            let S_value=Sex.value;
            let linnkFinal=Link_ + "&nombre="+N_value+"&edad="+E_value+"&sexo="+S_value;
            alert(linnkFinal);
            location.href=linnkFinal;
        }
        function busqueda(event){
            event.preventDefault();
            let busqueda=document.getElementById("busqueda");
            //let busquedaValue = busqueda.value;
            let link=linker.getAttribute("href");
            location.href=link+"&busqueda="+busqueda.value;
        }

        let Act_1 = document.getElementById("Act");
        Act_1.addEventListener("click", actualizar);

        let linker_1 = document.getElementById("linker");
        linker_1.addEventListener("click",busqueda);
    </script>


</section>