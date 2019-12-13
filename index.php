
<?php
  include_once 'conexion.php';
   
  
  //leer los datos de la BD
  $leer = 'SELECT * FROM color';
  $gsent = $enlace->prepare($leer);
  $gsent->execute();
  $resultado = $gsent->fetchAll();
 //var_dump($resultado);

 //agregar datos
    if($_POST){
        $color = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];

        $agregar = 'INSERT INTO color (nombre, descripcion) VALUES (?,?)';
        $sentencia_agregar = $enlace->prepare($agregar);
        $sentencia_agregar->execute(array($color,$descripcion));

        header('location:index.php');
       // echo('Agregado');
       }

    //editar datos
    if($_GET){
        $id = $_GET['id'];
        $sql_unico = 'SELECT * FROM color WHERE id=?';
        $gsent_unico = $enlace->prepare($sql_unico);
        $gsent_unico->execute(array($id));
        $re = $gsent_unico->fetch();
        //var_dump($re);
    }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Agregar Colors</title>
  </head>
  <body>
    <div class=" container mt-5">
        <div class="row">
            <div class="col-md-6">
                <?php foreach ($resultado as $dato): ?>
                <div class="alert alert-<?php echo $dato[ 'nombre'] ?> text-uppercase" role="alert">
                    <?php echo $dato[ 'nombre'] ?>
                    - 
                    <?php echo $dato[ 'descripcion'] ?>   
                    <a href="index.php?id=<?php echo $dato['id'] ?>"  class="float-right">
                        <i class="fa fa-edit"></i>
                    </a>   
                </div>
                <?php endforeach ?>
            </div>

            <div class="col-md-6">
                    <?php  if(!$_GET): ?>
                    <h2>Agregar nuevo elemento</h2>
                    <form method="POST">
                        <input type="text" class="form-control " name="nombre" require()>
                        <input type="text" class="form-control mt-4" name="descripcion" require()>
                        <button class= "btn btn-primary mt-4">Agregar</button>
                    </form>
                    <?php endif ?>

                    <?php  if($_GET): ?>
                    <h2>Editar elemento</h2>
                    <form method="GET" action="editar.php">
                        <input type="text" class="form-control " name="nombre" value="<?php echo $re['nombre'] ?>">
                        <input type="text" class="form-control mt-4" name="descripcion" value="<?php echo $re['descripcion'] ?>" >
                        <input type="hidden" name='id' value="<?php echo $re['id'] ?>">
                        <button class= "btn btn-primary mt-4">Agregar</button>
                    </form>
                    <?php endif ?>
            </div>
        </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>