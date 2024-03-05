<?php 
require '../../Controller/conexion.php';
$db = new Database();
$con = $db->connectar();
$correcto = false;


session_start();

if (!isset($_SESSION['Cedula']) || $_SESSION['Cedula'] == 0) {
    header("Location: ../../Model/login.php");
    exit(); 
}
$cedula_id=$_SESSION['Cedula'];
$usuario = $_SESSION['Nombre'];

$nombre = isset($_POST['nomEvaluado']) ? $_POST['nomEvaluado'] : "";
$cedula = isset($_POST['cedula']) ? $_POST['cedula'] : "";
$cargo = isset($_POST['cargo']) ? $_POST['cargo'] : "";
$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : "";
$indicador1 = isset($_POST['indicador1']) ? $_POST['indicador1'] : "";
$indicador2 = isset($_POST['indicador2']) ? $_POST['indicador2'] : "";
$indicador3 = isset($_POST['indicador3']) ? $_POST['indicador3'] : "";
$indicador4 = isset($_POST['indicador4']) ? $_POST['indicador4'] : "";
$indicador5 = isset($_POST['indicador5']) ? $_POST['indicador5'] : "";
$resultado1 = isset($_POST['resultado1']) ? $_POST['resultado1'] : "";
$resultado2 = isset($_POST['resultado2']) ? $_POST['resultado2'] : "";
$resultado3 = isset($_POST['resultado3']) ? $_POST['resultado3'] : "";
$objetivo1 = isset($_POST['objetivo1']) ? $_POST['objetivo1'] : "";
$objetivo2 = isset($_POST['objetivo2']) ? $_POST['objetivo2'] : "";

$query = $con->prepare("INSERT INTO Gluky_Vibra.Formulario_Import (nomEvaluado, cedula, cargo, fecha, indicadorC1, indicadorC2, indicadorC3, indicadorC4, indicadorC5, resultadoR1, resultadoR2, resultadoR3, objetivosP1, objetivosP2, cedula_id) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$query->bindParam(1, $nombre);
$query->bindParam(2, $cedula);
$query->bindParam(3, $cargo);
$query->bindParam(4, $fecha);
$query->bindParam(5, $indicador1);
$query->bindParam(6, $indicador2);
$query->bindParam(7, $indicador3);
$query->bindParam(8, $indicador4);
$query->bindParam(9, $indicador5);
$query->bindParam(10, $resultado1);
$query->bindParam(11, $resultado2);
$query->bindParam(12, $resultado3);
$query->bindParam(13, $objetivo1);
$query->bindParam(14, $objetivo2);
$query->bindParam(15, $cedula_id);

$resultado = $query->execute() or die(print_r($query->errorInfo(), true));

if ($resultado) {
    $_SESSION['registro_correcto'] = true; // Variable de sesión para indicar que el formulario se ha enviado correctamente
    header('Location: formulario.php');
}

?>