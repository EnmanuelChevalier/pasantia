<?php 
include("../../bd.php");

if(isset($_GET['txtID'])){
    $txtID=(isset($_GET["txtID"]))?$_GET["txtID"]:"";

    // Borrar en la base de datos
    $sentencia=$conexion->prepare("DELETE FROM `tbl_estudiantes` WHERE ID=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    header("Location:index.php");
}

$sentencia=$conexion->prepare("SELECT * FROM `tbl_estudiantes`");
$sentencia->execute();
$lista_c = $sentencia->fetchAll(PDO::FETCH_ASSOC);

// Contador de personas registradas
$num_registros = count($lista_c);

include("../../templates/header.php");
?>
<br/>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registros</a>
        <span class="float-end">Personas registradas: <?php echo $num_registros; ?></span>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo Electronico</th>
                        <th scope="col">Tecnica</th>
                        <th scope="col">Cedula</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Centro de Estudio</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lista_c as $registro) { ?>
                        <tr>
                            <td><?php echo $registro["ID"]; ?></td>
                            <td><?php echo $registro["nombre"]; ?></td>
                            <td><?php echo $registro["correo"]; ?></td>
                            <td><?php echo $registro["tecnica"]; ?></td>
                            <td><?php echo $registro["cedula"]; ?></td>
                            <td><?php echo $registro["edad"]; ?></td>
                            <td><?php echo $registro["centrodeestudio"]; ?></td>
                            <td>
                                <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registro['ID']; ?>" role="button">Editar</a>
                                <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registro['ID']; ?>" role="button">Borrar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include("../../templates/footer.php");?>
