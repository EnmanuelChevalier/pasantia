<?php

include("../../bd.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $opinion = $_POST["opinion"];
    $fecha = date("Y-m-d"); // Fecha actual
    $exito = $_POST["exito"];

    // Insertar el testimonio en la base de datos
    $sql = "INSERT INTO tbl_testimonios (nombre, apellido, opinion, fecha, exito) VALUES (:nombre, :apellido, :opinion, :fecha, :exito)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(":nombre", $nombre);
    $stmt->bindParam(":apellido", $apellido);
    $stmt->bindParam(":opinion", $opinion);
    $stmt->bindParam(":fecha", $fecha);
    $stmt->bindParam(":exito", $exito);
    $stmt->execute();

    // Redirigir de vuelta a la página de testimonios
    header("Location: index.php#testimonios");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
</head>
<body>
    
<nav id="inicio" class="navbar navbar-expand-lg navbar-dark bg-dark">
        
        <div class="container">
            <a class="navbar-brand" href="#"><i></i>SISTEMA DE GESTIÓN DE PASANTÍAS</a>
            <div class="collapse navbar-collapse" id="navbarNav">

          
        </div>
        <ul class="nav navbar-nav ml-auto">
            
            <li class="nav-item">
                <a class="nav-link" href="../../../index">VOLVER</a>
            </li>
            </ul>
        
       
    </nav>

<section id="testimonios" class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-4">¿Quieres compartir tu historia hacia el exito?</h2>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="guardar.php" method="post">
                    <div class="mb-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>

                    <div class="mb-3">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" required>
                    </div>

                    <div class="mb-3">
                        <label for="opinion">Opinión</label>
                        <textarea class="form-control" id="opinion" name="opinion" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="exito">Éxito</label>
                        <input type="text" class="form-control" id="exito" name="exito" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar Testimonio</button>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>