<?php
 require_once("db/database_utilities.php");

//$user_access = [];
//$total_users = count($user_access);
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tarea 3 |  Bienvenidos</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

     
    <div class="row">
 
      <div class="large-9 columns">
        <h3>Tablas:</h3>
          <p>Listado</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <table>
                <thead>
                  <th>Usuarios</th>
                  <th>Tipos de usuarios</th>
                  <th>status</th>
                  <th> logins</th>
                  <th>Usuarios Activos</th>
                  <th>Usuarios Inactivos</th>
                </thead>
                <tbody>
                  <tr>
                    <td> <?php echo(users())?></td>
                    <td> <?php echo(tipos())?> </td>
                    <td> <?php echo(status())?></td>
                    <td><?php echo(logs())?></td>
                    <td><?php echo(activos())?></td>
                    <td><?php echo(inactivos())?></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <?php 
          // tablas de la base de datos
          $tablas=["status","usuarios","inicio","tipo_usuario"];
          //atributos de las tablas
          $columnas=[["id","nombre"],["id","email","passw","id_status","id_tipoUsuario"],["id","fecha","id_usuario"],["id","nombre"]];
          //NUmero de tablas que existen
          $n=0;
          //recorre cada tabla de $ablas
          foreach($tablas as $tabla){
            $query = tabla($tabla);  
            echo("Tabla: ".$tabla);
          ?>
            <table>
              <thead>
                <?php 
                  //Se imprime la cabecera de las tablas
                  for($i=0; $i<count($columnas[$n]); $i++){
                    echo("<th>".$columnas[$n][$i]."</th>");
                  }
                  //$r = $res->rowCount();
                  //contador de las filas 
               $count = $query->rowCount();
                ?>
              </thead>
              <tbody>
                <?php
                  // recorre las filas y columnas
                  for($i=0; $i<$count;$i++){
                    $d=$query->fetch(PDO::FETCH_ASSOC);//filas
                    ?>
                    <tr>
                    <?php
                    for($j=0; $j<count($columnas[$n]); $j++){//columnas
                      echo("<td>".$d[$columnas[$n][$j]]."</td>");
                    }
                    ?>
                    </tr>
                    <?php
                  }
                ?>
              </tbody>
            </table>
          <?php
          $n++;
          }
          ?>
          </section>
        </div>
      </div>
    </div>
            
        

    <?php require_once('footer.php'); ?>