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
    header("Location: ../../../index.php");
    exit;
}
?>