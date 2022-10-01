<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <!-- <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <script src="../../node_modules/jquery/dist/jquery.js"></script>    
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../Complements/css/sb-admin-2.css" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="../Model/estilos.css"> -->
    <script src="https://www.google.com/recaptcha/api.js?render=6LdVqnIbAAAAAEEdPfgNjUYxBTaYjRhJjtwB8saa"></script>    

    <script src="../../Complements/js/validaciones.js"></script>
    <script src="../../Complements/js/tokenRecatcha.js"></script>

</head>

<body style="background-color: #243A73">
    <br>
    <br>
    <br>
    <br>

    <div class="container" style="background-color: #243A73">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0" style="border-radius: 2rem !important;">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block ">
                                <img src="../../Complements/imagenes/login.png" height="450px" width="100%" alt="...">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">¡Binevenido!</h1>
                                    </div>

                                    <form class="user" id="frm_registro" action="../../Conexion/acceso.php" method="POST">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="mails" aria-describedby="emailHelp" placeholder="Nombre de usuario / Correo electrónico..." name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="passwords" placeholder="Contraseña" name="pass">
                                        </div>

                                        <button type="button" id="entrar" class="btn btn-outline-success btn-user btn-block ">
                                            Iniciar sesión
                                        </button>
                                        <hr>

                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php">Olvido su Contraseña?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Crea una Cuenta!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->    
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../node_modules/jquery-easing/dist/jquery.easing.1.3.umd.min.js"></script>
    <script src="../../node_modules/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>