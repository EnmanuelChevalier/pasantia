<?php 
include("../../bd.php");

if(isset($_GET['txtID'])){
    $txtID=(isset($_GET["txtID"]))?$_GET["txtID"]:"";

    //proceso de borrar img
$sentencia=$conexion->prepare("SELECT * FROM `categorias` WHERE ID=:id");
$sentencia->bindParam(":id",$txtID);
$sentencia -> execute();

$registro_foto=$sentencia->fetch(PDO::FETCH_LAZY);

if(isset($registro_foto['foto'])){
    if(file_exists("../../../images/categorias/".$registro_foto['foto'])){
        unlink("../../../images/categorias/".$registro_foto['foto']);

    }

}






//borrar en la base de datos
    $sentencia=$conexion->prepare("DELETE FROM `categorias` WHERE ID=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    header("Location:index.php");

}





$sentencia=$conexion->prepare("SELECT * FROM `categorias`");
$sentencia -> execute();
$lista_c = $sentencia -> fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");?>
<br/>

<div class="card">
    <div class="card-header"><a
        name=""
        id=""
        class="btn btn-primary"
        href="crear.php"
        role="button"
        >Agregar registros
</a></div>
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
                    <th scope="col">Título </th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Area de Estudio</th>
                    <th scope="col">Ubicación</th>
                    <th scope="col">Duración</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Requisitos</th>
                    <th scope="col">Fecha de Publicación</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                
                    <?php foreach($lista_c as $registro) {   ?>
                        <tr class="">
                    <td scope="row"><?php echo $registro["ID"];  ?></td>
                    <td><?php echo $registro["titulo"];  ?></td>
                    <td><?php echo $registro["categoria"];  ?></td>
                    <td><?php echo $registro["area_estudio"];  ?></td>
                    <td><?php echo $registro["ubicacion"];  ?></td>
                    <td><?php echo $registro["duracion"];  ?></td>
                    <td><?php echo $registro["descripcion"];  ?></td>
                    <td><?php echo $registro["requisitos"];  ?></td>
                    <td><?php echo $registro["fecha_publicacion"];  ?></td>
                    <td> <img src="../../../images/categorias/<?php echo $registro['foto']; ?>" width="50" alt="" srcset=""> </td>
                    
                    <td> <a
                            name=""
                            id=""
                            class="btn btn-info"
                            href="editar.php?txtID=<?php echo $registro{'ID'}; ?>"
                            role="button"
                            >Editar</a
                        >

                        <a
                            name=""
                            id=""
                            class="btn btn-danger"
                            href="index.php?txtID=<?php echo $registro{'ID'}; ?>"
                            role="button"
                            >Borrar</a
                        >
                    </td>
                    
                </tr>
                <?php  } ?>
                
            </tbody>
        </table>
    </div>
    
       
    </div>
    <div class="card-footer text-muted"></div>
</div>


<?php include("../../templates/footer.php");?>
