<?php
include("../../bd.php");
if($_POST){
    
    $txtID=(isset($_GET["txtID"]))?$_GET["txtID"]:"";
    $titulo=(isset($_POST['titulo']))?$_POST['titulo']:"";
    $descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";
    $link=(isset($_POST['link']))?$_POST['link']:"";
    $fecha=(isset($_POST['fecha']))?$_POST['fecha']:"";
    


    


    $sentencia=$conexion->prepare("UPDATE `tbl_pasantia` 
    SET titulo=:titulo,
     descripcion=:descripcion,
     link=:link,
     fecha=:fecha
     

    
   WHERE ID=:id");
   

   $sentencia->bindParam(":titulo",$titulo);
   $sentencia->bindParam(":descripcion",$descripcion);
   $sentencia->bindParam(":link",$link);
   $sentencia->bindParam(":fecha",$fecha);
   $sentencia->bindParam(":id",$txtID);
 
   $sentencia->execute();
   header("Location:index.php");

    //proceso de actualizar foto

    $foto=(isset($_FILES['foto']["name"]))?$_FILES['foto']["name"]:"";
    $tmp_foto=$_FILES["foto"]["tmp_name"];
    if($foto!=""){
 
        $fecha_foto=new DateTime();

        $nombre_foto=$fecha_foto->getTimestamp()."_".$foto;

   move_uploaded_file($tmp_foto,"../../../images/pasantia/".$nombre_foto);

   $sentencia=$conexion->prepare("SELECT * FROM `tbl_pasantia` WHERE ID=:id");
$sentencia->bindParam(":id",$txtID);
$sentencia -> execute();

$registro_foto=$sentencia->fetch(PDO::FETCH_LAZY);

if(isset($registro_foto['foto'])){
    if(file_exists("../../../images/pasantia/".$registro_foto['foto'])){
        unlink("../../../images/pasantia/".$registro_foto['foto']);

    }

}

$sentencia=$conexion->prepare("UPDATE `tbl_pasantia` 
    SET foto=:foto
     WHERE ID=:id");
   

   $sentencia->bindParam(":foto",$nombre_foto);
   $sentencia->bindParam(":id",$txtID);
 
   $sentencia->execute();


    }

    
}








if(isset($_GET['txtID'])){
    $txtID=(isset($_GET["txtID"]))?$_GET["txtID"]:"";
    $sentencia=$conexion->prepare("SELECT * FROM `tbl_pasantia` WHERE ID=id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);

//recuperacion de datos (asignar al formulario)
    $titulo=$registro["titulo"];
    $descripcion=$registro["descripcion"];
    $foto=$registro["foto"];


    $link=$registro["link"];
    $fecha=$registro["fecha"];
    


   



  
}



include("../../templates/header.php");

?>

<br/>

<div class="card">
    <div class="card-header">Pasantías</div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
        <div class="mb-3">
    
            <label for="titulo" class="form-label">ID:</label>
            <input
                type="text"
                class="form-control"
                value="<?php echo $txtID;?>"
                name="txtID"
                id="txtID"
                aria-describedby="helpId"
                placeholder="Escriba el título de la pasantía"
            />
            
        </div>
            
            <label for="foto" class="form-label">Foto:</label>
            <br/>
            <img width="50" src="../../../images/pasantia/<?php echo $foto;?>"/>
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
                value="<?php echo $titulo;?>"
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
                value="<?php echo $descripcion;?>"
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
                value="<?php echo $link;?>"
                class="form-control"
                name="link"
                id="link"
                aria-describedby="helpId"
                placeholder="Escriba las redes sociales o los enlaces de la pasantía"
            />
          
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha:</label>
            <input
                type="date"
                value="<?php echo $fecha;?>"
                class="form-control"
                name="fecha"
                id="fecha"
                aria-describedby="helpId"
                placeholder="Escriba la fecha del evento"
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
    <div class="card-footer text-muted">
        
        
    </div>
</div>





<?php

include("../../templates/footer.php");
?>