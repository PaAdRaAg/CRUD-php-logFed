<?php
// include '../db_conn.php';

 //Se asegura que el usuario este autenticado
 require_once("login.php"); 
 $atributos = $saml->getAttributes(); //Obtiene sus atributos
 echo "Bienvenido ";
 
//  $nocuenta = $atributos["uCuenta"][0];
//  $nombre = $atributos["sn"][0];
//  $apellido = $atributos["givenName"][0];
//  $email = $atributos["uCorreo"][0];
  
//  $sql = "INSERT INTO crud (id, nocuenta, nombre, apellido, email)
//           VALUES (NULL, $nocuenta, '$nombre', '$apellido', '$email')";
 
//  $result = mysqli_query($conn, $sql);


  //Imprime los atributos
 foreach ($atributos as $clave => $valor) {
    echo "<br><b>".$clave."</b>:".$valor[0];
}
 echo "<br><br>Usted se encuentra en la secci&oacute;n privada de esta aplicaci&oacute;n<br><a href='../'>Ir a secci&oacute;n p&uacute;blica</a><br><a href='logout.php'>[Cerrar sesi&oacute;n]</a>";

 ////////////////////////////////////////////////////////////////////////////////////
// $nocuenta = $atributos["uNocuenta"][0];
// $nombre = $atributos["sn"][0];
// $apellido = $atributos["givenName"][0];
// $email = $atributos["uCorreo"][0];
 
// $sql = "INSERT INTO crud (id, nocuenta, nombre, apellido, email)
//          VALUES (NULL,'$nocuenta' '$nombre', '$apellido', '$email')";

// $result = mysqli_query($conn, $sql);

// if ($result) {
//     header("Location: index.php?msg=Registro creado exitosamente");
// } else {
//     echo "Error al crear registro: " . mysqli_error($conn);
// }

?>