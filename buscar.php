<?php
include("conexion.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Afiliamos el archivo de Boostrap con la etiqueta Link-->
<!-- Utilizamos el archivo .min de Boostrap ya que pesa menos, pero contiene lo mismo que el normal-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Integramos nuestro propio CSS para darle modificaciones personalizadas al Index -->
    <link rel="stylesheet" href="css/css-index.css">
    <title>Sistema de Humedad Arduino</title>
</head>
<body>



<div class="d-flex"> 
<!-- Comienzo menu lateral izquierdo -->
    <div id="sidebar-container" class="bg-primary">
        <div class="logo">
            <h4 class="text-light font-weight-bold">Arduino </h4>
        </div>
        <div class="menu">
            <a href=" " class="d-block p-3 text-light mr-2 lead">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-columns-gap" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M6 1H1v3h5V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12h-5v3h5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8H1v7h5V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6h-5v7h5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z"/>
                </svg>
            Tablero</a>
            <a href="" class="d-block p-3 text-light mr-2 lead" >
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-line-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z"/>
                </svg>
            Humedad</a>
            <a href="mostrardatos.php" class="d-block p-3 text-light mr-2 lead">Tablero</a>
            <a href="" class="d-block p-3 text-light mr-2 lead">Tablero</a>         
        </div>
    </div>
<!-- FINAL DEL TABLERO IZQUIERDO -->

<!-- Comienzo del navbar superior -->
                <?php
                 //-------------busqueda-----------
                 //hacer busqueda con letras en minusculas
                 $busqueda = strtolower($_REQUEST['busqueda']);
                 //si no existe busqueda volver a admin.php
                 if(empty($busqueda)){
                   header("location: index.php");
                   mysqli_close($conexion);
                 }
                ?>
    <div class="w-100">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">        
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
           
            <div class="col-md-9 ">
<form action="buscar.php" method="GET" class="">
   <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda; ?>">
   <input type="submit" value="Buscar" class="">
</form>



            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">  
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="img/kisspng-system-administrator-database-administrator-comput-administrator-5ac2ab197ac035.4308782615227072255028.jpg" alt="" class="img-fluid rounded-circle m-2 avatar">
                    Administrador del sitio
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Mi Perfil</a>
                    <a class="dropdown-item" href="#">Suscripciones</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Cerrar sesión</a>
                  </div>
                </li>               
              </ul>              
            </div>          
          </nav> 
<!--Comienzo de texto de bienvenida al administrador + boton de descarga de reporte-->         
          <div id="content" class="">
              <section class="py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <h1 class="font-weight-bold mb-0">Bienvenido Administrador</h1>
                            <p class="lead text-muted">Revisa la ultima información</p>
                        </div>
                        <div class="col-lg-3 d-flex">
                            <button class="btn btn-primary w-100 align-self-center">Descargar Reporte</button>
                        </div>
                    </div>
                </div>
                
              </section>
<!-- FIN DE BIENVENIDA AL ADMINISTRADOR + BOTON DE REPORTE -->

<!-- Comienzo de estadisticas abajo del texto de bienvenida al administrador-->
            <!-- <section class="bg-mix">
                  
                              <div class="col-lg-3 stat my-3 d-flex">
                                <div class="mx-auto">
                                <h6 class="text-muted">ALGUN DATO</h6>
                                <h3 class="font-weight-bold">34234234</h3>
                                <h6 class="text-success">
                                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-up-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4 9a.5.5 0 0 1-.374-.832l4-4.5a.5.5 0 0 1 .748 0l4 4.5A.5.5 0 0 1 12 11H4z"/>
                                  </svg>
                                  50.50%</h6>
                              </div>
                              </div>
                              <div class="col-lg-3 stat my-3 d-flex">
                                <div class="mx-auto">
                                <h6 class="text-muted">ALGUN DATO</h6>
                                <h3 class="font-weight-bold">34234234</h3>
                                <h6 class="text-success">
                                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-up-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4 9a.5.5 0 0 1-.374-.832l4-4.5a.5.5 0 0 1 .748 0l4 4.5A.5.5 0 0 1 12 11H4z"/>
                                  </svg>
                                  50.50%</h6>
                              </div>
                              </div>
                              <div class="col-lg-3 my-3 d-flex">
                                <div class="mx-auto">
                                <h6 class="text-muted">ALGUN DATO</h6>
                                <h3 class="font-weight-bold">34234234</h3>
                                <h6 class="text-success">
                                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-up-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4 9a.5.5 0 0 1-.374-.832l4-4.5a.5.5 0 0 1 .748 0l4 4.5A.5.5 0 0 1 12 11H4z"/>
                                  </svg>
                                  50.50%</h6>
                              </div>
                              </div>
                            </div>
                        </div>
                    </div>
                  </div>
              </section>-->
            
<!-- FIN DE ESTADISTICAS -->
<section>
  <div class="container"> 
  <div class="col-md-12">
    <table class="table table-hover ">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Fecha</th>
          <th scope="col">Hora</th>
          <th scope="col">Temperatura</th>
          <th scope="col">Humedad</th>
         
        </tr>
                    <?php
                      
                      //llamar la variable busqueda
                      $busqueda=$_GET['busqueda'];
                       //sentencia sql para buscar a traves de datos
                       $sql_registro = mysqli_query($conexion,"SELECT COUNT(*) AS total_registro FROM `datos` 
                       WHERE( id LIKE '%$busqueda%' OR
                        fecha    LIKE '%$busqueda%' OR 
                        hora     LIKE '%$busqueda%' OR 
                        var1     LIKE '%$busqueda%' OR 
                        var2     LIKE '%$busqueda%')");
//paginador
$result_registro = mysqli_fetch_array($sql_registro);
$total_registro = $result_registro['total_registro'];

$por_pagina = 5;

if(empty($_GET['pagina'])){
  $pagina = 1;
}else{
  $pagina = $_GET['pagina'];
}
$desde = ($pagina-1) * $por_pagina;
$total_paginas = ceil($total_registro / $por_pagina);


$query = mysqli_query($conexion,"SELECT d.id, d.fecha, d.hora, d.var1, d.var2 
FROM `datos` AS d
  WHERE ( d.id LIKE '%$busqueda%' OR
         d.fecha LIKE '%$busqueda%' OR 
         d.hora  LIKE '%$busqueda%' OR 
         d.var1  LIKE '%$busqueda%' OR 
         d.var2 LIKE '%$busqueda%')
  ORDER BY d.id ASC LIMIT $desde,$por_pagina");
        
        $result = mysqli_num_rows($query);
        if($result > 0){

          while ($data = mysqli_fetch_array($query)){


         ?>
      </thead>
      <tbody>
        <tr>
          <th scope="row"><?php echo $data["id"]; ?></th>
          <td><?php echo $data["fecha"]; ?></td>
          <td><?php echo $data["hora"]; ?></td>
          <td><?php echo $data["var1"]; ?></td>
          <td><?php echo $data["var2"]; ?></td>
          
          
      </tr>

    <?php
    }
  }
  ?>
      </tbody>
    </table>
    <div class="paginador">
    <ul>

                  <?php
                    if($pagina != 1)
                    {
                  ?>

                    <li><a href="?pagina=<?php echo 1; ?>">│<</a></li>
                    <li><a href="?pagina=<?php echo $pagina-1; ?>"><<</a></li>
                    
                  <?php
                    }
                    for ($i=1; $i <= $total_paginas; $i++){

                      if($i == $pagina){
                        echo '<li class="pageSelected">'.$i.'</li>';
                      }else{
                        echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
                      }
                    }

                    if($pagina != $total_paginas){

                    
                  ?>
                  
                    <li><a href="?pagina=<?php echo $pagina + 1; ?>">>></a></li>
                    <li><a href="?pagina=<?php echo $total_paginas;?>">>│</a></li>
                    <?php } ?>
                  </ul>
                  </div>
        </div>
      </div>
</section>

          </div>
    </div>
<!-- FIN del navbar superior -->

</div>






<!-- Super importante que estos 2 archivos esten antes de que cierre la etiqueta <body> -->
<!-- Acá traemos el archivo de Jqery de JS, de la pagina oficial de JQuery-->
    <script src="js/jquery-3.5.1.min.js"></script>
<!-- Acá traemos la carpeta de Boostrap / JS versión min, para utilizar menos espacio en nuestro proyecto-->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>