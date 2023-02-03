<?php
  include '../db_conn.php';

  require_once("login.php"); //Se asegura que el usuario este autenticado

  $atributos = $saml->getAttributes(); //Obtiene sus atributos

  //Imprime los atributos
  foreach ($atributos as $clave => $valor) {
    echo "<br><b>".$clave."</b>:".$valor[0];
  }

  echo "<br><br>Usted se encuentra en la secci&oacute;n privada de esta aplicaci&oacute;n<br><a href='../index.php'>Ir a secci&oacute;n p&uacute;blica</a><br><a href='logout.php'>[Cerrar sesi&oacute;n]</a>";



  ////////////GUENA
  // include '../db_conn.php';

  // $atributos = $saml->getAttributes(); //Obtiene sus atributos

  // $nocuenta = $atributos["uCuenta"][0];
  // $nombre = $atributos["sn"][0];
  // $apellido = $atributos["givenName"][0];
  // $email = $atributos["uCorreo"][0];

  // $sql = "INSERT INTO crud (id, nocuenta, nombre, apellido, email)
  //     VALUES (NULL, $nocuenta, '$nombre', '$apellido', '$email')";

  // $result = mysqli_query($conn, $sql);
  ///////////////////////gurna2
  // include '../db_conn.php';


  // $atributos = $saml->getAttributes(); //Obtiene sus atributos

  // $nocuenta = $atributos["uCuenta"][0];
  // $nombre = $atributos["sn"][0];
  // $apellido = $atributos["givenName"][0];
  // $email = $atributos["uCorreo"][0];

  // $sql = "SELECT * FROM crud WHERE email = '$email'";
  // $result = mysqli_query($conn, $sql);
  // if (mysqli_num_rows($result) > 0) {
  //   echo "Location: ../index.php"
  // } else {
  //   $sql = "INSERT INTO crud (id, nombre, apellido, email)
  //   VALUES (NULL, '$nombre', '$apellido', '$email')";
  //   if (mysqli_query($conn, $sql)) {
  //       echo "Value inserted successfully";
  //   } else {
  //       echo "Error inserting value: " . mysqli_error($conn);
  //   }
  // }
?>