<?php
include("../../bd.php");

if($_POST){
    $titulo=(isset($_POST['titulo']))?$_POST['titulo']:"";
    $descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";
    $link=(isset($_POST['link']))?$_POST['link']:"";
    $fecha=(isset($_POST['fecha']))?$_POST['fecha']:"";


    $foto=(isset($_FILES['foto']["name"]))?$_FILES['foto']["name"]:"";
   $fecha_foto=new DateTime();
   $nombre_foto=$fecha_foto->getTimestamp()."_".$foto;
   $tmp_foto=$_FILES["foto"]["tmp_name"];

   if($tmp_foto!=""){
    move_uploaded_file($tmp_foto,"../../../images/pasantia/".$nombre_foto);

   }

    
    
   


    $sentencia=$conexion->prepare ("
    INSERT INTO `tbl_pasantia` (`ID`, `titulo`, `descripcion`, `foto`, `link`, `fecha`) 
    VALUES (NULL, :titulo, :descripcion, :foto, :link, :fecha);");
 
 
    


   $sentencia->bindParam(":foto",$nombre_foto);
    $sentencia->bindParam(":titulo",$titulo);
    $sentencia->bindParam(":descripcion",$descripcion);
    $sentencia->bindParam(":link",$link);
    $sentencia->bindParam(":fecha",$fecha);
    
    
    
    $sentencia->execute();
    header("Location:index.php");


    
}



include("../../templates/header.php");

?>
<br/>

<div class="card">
    <div class="card-header">Pasantías</div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
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

        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input
                type="text"
                class="form-control"
                name="titulo"
                id="titulo"
                aria-describedby="helpId"
                placeholder="Título"
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
                placeholder=""
            />
           
        </div>


        <div class="mb-3">
            <label for="link" class="form-label">Links:</label>
            <input
                type="text"
                class="form-control"
                name="link"
                id="link"
                aria-describedby="helpId"
                placeholder="Escriba sus redes sociales,enlaces o sitios web separados por comas."
            />
          
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha:</label>
            <input
                type="date"
                class="form-control"
                name="fecha"
                id="fecha"
                aria-describedby="helpId"
                placeholder="Escriba la fecha de realización del evento"
            />
        
        </div>
        













       
        
        <button type="submit" class="btn btn-success">Agregar Pasantías</button>
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
    <div class="card-footer text-muted">
        
        
    </div>
</div>



<?php

include("../../templates/footer.php");
?>