<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>CRUD</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-m mb-5" style="font-size: 30px">CRUD PHP</nav>

    <?php
        include 'db_conn.php';

        require_once('config.php');
        echo "SECCION PUBLICA";
        if($saml->isAuthenticated()) //Si el usuario ya esta autenticado en saml
            { $atributos= $saml->getAttributes(); //Obtener sus atributos
            echo "<br> Existe sesi&oacute;n a nombre de ".$atributos["uNombre"][0]."<br><a href='./privada/index.php'>Ir a secci&oacute;n privada</a>"; //Imprimir el atributo uNombre
        }
        else {
            echo "<br>No hay sesi&oacute;n iniciada<br><a href='./privada/'>Iniciar sesi&oacute;n</a>";
        }
    ?>

    <div class="container">
        <?php
            if(isset($_GET['msg'])){
                $msg = $_GET['msg'];
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        '.$msg.'
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
        ?>

        <table class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">No. Cuenta</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM crud";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['nocuenta'] ?></td>
                    <td><?php echo $row['nombre'] ?></td>
                    <td><?php echo $row['apellido'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td>
                        <a href="eliminar.php?id=<?php echo $row['id'] ?>" class="link-dark">
                            <i class="fa-solid fa-trash fs-5"></i>
                        </a>
                    </td>   
                </tr>
                <?php
                }
                ?>

                <?php
                    // Definir variable a buscar
                    $atributos = $saml->getAttributes(); //Obtiene sus atributos

                    $variable_a_buscar = $atributos["uCorreo"][0];

                    // Preparar sentencia SQL para seleccionar registros
                    $sql = "SELECT * FROM crud WHERE email = '$variable_a_buscar'";

                    // Ejecutar sentencia y obtener resultados
                    $result = $conn->query($sql);

                    // Verificar si se encontró la variable
                    if ($result->num_rows > 0) {
                        // La variable se encontró, no hacer nada
                    } else {
                        // La variable no se encontró, ejecutar código
                        $nocuenta = $atributos["uCuenta"][0];
                        $nombre = $atributos["sn"][0];
                        $apellido = $atributos["givenName"][0];
                        $email = $atributos["uCorreo"][0];

                        $sql = "INSERT INTO crud (id, nocuenta, nombre, apellido, email)
                            VALUES (NULL, $nocuenta, '$nombre', '$apellido', '$email')";

                        $result = mysqli_query($conn, $sql);
                    }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>