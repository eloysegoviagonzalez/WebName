 
<section>
<div class="container">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<h2>Formulario de contacto</h2>
			<form ><!-- method="post" action="index.php?controlador=memes&accion=insertar" -->
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" class="form-control" id="nombre" name="nombre">
				</div>
				<div class="form-group">
					<div class="container">
						<div class="card-deck">
							<div class="card">
								<img class="card-img-top" src="" alt="Card image cap" >
							</div>
						</div>  
					</div>
				</div>
				<div class="form-group">
					<label for="mensaje">puntuacion</label>
					<textarea type="number" class="form-control" id="punt" name="punt" rows="5"></textarea>
				</div>
				<button class="btn btn-primary" id="guardar">Enviar</button>
			</form>
		</div>
	</div>
</div>
</section>
<script>
    // javascript
    $(document).ready(function() 
    {
		makeImagesEditable();
		
		$("#guardar").click(function(){
			
			//alert("guardar" + $(".card-img-top").attr("src"));
			//var json_data = {"datosImagen": $(".card-img-top").attr("src"),"extImagen":"","punt":$("#punt").text(),"nom":$("#nombre")};
			var json_data={"text_test":"TEXT_TEST"};
			save(json_data);
		});
    });
</script>