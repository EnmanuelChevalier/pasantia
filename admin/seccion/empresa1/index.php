<?php 
include("../../bd.php");

if(isset($_GET['txtID'])){
    $txtID=(isset($_GET["txtID"]))?$_GET["txtID"]:"";








//borrar en la base de datos
    $sentencia=$conexion->prepare("DELETE FROM tbl_empresas1 WHERE ID=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    header("Location:index.php");

}





$sentencia=$conexion->prepare("SELECT * FROM tbl_empresas1");
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
                    <th scope="col">Nombre de la empresa</th>
                    <th scope="col">Que tienes para ofrecer?</th>
                    <th scope="col">Tecnica en donde se especializa </th>
                    <th scope="col">Ubicación</th>
                   
                    
                </tr>
            </thead>
            <tbody>
                
                    <?php foreach($lista_c as $registro) {   ?>
                        <tr class="">
                    <td scope="row"><?php echo $registro["ID"];  ?></td>
                    <td><?php echo $registro["nombreempresa"];  ?></td>
                    <td><?php echo $registro["queofreces"];  ?></td>
                    <td><?php echo $registro["tecnicaespecializada"];  ?></td>
                    <td><?php echo $registro["ubicacion"];  ?></td>
                
                 
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