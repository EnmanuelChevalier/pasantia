<?php 
include("../../bd.php");

if($_POST){

    $txtID=(isset($_GET["txtID"]))?$_GET["txtID"]:"";

    $titulo=(isset($_POST["titulo"]))?$_POST["titulo"]:"";
    $categoria=(isset($_POST["categoria"]))?$_POST["categoria"]:"";
    $area_estudio=(isset($_POST["area_estudio"]))?$_POST["area_estudio"]:"";
    $ubicacion=(isset($_POST["ubicacion"]))?$_POST["ubicacion"]:"";
    $duracion=(isset($_POST["duracion"]))?$_POST["duracion"]:"";
    $descripcion=(isset($_POST["descripcion"]))?$_POST["descripcion"]:"";
    $requisitos=(isset($_POST["requisitos"]))?$_POST["requisitos"]:"";
    $fecha_publicacion=(isset($_POST["fecha_publicacion"]))?$_POST["fecha_publicacion"]:"";


    $sentencia=$conexion->prepare(" UPDATE categorias
    SET titulo=:titulo,
    categoria=:categoria,
    area_estudio=:area_estudio,
    ubicacion=:ubicacion,
    duracion=:duracion,
    descripcion=:descripcion,
    requisitos=:requisitos,
    fecha_publicacion=:fecha_publicacion





   WHERE id=:id");

$sentencia->bindParam(":titulo",$titulo);
$sentencia->bindParam(":categoria",$categoria);
$sentencia->bindParam(":area_estudio",$area_estudio);
$sentencia->bindParam(":ubicacion",$ubicacion);
$sentencia->bindParam(":duracion",$duracion);
$sentencia->bindParam(":descripcion",$descripcion);
$sentencia->bindParam(":requisitos",$requisitos);
$sentencia->bindParam(":fecha_publicacion",$fecha_publicacion);
$sentencia->bindParam(":id",$txtID);
$sentencia->execute();




//proceso de actualizar foto

$foto=(isset($_FILES['foto']["name"]))?$_FILES['foto']["name"]:"";
$tmp_foto=$_FILES["foto"]["tmp_name"];
if($foto!=""){

    $fecha_foto=new DateTime();

    $nombre_foto=$fecha_foto->getTimestamp()."_".$foto;

move_uploaded_file($tmp_foto,"../../../images/categorias/".$nombre_foto);

$sentencia=$conexion->prepare("SELECT * FROM categorias WHERE ID=:id");
$sentencia->bindParam(":id",$txtID);
$sentencia -> execute();

$registro_foto=$sentencia->fetch(PDO::FETCH_LAZY);

if(isset($registro_foto['foto'])){
if(file_exists("../../../images/categorias/".$registro_foto['foto'])){
    unlink("../../../images/categorias/".$registro_foto['foto']);

}

}

$sentencia=$conexion->prepare("UPDATE `categorias` 
SET foto=:foto
 WHERE id=:id");


$sentencia->bindParam(":foto",$nombre_foto);
$sentencia->bindParam(":id",$txtID);

$sentencia->execute();

}
header("Location:index.php");


}



if(isset($_GET['txtID'])){
    $txtID=(isset($_GET["txtID"]))?$_GET["txtID"]:"";

    $sentencia=$conexion->prepare("SELECT * FROM `categorias` WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);

    //recuperacion de datos (asignar al formulario)
    $titulo = $registro["titulo"];
    $categoria = $registro["categoria"];
    $area_estudio = $registro["area_estudio"];
    $ubicacion = $registro["ubicacion"];
    $duracion = $registro["duracion"];
    $descripcion = $registro["descripcion"];
    $requisitos = $registro["requisitos"];
    $fecha_publicacion = $registro["fecha_publicacion"];
    $foto = $registro["foto"];
}

include("../../templates/header.php");?>
<br/>
<div class="card">
    <div class="card-header">Pasantias por Categorias</div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
<div class="mb-3">
    <label for="" class="form-label">ID:</label>
    <input
        type="text"
        class="form-control"
        value="<?php echo $txtID;?>"
        name=""
        id="txtID"
        aria-describedby="helpId"
        placeholder=""
    />

</div>








            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input
                    type="text"
                    class="form-control"
                    value="<?php echo $titulo;?>"
                    name="titulo"
                    id="titulo"
                    aria-describedby="helpId"
                    placeholder="Titulo"
                />
              
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria:</label>
                <input
                    type="text"
                    class="form-control"
                    value="<?php echo $categoria;?>"
                    name="categoria"
                    id="categoria"
                    aria-describedby="helpId"
                    placeholder="categoria"
                />
              
            </div>



            <div class="mb-3">
                <label for="area_estudio" class="form-label">Área de Estudio:</label>
                <input
                    type="text"
                    class="form-control"
                    value="<?php echo $area_estudio;?>"
                    name="area_estudio"
                    id="area_estudio"
                    aria-describedby="helpId"
                    placeholder="area de estudio"
                />
              
            </div>


            <div class="mb-3">
                <label for="ubicacion" class="form-label">Ubicación:</label>
                <input
                    type="text"
                    class="form-control"
                    value="<?php echo $ubicacion;?>"
                    name="ubicacion"
                    id="ubicacion"
                    aria-describedby="helpId"
                    placeholder="ubicacion"
                />
              
            </div>


            <div class="mb-3">
                <label for="duracion" class="form-label">Duración:</label>
                <input
                    type="text"
                    class="form-control"
                    value="<?php echo $duracion;?>"
                    name="duracion"
                    id="duracion"
                    aria-describedby="helpId"
                    placeholder="duracion"
                />
              
            </div>


            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <input
                    type="text"
                    class="form-control"
                    value="<?php echo $descripcion;?>"
                    name="descripcion"
                    id="descripcion"
                    aria-describedby="helpId"
                    placeholder="descripcion"
                />
              
            </div>



            <div class="mb-3">
                <label for="requisitos" class="form-label">Requisitos:</label>
                <input
                    type="text"
                    class="form-control"
                    value="<?php echo $requisitos;?>"
                    name="requisitos"
                    id="requisitos"
                    aria-describedby="helpId"
                    placeholder="requisitos"
                />
              
            </div>




            <div class="mb-3">
                <label for="fecha_publicacion" class="form-label">Fecha de Publicación:</label>
                <input
                    type="date"
                    class="form-control"
                    value="<?php echo $fecha_publicacion;?>"
                    name="fecha_publicacion"
                    id="fecha_publicacion"
                    aria-describedby="helpId"
                    placeholder="fecha de publicacion"
                />
              
            </div>

           <div class="mb-3">
            <label for="foto" class="form-label">Foto:</label>
            <br/>
            <img width="50" src="../../../images/categorias/<?php echo $foto;?>"/>
            <input
                type="file"
                class="form-control"
                name="foto"
                id="foto"
                placeholder=""
                aria-describedby="fileHelpId"
            />
       
           </div>


         


           
        <button type="submit" class="btn btn-success">Modificar pasantía</button>
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