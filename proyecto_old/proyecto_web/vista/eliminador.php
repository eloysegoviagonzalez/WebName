<?php

?>
<div class="container">
    <h3 class="mt-5">Lista de memes</h3>
    <div class="row">
            <?php
                foreach($lista_de_memes as $r) { ?>
                <div  class="col-2 p-3">
                    <div class="card-deck">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo $r["li_imagen"]; ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $r["nombre_meme"]; ?></h5>
                                <label class="form-check-label">
                                    <input id="<?php echo $r["id_meme"]?>" class="form-check-input" type="checkbox" value="">
                                    Check moute 
                                </label>    
                            </div>
                        </div>
                    </div>
                </div>   
        <?php } ?>
    </div>
    <button type="button" class="btn btn-dark" style="background-color: #404040;"id="eliminar">
        ¡Eliminar con estilo!
    </button>
</div>
<script>
    // javascript

    
    $("#eliminar").click(function (){
        var contador = 0;
        var arrayIds = new Array();
        $(".form-check-input").each(function() {
            if($(this).is(":checked")) {
                arrayIds.push($(this).attr("id"));
                contador++;
            }
        });

        if(contador == 0) {
            alert("No has seleccionado ningún meme para eliminar");
        }

        else{
            console.log(arrayIds);
            $.ajax({
            url: 'vista/borradoporids.php',
            method: 'POST',
            data: {"data": arrayIds},
            success: function(data){
            for(i=0; i<arrayIds.length; i++){
                $("#" + arrayIds[i]).parents(".col-2").remove();
            }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Manejo de errores
            }
            });
        }
        
    });
</script>