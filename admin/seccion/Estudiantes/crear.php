<?php 
include("../../bd.php");

if($_POST){
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $correo = isset($_POST["correo"]) ? $_POST["correo"] : "";
    $tecnica = isset($_POST["tecnica"]) ? $_POST["tecnica"] : "";
    $cedula = isset($_POST["cedula"]) ? $_POST["cedula"] : "";
    $edad = isset($_POST["edad"]) ? $_POST["edad"] : "";
    $centrodeestudio = isset($_POST["centrodeestudio"]) ? $_POST["centrodeestudio"] : "";

    $sentencia = $conexion->prepare("INSERT INTO `tbl_estudiantes` (`ID`, `nombre`, `correo`, `tecnica`, `cedula`, `edad`, `centrodeestudio`) VALUES (NULL, :nombre, :correo, :tecnica, :cedula, :edad, :centrodeestudio)");

    //Se asignan los valores a las variables en la sentencia preparada
    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":correo", $correo);
    $sentencia->bindParam(":tecnica", $tecnica);
    $sentencia->bindParam(":cedula", $cedula);
    $sentencia->bindParam(":edad", $edad);
    $sentencia->bindParam(":centrodeestudio", $centrodeestudio);
    $sentencia->execute();

    header("Location:index.php");
    exit();
}

include("../../templates/header.php");
?>
<br/>

<div class="card">
    <div class="card-header">Estudiantes</div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input
                    type="text"
                    class="form-control"
                    name="nombre"
                    id="nombre"
                    aria-describedby="helpId"
                    placeholder="Nombre"
                />
                
            </div>
            
            <div class="mb-3">
                <label for="correo" class="form-label">Correo Electronico</label>
                <input
                    type="email"
                    class="form-control"
                    name="correo"
                    id="correo"
                    placeholder="Escriba su correo"
                />
            </div>

            <div class="mb-3">
                <label for="tecnica" class="form-label">Tecnica</label>
                <input
                    type="text"
                    class="form-control"
                    name="tecnica"
                    id="tecnica"
                    aria-describedby="emailHelpId"
                    placeholder="tecnica"
                />
               
            </div>

            <div class="mb-3">
                <label for="cedula" class="form-label">Cedula</label>
                <input
                    type="text"
                    class="form-control"
                    name="cedula"
                    id="cedula"
                    placeholder="Escriba su cedula"
                />
            </div>

            <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input
                    type="text"
                    class="form-control"
                    name="edad"
                    id="edad"
                    placeholder="Escriba su edad"
                />
            </div>

            <div class="mb-3">
                <label for="centrodeestudio" class="form-label">Centro de Estudio</label>
                <input
                    type="text"
                    class="form-control"
                    name="centrodeestudio"
                    id="centrodeestudio"
                    placeholder="Escriba su centro de estudio"
                />
            </div>

            <button type="submit" class="btn btn-success">Agregar estudiante</button>
            <a
                name=""
                id=""
                class="btn btn-primary"
                href="index.php"
                role="button"
                >Cancelar</a
            >
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include("../../templates/footer.php");?>
