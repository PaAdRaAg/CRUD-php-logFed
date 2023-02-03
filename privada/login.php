<?php
  require_once("../config.php");
   //Se asegura que un usuario est� autenticado. Si no lo est�, inicia el proceso de autenticaci�n.
  $saml ->requireAuth();
  //NOTA: El flujo no continuar� hasta que el usuario este correctamente autenticado por el IDP

  include '../db_conn.php';
 //Se asegura que el usuario este autenticado
 $atributos = $saml->getAttributes(); //Obtiene sus atributos
 
 $nocuenta = $atributos["uCuenta"][0];
 $nombre = $atributos["sn"][0];
 $apellido = $atributos["givenName"][0];
 $email = $atributos["uCorreo"][0];
  
 $sql = "INSERT INTO crud (id, nocuenta, nombre, apellido, email)
          VALUES (NULL, $nocuenta, '$nombre', '$apellido', '$email')";
 
 $result = mysqli_query($conn, $sql);
?>