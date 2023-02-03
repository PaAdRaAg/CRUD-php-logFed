<?php
include '../db_conn.php';

//Se asegura que el usuario este autenticado
require_once("login.php"); 
$atributos = $saml->getAttributes(); //Obtiene sus atributos
echo "Bienvenido ";

$email = $atributos["uCorreo"][0];

$sql = "SELECT * FROM crud";
$result = mysqli_query($conn, $sql);
 
if($row = mysqli_fetch_assoc($result)){
  $correo = $row['email'];
  if($correo != $email){

    $nocuenta = $atributos["uCuenta"][0];
    $nombre = $atributos["sn"][0];
    $apellido = $atributos["givenName"][0];
    $email = $atributos["uCorreo"][0];

    $sql = "INSERT INTO crud (id, nocuenta, nombre, apellido, email)
    VALUES (NULL, $nocuenta, '$nombre', '$apellido', '$email')";

    $result = mysqli_query($conn, $sql);

    // header("Location: index.php");
  }
  // else{
  //     header("Location: index.php");
  //   }
 }
 

//Imprime los atributos
foreach ($atributos as $clave => $valor) {
  echo "<br><b>".$clave."</b>:".$valor[0];
}
echo "<br><br>Usted se encuentra en la secci&oacute;n privada de esta aplicaci&oacute;n<br><a href='../index.php'>Ir a secci&oacute;n p&uacute;blica</a><br><a href='logout.php'>[Cerrar sesi&oacute;n]</a>";

////////////////////////////////////////////

si correo ingrsado es igual a correo de la base de datos, no se inserta nada
si no guardar información el la bd




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

?>