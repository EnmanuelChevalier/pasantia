<?php 
include("../../bd.php");

if(isset($_GET['txtID'])){
    $txtID=(isset($_GET["txtID"]))?$_GET["txtID"]:"";
    $sentencia=$conexion->prepare("DELETE FROM `estudiantes` WHERE ID=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    header("Location:index.php");

}


$sentencia=$conexion->prepare("SELECT * FROM `estudiantes`");
$sentencia -> execute();
$estudiantes= $sentencia -> fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");?>

<br/>

<div class="card">
    <div class="card-header">Bandeja de comentarios</div>
    <div class="card-body">

    <div
        class="table-responsive-sm"
    >
        <table
            class="table"
        >
            <thead>
                <tr>
                    <th scope="col">ID </th>
                    <th scope="col">Nombre Completo</th>
                    <th scope="col">cédula</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Télefono</th>
                    <th scope="col">Email</th>
                    <th scope="col">Promedio Académico</th>
                    <th scope="col">cv</th>
                    <th scope="col">Institución Educativa</th>
                    <th scope="col">Años de estudio</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($estudiantes as $registro){?>
                <tr class="">
                    <td scope="row"><?php echo $registro["ID"]?></td>
                    <td><?php echo $registro["Nombre Completo"]?></td>
                    <td><?php echo $registro["cédula"]?></td>
                    <td><?php echo $registro["Dirección"]?></td>
                    <td><?php echo $registro["Télefono"]?></td>
                    <td><?php echo $registro["Email"]?></td>
                    <td><?php echo $registro["Promedio Académico"]?></td>
                    <td><?php echo $registro["cv"]?></td>
                    <td><?php echo $registro["Institución Educativa"]?></td>
                    <td><?php echo $registro["Años de estudio"]?></td>
                    <td>

                        <a
                            name=""
                            id=""
                            class="btn btn-danger"
                            href="index.php?txtID=<?php echo $registro{'ID'}; ?>"
                            role="button"
                            >Borrar</a
                        ></td>
                </tr>
                <?php  }?>
               
            </tbody>
        </table>
    </div>
    
       
    </div>
    <div class="card-footer text-muted"></div>
</div>


<?php include("../../templates/footer.php");?>


