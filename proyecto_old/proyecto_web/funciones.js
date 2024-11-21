function makeImagesEditable(){
    
    $(".container .card-img-top").click(function(event) {
        /*if(event.currentTarget.className != event.target.className)
        return false;*/
        initImages('.container', $(this), $(this).outerWidth(), $(this).outerHeight(),$(this).attr("id"));
    });
}




var validFileExtensions = [".jpg", ".jpeg", ".png",".jfif"]
function validateImage(ext) {
    var blnValid = false;
    for (var j = 0; j < validFileExtensions.length; j++) {
        var sCurExtension = validFileExtensions[j];
        if (ext.toLowerCase() == sCurExtension.toLowerCase()) {
            blnValid = true;
            break;
        }
    }
    
    if (!blnValid) {
        alert(sFileName + " no es válido, sólo se permiten archivos con extensiones: " + validFileExtensions.join(", "));
        return false;
    }
    
    return true;
}

function save(json_data) {
  var oMenu, oMain, s000, s100, s200, s300, s400, s500, s600, oFooter, sct, section;
  var HTMLSections = [];
      hidImPath = $("#hidden-image-path").val();
      hidImData = $("#hidden-image-data").val();
      
      // GUARDADO ASINCRONO DE HTML
      alert("ATAKEEEEEE!!")
      $.ajax({
        type: 'POST',
        url: "./vista/subida.php",
        data: json_data,
        success: function(response) {
            alert("respuesta de backend:" +response);
        /*   $(".wrapper img").not("#result > img").each(function() {
              var urlImg = $(this).attr("src");
              var urlImg = urlImg + "?" + d.getTime();
              $(this).attr("src", urlImg);
            });*/
        },
        error: function(json) {
            alert("error");
        },
        abort: function(json) {
            alert("SE HA IDO LA SOLICITUD A LA BRAINFUCK")
        }
      });
    //}
  }

function initImages(elm, elImg, w, h,idmeme) {
    $('#file-images').remove(); 
    $("<input type='file' id='file-images' name='file-images' accept='.png,.jpeg,.jpg,.jfif' value='' />").appendTo("body").css("visibility", "hidden");
    $('#file-images').val(''); 
    
    fileManager = $("#file-images");
    fileManager.css({ display: "none" }).trigger("click");

    var imgIdx = $(elImg).index("img"), imageType, ffName, fPath, imgName, id, prodType, sector, commerceName;
    // oImg = $(elImg);

    // LISTENER ELEGIR IMAGEN
    fileManager.change(function(e) {
        
        var imgSrcName, imgSrcNameSplit, imgFilesE, fExt, ffPath;
        
        // NOMBRE DE ARCHIVO EN NUEVO ARCHIVO
        imgFilesE = e.target;
        imgFiles = e.target.files[0];
        ffName = imgFiles.name;
        fExt = ffName.split('.').pop();
        fExt = fExt.toLowerCase();
        // QUITAR "?TIME()" EN EL NOMBRE DE ARCHIVO
        // REVISAR |
        
    
        //alert(imgSrcName);
        
        // COMPARA EXTENSIONES DE ARCHIVO ANTIGUO Y ARCHIVO NUEVO
        if(!imgFiles.type.match('image.*')) {
            if(fExt != imageExt) {
                alert("El archivo no es una imagen o el formato de imagen no coincide con la original (sólo se admiten formatos jpg/jpeg/jfif y png)");
                return false;
            } 
            else {
                if(!validateImage(fExt)){
                    return false;
                } 
                else {
                    if(imgFiles.size > 2000000) {
                        alert("No se ha podido subir " + sFileName + ", es una imagen demasiado grande. EL tamaño máximo permitido es 2MB.");
                        return false;	
                    }
                }
            }
        }
            // LISTENER CARGA DE IMAGEN
            var reader = new FileReader();
            reader.onload = function(evt) {
                var img = new Image();
                img.src = evt.target.result;
                img.onload = function() {
                    alert(img.src);
                    $("#hidden-image-data").val(img.src);
                    $("#hidden-image-path").val(imgSrcName);        
                    // GUARDA, ENVIA IMAGEN
                    $(elImg).attr("src",img.src);
                    if (idmeme != undefined){
                        var json_data = {"datosImagen": img.src,"extImagen":fExt,"idmeme":idmeme};
                        save(json_data);
                    }
                    //$(".modal-save").show();
                    //$(".modal-resultclose").show();
                };
                // Read in the image file as a data URL.
            };
            reader.readAsDataURL(imgFiles);
            
        
    });
}
function NameBreaker(){


    return [1,2];
}