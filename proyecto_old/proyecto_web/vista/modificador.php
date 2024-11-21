<?php

?>
<div class="container">
    <h3 class="mt-5">Lista de memes</h3>
    <div class="row">
            <?php
                foreach($lista_de_memes as $r) { ?>
                <div class="col-2 p-3">
                    <div class="card-deck">
                        <div class="card">
                            <img class="card-img-top" id="<?php echo $r["id_meme"];?>" src="<?php echo $r["li_imagen"]; ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title" contenteditable="true"><?php echo $r["nombre_meme"]; ?></h5>
                                <label class="form-check-label">
                            </div>
                        </div>
                    </div>
                </div>   
        <?php } ?>
    </div>
    <button type="button" class="btn btn-dark" style="background-color: #404040;"id="guardar">
        guardar
    </button>
</div>
<script>
    // javascript
    $(document).ready(function() 
    {
    makeImagesEditable();
    });
</script>