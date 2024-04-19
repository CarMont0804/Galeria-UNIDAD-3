<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi galeria de imagenes</title>
    <style>
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            grid-gap: 10px;
        }

        .gallery img {
            max-width: 100%;
            height: auto;
            cursor: pointer;
        }

        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            z-index: 9999;
            text-align: center;
        }

        .lightbox img {
            max-width: 90%;
            max-height: 90%;
            margin-top: 5%;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Mi galeria de imagenes</h1>
    <div class="gallery">
        <?php
        $ruta_imagenes = "archivos/";
        $imagenes = opendir($ruta_imagenes);
        while($imagen = readdir($imagenes)){
            if(is_file($ruta_imagenes . $imagen) && getimagesize($ruta_imagenes . $imagen)){
                echo "<img src='$ruta_imagenes$imagen' onclick='openLightbox(this.src)'>";
            }
        }
        closedir($imagenes);
        ?>
    </div>

    <div id="lightbox" class="lightbox" onclick="closeLightbox()">
        <img id="lightbox-img">
    </div>

    <script>
        function openLightbox(imageSrc) {
            document.getElementById('lightbox-img').src = imageSrc;
            document.getElementById('lightbox').style.display = 'block';
        }

        function closeLightbox() {
            document.getElementById('lightbox').style.display = 'none';
        }
    </script>
</body>
</html>
