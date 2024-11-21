
    <nav class="navbar navbar-expand-lg  p-4 bg-success fixed-top" id="menu" >
        <div class="container-fluid text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-4">
                            <a class="navbar-brand" href="#">Navbar <img src="OIP.png" id="logo"></a>
                            <!--<img src="OIP.png" id="logo">-->
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup"></div>
                    </div>
                    <div class="col-4">
                        <div class="navbar-nav">
                            <a class="nav-link" href="index.php"><b>inicio</b></a>
                            <a class="nav-link" href="index.php?controlador=memes"><b>memes</b></a>/
                            <!--a class="nav-link" href="index.php?controlador=informacion"><b>informacion</b></a-->
                            <a class="nav-link" href="index.php?controlador=contacto"><b>contacto</b></a>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Mas..
                                </a>
                                <ul class="dropdown-menu dropdown">
                                    <li><a class="dropdown-item" href="index.php?controlador=memes&accion=administrar">crear meme</a></li>
                                    <li><a class="dropdown-item" href="index.php?controlador=memes&accion=eliminar">eliminar meme</a></li>
                                    <li><a class="dropdown-item" href="index.php?controlador=memes&accion=modificar">modificar meme</a></li>
                                </ul>
                            </li>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </nav>