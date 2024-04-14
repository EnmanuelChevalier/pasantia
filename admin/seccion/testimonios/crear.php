<?php 
include("../../bd.php");
if($_POST){


    $opinion=(isset($_POST["opinion"]))?$_POST["opinion"]:"";
    $nombre=(isset($_POST["nombre"]))?$_POST["nombre"]:"";
    $apellido=(isset($_POST["apellido"]))?$_POST["apellido"]:"";
    $fecha=(isset($_POST["fecha"]))?$_POST["fecha"]:"";
    $exito=(isset($_POST["exito"]))?$_POST["exito"]:"";
    



    $sentencia=$conexion->prepare("INSERT INTO `tbl_testimonios` (`ID`, `nombre`, `apellido`,`opinion`, `fecha`,exito) 
    VALUES (NULL, :nombre, :apellido,:opinion,:fecha,:exito);
    ");

    
    $sentencia->bindParam(":nombre",$nombre);
    $sentencia->bindParam(":apellido",$apellido);
   

    $sentencia->bindParam(":opinion",$opinion);
    $sentencia->bindParam(":fecha",$fecha);
    $sentencia->bindParam(":exito",$exito);
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
            <label for="nombre" class="form-label">Nombre:</label>
            <input
                type="text"
                class="form-control"
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
                name="apellido"
                id="apellido"
                aria-describedby="helpId"
                placeholder="apellido"
            />
   
        </div>


        <div class="mb-3">
            <label for="" class="form-label">Opinión:</label>
            <input
                type="text"
                class="form-control"
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
                name="fecha"
                id="fecha"
                aria-describedby="helpId"
                placeholder="fecha"
            />
   
        </div>

        <div class="mb-3">
            <label for="exito" class="form-label">Exito:</label>
            <input
                type="text"
                class="form-control"
                name="exito"
                id="exito"
                aria-describedby="helpId"
                placeholder="historia de éxito en la obtención de empleo después de la pasantía."
            />
   
        </div>


        <button type="submit" class="btn btn-success">Agregar testimonios</button>
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