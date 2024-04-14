<?php 
include("../../bd.php");

if($_POST){
   

    $titulo=isset(($_POST["titulo"]))?$_POST["titulo"]:"";
    $categoria=isset(($_POST["categoria"]))?$_POST["categoria"]:"";
    $area_estudio=isset(($_POST["areadeestudio"]))?$_POST["areadeestudio"]:"";
    $ubicacion=isset(($_POST["ubicacion"]))?$_POST["ubicacion"]:"";
    $duracion=isset(($_POST["duracion"]))?$_POST["duracion"]:"";
    $descripcion=isset(($_POST["descripcion"]))?$_POST["descripcion"]:"";
    $requisitos=isset(($_POST["requisitos"]))?$_POST["requisitos"]:"";
    $fecha_publicacion=isset(($_POST["fecha_publicacion"]))?$_POST["fecha_publicacion"]:"";


    



    


    $sentencia=$conexion->prepare("INSERT INTO `categorias` (`ID`, `titulo`, `categoria`, `area_estudio` ,ubicacion,duracion,descripcion,requisitos,fecha_publicacion,foto) 
    VALUES (NULL, :titulo, :categoria,:area_estudio,:ubicacion,:duracion,:descripcion,:requisitos,:fecha_publicacion,:foto);
    ");



$foto=(isset($_FILES['foto']["name"]))?$_FILES['foto']["name"]:"";
$fecha_foto=new DateTime();
$nombre_foto=$fecha_foto->getTimestamp()."_".$foto;
$tmp_foto=$_FILES["foto"]["tmp_name"];

if($tmp_foto!=""){
 move_uploaded_file($tmp_foto,"../../../images/categorias/".$nombre_foto);

}

    
    $sentencia->bindParam(":titulo",$titulo);
    $sentencia->bindParam(":categoria",$categoria);
    $sentencia->bindParam(":area_estudio",$area_estudio);
    $sentencia->bindParam(":ubicacion",$ubicacion);
    $sentencia->bindParam(":duracion",$duracion);
    $sentencia->bindParam(":descripcion",$descripcion);
    $sentencia->bindParam(":requisitos",$requisitos);
    $sentencia->bindParam(":fecha_publicacion",$fecha_publicacion);
    $sentencia->bindParam(":foto",$nombre_foto);


    $sentencia->execute();

    header("Location:index.php");
}




include("../../templates/header.php");?>
<br/>
<div class="card">
    <div class="card-header">Categorias</div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input
                    type="text"
                    class="form-control"
                    name="titulo"
                    id="titulo"
                    aria-describedby="helpId"
                    placeholder="titulo de la pasantía:"
                />
              
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria:</label>
                <input
                    type="text"
                    class="form-control"
                    name="categoria"
                    id="categoria"
                    aria-describedby="helpId"
                    placeholder="Categoria:"
                />
              
            </div>


            <div class="mb-3">
                <label for="areadeestudio" class="form-label">Área de estudio:</label>
                <input
                    type="text"
                    class="form-control"
                    name="areadeestudio"
                    id="areadeestudio"
                    aria-describedby="helpId"
                    placeholder="Área de estudio:"
                />
              
            </div>


            <div class="mb-3">
                <label for="ubicacion" class="form-label">Ubicación:</label>
                <input
                    type="text"
                    class="form-control"
                    name="ubicacion"
                    id="ubicacion"
                    aria-describedby="helpId"
                    placeholder="Ubicación:"
                />
              
            </div>


            <div class="mb-3">
                <label for="duracion" class="form-label">Duración:</label>
                <input
                    type="text"
                    class="form-control"
                    name="duracion"
                    id="duracion"
                    aria-describedby="helpId"
                    placeholder="Duración:"
                />
              
            </div>


            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <input
                    type="text"
                    class="form-control"
                    name="descripcion"
                    id="descripcion"
                    aria-describedby="helpId"
                    placeholder="Descripción:"
                />
              
            </div>


            <div class="mb-3">
                <label for="requisitos" class="form-label">Requisitos:</label>
                <input
                    type="text"
                    class="form-control"
                    name="requisitos"
                    id="requisitos"
                    aria-describedby="helpId"
                    placeholder="Requisitos:"
                />
              
            </div>


            <div class="mb-3">
                <label for="fecha_publicacion" class="form-label">Fecha de Publicación:</label>
                <input
                    type="date"
                    class="form-control"
                    name="fecha_publicacion"
                    id="fecha_publicacion"
                    aria-describedby="helpId"
                    placeholder="Fecha de Publicación:"
                />
              
            </div>

           <div class="mb-3">
            <label for="foto" class="form-label">Foto:</label>
            <input
                type="file"
                class="form-control"
                name="foto"
                id="foto"
                placeholder=""
                aria-describedby="fileHelpId"
            />
       
           </div>


           
           


           
        <button type="submit" class="btn btn-success">Agregar pasantía</button>
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