<?php

include("../../bd.php");

if(isset($_GET['txtID'])){
    $txtID=(isset($_GET["txtID"]))?$_GET["txtID"]:"";

//proceso de borrar img
$sentencia=$conexion->prepare("SELECT * FROM `tbl_pasantia` WHERE ID=:id");
$sentencia->bindParam(":id",$txtID);
$sentencia -> execute();

$registro_foto=$sentencia->fetch(PDO::FETCH_LAZY);

if(isset($registro_foto['foto'])){
    if(file_exists("../../../images/pasantia/".$registro_foto['foto'])){
        unlink("../../../images/pasantia/".$registro_foto['foto']);

    }

}






//borrar en la base de datos
    $sentencia=$conexion->prepare("DELETE FROM `tbl_pasantia` WHERE ID=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    header("Location:index.php");

}


$sentencia=$conexion->prepare("SELECT * FROM `tbl_pasantia`");
$sentencia -> execute();
$lista_pasantia = $sentencia -> fetchAll(PDO::FETCH_ASSOC);





include("../../templates/header.php");
?>

<br/>
<div class="card">
    <div class="card-header"><a
        name=""
        id=""
        class="btn btn-primary"
        href="crear.php"
        role="button"
        >Agregar Pasantías</a
    ></div>
    <div class="card-body">

    <div
        class="table-responsive-sm"
    >
        <table
            class="table"
        >
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Links</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Acciones</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($lista_pasantia as $key =>$value){ ?>
                <tr class="">
                    <td scope="row"><?php echo $value['ID']; ?></td>
                    <td><?php echo $value['titulo']; ?></td>
                    
                    <td><?php echo $value['descripcion']; ?></td>

                    <td>
                       <img src="../../../images/pasantia/<?php echo $value['foto']; ?>" width="50" alt="" srcset=""> 
                    </td>

                    <td>
                    <?php echo $value['link'];?> 
                    </td>

                    <td><?php echo $value['fecha']; ?></td>


                  


                    <td>
                        <a
                            name=""
                            id=""
                            class="btn btn-info"
                            href="editar.php?txtID=<?php echo $value{'ID'}; ?>"
                            role="button"
                            >Editar</a
                        >

                        <a
                            name=""
                            id=""
                            class="btn btn-danger"
                            href="index.php?txtID=<?php echo $value{'ID'}; ?>"
                            role="button"
                            >Borrar</a
                        >
                        

                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    
    
    </div>
    <div class="card-footer text-muted"></div>
</div>


<?php
include("../../templates/footer.php");
?>