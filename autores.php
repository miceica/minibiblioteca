<?php
require_once('others/functions.php'); // Incluye el archivo functions.php
$autores = getAutores();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniBiblioteca</title>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap CSS desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include_once("includes/header.php"); ?>

    <!-- Aquí se incluirá el contenido dinámico de las páginas -->

    <div class="container">
        <div class="row">
            <?php
            // El bucle foreach para mostrar los autores
            foreach ($autores as $autor) {
            ?>
                <div class="col-md-4">
                    <div class="card mt-3"> <!-- Agregamos mt-3 aquí -->
                        <!-- Aquí iría la imagen del autor -->
                        <img src="images/imagenautor.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $autor['nombre']; ?></h5>
                            <!-- Otros detalles del autor, si es necesario -->
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Botones de eliminar y editar -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-danger rounded-pill me-2" onclick="eliminarAutor(<?php echo $autor['idautor']; ?>)">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-primary rounded-pill">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <script>
        function eliminarAutor(idAutor) {
            if (confirm("¿Estás seguro de que deseas eliminar este autor?")) {
                // Enviar una solicitud POST al servidor para eliminar el libro
                fetch('others/eliminar_autor.php?idAutor=' + idAutor)
                    .then(response => {
                        if (response.ok) {
                            // Autor eliminado correctamente, puedes hacer algo aquí, como recargar la página
                            location.reload();
                        } else {
                            // Error al eliminar el libro, maneja el error aquí
                            console.error('Error al eliminar el autor');
                        }
                    })
                    .catch(error => {
                        console.error('Error de red:', error);
                    });
            }
        }
    </script>

    <!-- Bootstrap JavaScript desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>