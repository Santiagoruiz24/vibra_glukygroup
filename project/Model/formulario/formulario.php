<?php 
require '../../Controller/conexion.php';
$db = new Database();
$con = $db->connectar();

session_start();

if (!isset($_SESSION['Cedula']) || $_SESSION['Cedula'] == 0) {
    header("Location: ../../Model/login.php");
    exit(); 
}
$cedula_id=$_SESSION['Cedula'];
$usuario = $_SESSION['Nombre'];



?>
<!DOCTYPE html>
<html lang="es">
<head>    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicio pacientes</title>
    <link rel="stylesheet" href="../../CSS/formulario/formulario.css">
</head>
<style> 
    body {
        font-family: 'Montserrat', sans-serif;
    }
</style>
<body>
<header>
        <div class="logo_nav">
            <a href="#" class="logo"><img src="../../IMG/logo2.png" alt="Logo" id="logo">  bienvenido <?php echo $usuario ?></a>
            <ul>
                <li class="but">
                <div class="acordeon">
                    <div class="contenido" name="acor">
                        <div class="label"><i class="fa-regular fa-user fa-lg"></i></div>
                        <div class="cont">
                        <div class="linea_acor"></div>
                            <form action="../../index.php" method="POST">
                            <input type="submit" name="cerrar_sesion" value="Cerrar sesión" id="cerrar_sesion">
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                </li>
            </ul>
            <span class="menu-icon"><i class="fa-solid fa-bars"></i></span>
        </div>
        <nav class="navegar">
        </nav>
    </header>
<main>
    <h1>Formulario Evaluación Desempeño</h1>
                <form action="gu_form.php" method="post">
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nombre de la persona a evaluar</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="inputText" name="nomEvaluado" required>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Cedúla</label>
                        <div class="col-sm-4">
                          <input type="number" class="form-control" id="inputPassword3" name="cedula" required>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputPassword4" class="col-sm-2 col-form-label">Cargo</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="inputPassword4" name="cargo" required>
                        </div>
                      </div>
                      <?php 
                          date_default_timezone_set("America/Bogota");
                          
                          $fechaActual = new DateTime();

                          $fechaDatetime = $fechaActual->format('Y-m-d H:i:s');
                        ?>
                        <input type="hidden" name="fecha"  value="<?php echo $fechaDatetime; ?>">
                      <div class="accordion accordion-flush col-sm-6" id="accordionFlushExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                              Cultura
                            </button>
                          </h2>
                          <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Indicador 1</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" name="indicador1" placeholder="Example input placeholder" required>
                                  </div>
                                  <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Indicador 2</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" name="indicador2" placeholder="Another input placeholder" required>
                                  </div>
                                  <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Indicador 3</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" name="indicador3" placeholder="Example input placeholder" required>
                                  </div>
                                  <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Indicador 4</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" name="indicador4" placeholder="Another input placeholder" required>
                                  </div>
                                  <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Indicador 5</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" name="indicador5" placeholder="Another input placeholder" required>
                                  </div>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                              Resultado rol
                            </button>
                          </h2>
                          <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Resultado 1</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" name="resultado1"placeholder="Example input placeholder" required>
                                  </div>
                                  <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Resultado 2</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" name="resultado2" placeholder="Another input placeholder" required>
                                  </div>
                                  <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Resultado 3</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" name="resultado3" placeholder="Another input placeholder" required>
                                  </div>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                              Objetivos personales
                            </button>
                          </h2>
                          <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Objetivo personal 1</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" name="objetivo1" placeholder="Example input placeholder" required>
                                  </div>
                                  <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Objetivo Personal 2</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" name="objetivo2" placeholder="Another input placeholder" required>
                                  </div>
                            </div>
                          </div>
                        </div>
                      </div>         
                    <button type="submit" class="btn btn-primary"> enviar </button>
                    <?php
                        if (isset($message)) {
                            echo '<p class="">' . $message . '</p>';
                        }
                    ?>
                </form>
</main>
<div class="modal" tabindex="-1" role="dialog" id="confirmationModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Registro cargado correctamente</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Llenar otro registro</button>
                    <form action="../../index.php" method="POST">
                    <button type="submit" class="btn btn-primary" name="cerrar sesion" data-bs-dismiss="modal">Cerrar sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<footer>
    </footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="../../JS/modal.js"></script>
<script>
    $(document).ready(function () {
        <?php
        if (isset($_SESSION['registro_correcto']) && $_SESSION['registro_correcto']) {
            unset($_SESSION['registro_correcto']); // Limpiar la variable de sesión después de usarla
        ?>
            // Mostrar el modal
            $('#confirmationModal').modal('show');
        <?php
        }
        ?>
    });
</script>
</html>