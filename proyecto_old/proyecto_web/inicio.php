<?php 
            
?>
<section>
    <br><br>
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="Meme1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="Meme1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="Meme1.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-md-6 ">
    <?php
        foreach($_Array as $_P) {
    ?>
        <div class="col">
            <div class="card">
                <img src="<?php echo $_P["urlimage"]; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $_P["nombre"]; ?></h5>
                    <p class="card-text">edad :<?php echo $_P["edad"]; ?></p>
                </div>
            
            </div>
        </div>
    <?php } ?>
    </div>
    </div>
</section>