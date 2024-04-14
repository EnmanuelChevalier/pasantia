<?php 
include("../../bd.php");


if(isset($_GET['txtID'])){
    $txtID=(isset($_GET["txtID"]))?$_GET["txtID"]:"";
    $sentencia=$conexion->prepare("SELECT * FROM `tbl_testimonios` WHERE ID=id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();

    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    $nombre=$registro["nombre"];
    $apellido=$registro["apellido"];
    $opinion=$registro["opinion"];
    $fecha=$registro["fecha"];
    $exito=$registro["exito"];
  



  
}


if($_POST){
   $nombre=(isset($_POST["nombre"]))?$_POST["nombre"]:""; 
   $apellido=(isset($_POST["apellido"]))?$_POST["apellido"]:""; 
   $opinion=(isset($_POST["opinion"]))?$_POST["opinion"]:"";
   $fecha=(isset($_POST["fecha"]))?$_POST["fecha"]:""; 
   $exito=(isset($_POST["exito"]))?$_POST["exito"]:""; 
    
    $txtID=(isset($_POST["txtID"]))?$_POST["txtID"]:"";


    $sentencia=$conexion->prepare("UPDATE tbl_testimonios SET
    nombre=:nombre,
    apellido=:apellido,
    opinion=:opinion,
    fecha=:fecha,
    exito=:exito
    
    
    WHERE ID=:id"
    );


   $sentencia->bindParam(":nombre",$nombre);
   $sentencia->bindParam(":apellido",$apellido);
    $sentencia->bindParam(":opinion",$opinion);
    $sentencia->bindParam(":fecha",$fecha);
    $sentencia->bindParam(":exito",$exito);
    
    $sentencia->bindParam(":id",$txtID);

    $sentencia->execute();
    header("Location:index.php");
    
}










include("../../templates/header.php");
?>


<br/>

<div class="card">
    <div class="card-header">
        Testimonios

    </div>
    <div class="card-body">

    <form action="" method="post">
<div class="mb-3">
    <label for="" class="form-label">ID</label>
    <input
        type="text"
        class="form-control"
        value="<?php echo $txtID ;?>"
        name="txtID"
        id="txtID"
        aria-describedby="helpId"
        placeholder=""
    />
   
</div>




<div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input
                type="text"
                class="form-control"
                value="<?php echo $nombre ;?>"
                name="nombre"
                id="nombre"
                aria-describedby="helpId"
                placeholder="Nombre"
            />
   
        </div>




        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido:</label>
            <input
                type="text"
                class="form-control"
                value="<?php echo $apellido ;?>"
                name="apellido"
                id="apellido"
                aria-describedby="helpId"
                placeholder="Apellido"
            />
   
        </div>










        <div class="mb-3">
            <label for="" class="form-label">Opinión:</label>
            <input
                type="text"
                class="form-control"
                value="<?php echo $opinion ;?>"
                name="opinion"
                id="opinion"
                aria-describedby="helpId"
                placeholder="Opinión"
            />
           
        </div>


        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha:</label>
            <input
                type="date"
                class="form-control"
                value="<?php echo $fecha ;?>"
                name="fecha"
                id="fecha"
                aria-describedby="helpId"
                placeholder="Fecha"
            />
           
        </div>


        <div class="mb-3">
            <label for="exito" class="form-label">Exito:</label>
            <input
                type="text"
                class="form-control"
                value="<?php echo $exito ;?>"
                name="exito"
                id="exito"
                aria-describedby="helpId"
                placeholder="historia de éxito en la obtención de empleo después de la pasantía."
            />
           
        </div>



       


        <button type="submit" class="btn btn-success">Modificar testimonio</button>
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




<?php include("../../templates/footer.php");
?>