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
                            <img class="card-img-top" src="<?php echo $r["li_imagen"]; ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $r["nombre_meme"]; ?></h5>       
                            </div>
                        </div>
                    </div>
                </div>   
        <?php } ?>
    </div>
</div>