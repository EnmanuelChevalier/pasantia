<?php 
include("../../bd.php");

if($_POST){
    $nombreempresa = isset($_POST["nombreempresa"]) ? $_POST["nombreempresa"] : "";
    $queofreces = isset($_POST["queofreces"]) ? $_POST["queofreces"] : "";
    $tecnicaespecializada = isset($_POST["tecnicaespecializada"]) ? $_POST["tecnicaespecializada"] : "";
    $ubicacion = isset($_POST["ubicacion"]) ? $_POST["ubicacion"] : "";

    $sentencia = $conexion->prepare("INSERT INTO `tbl_empresas` (`ID`, `nombreempresa`, `queofreces`, `tecnicaespecializada`, `ubicacion`) VALUES (NULL, :nombreempresa, :queofreces, :tecnicaespecializada, :ubicacion)");

    // Se asignan los valores a las variables en la sentencia preparada
    $sentencia->bindParam(":nombreempresa", $nombreempresa);
    $sentencia->bindParam(":queofreces", $queofreces);
    $sentencia->bindParam(":tecnicaespecializada", $tecnicaespecializada);
    $sentencia->bindParam(":ubicacion", $ubicacion);

    // Se ejecuta la sentencia
    $sentencia->execute();

    // Redireccionar después de insertar
    header("Location:index.php");
    exit();
}

include("../../templates/header.php");
?>
<br/>

<div class="card">
    <div class="card-header">Empresa</div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="nombreempresa" class="form-label">Nombre de la empresa</label>
                <input
                    type="text"
                    class="form-control"
                    name="nombreempresa"
                    id="nombreempresa"
                    aria-describedby="helpId"
                    placeholder=""
                />
                
            </div>
            
            <div class="mb-3">
                <label for="queofreces" class="form-label">Que tienes para ofrecer?</label>
                <input
                    type="text"
                    class="form-control"
                    name="queofreces"
                    id="queofreces"
                    placeholder=""
                />
            </div>

            <div class="mb-3">
                <label for="tecnicaespecializada" class="form-label">Tecnica donde se especializa</label>
                <input
                    type="text"
                    class="form-control"
                    name="tecnicaespecializada"
                    id="tecnicaespecializada"
                    aria-describedby="emailHelpId"
                    placeholder=""
                />
               
            </div>

            <div class="mb-3">
                <label for="ubicacion" class="form-label">ubicacion</label>
                <input
                    type="text"
                    class="form-control"
                    name="ubicacion"
                    id="ubicacion"
                    placeholder=""
                />
            </div>

            <button type="submit" class="btn btn-success">Agregar empresa</button>
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
