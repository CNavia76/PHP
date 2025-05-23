<?php
session_start();
// Carga automática simple
spl_autoload_register(function ($class) {
    $paths = ['config/', 'model/', 'controller/', 'lib/'];
    foreach ($paths as $path) {
        $file = __DIR__ . "/$path$class.php";
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Función para validar el token CSRF
function validarTokenCSRF($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

$db = new Database();
$conexion = $db->getConexion();

$auth = new AuthController($conexion);
$asistenciaController = new AsistenciaController($conexion);

$action = $_GET['action'] ?? 'login';

switch ($action) {
    case 'registro_usuario':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!validarTokenCSRF($_POST['csrf_token'])) {
                die('Error: Token CSRF inválido');
            }
            $resultado = $auth->registrar($_POST['username'], $_POST['password'], $_POST['password_confirm']);
            if ($resultado['success']) {
                header('Location: index.php?action=login');
                exit;
            } else {
                echo $resultado['mensaje'];
            }
        }
        require __DIR__ . '/view/registro_usuario.php';
        break;

    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!validarTokenCSRF($_POST['csrf_token'])) {
                die('Error: Token CSRF inválido');
            }
            $resultado = $auth->login($_POST['username'], $_POST['password']);
            if ($resultado['success']) {
                header('Location: index.php?action=dashboard');
                exit;
            } else {
                echo $resultado['mensaje'];
            }
        }
        require __DIR__ . '/view/login.php';
        break;

    case 'logout':
        $auth->logout();
        header('Location: index.php?action=login');
        exit;

    case 'dashboard':
        if (!$auth->estaAutenticado()) {
            header('Location: index.php?action=login');
            exit;
        }
        require __DIR__ . '/view/dashboard.php';
        break;

    // Rutas protegidas para asistencia
    case 'registro':
    case 'agregar':
    case 'listar':
    case 'eliminar':
        if (!$auth->estaAutenticado()) {
            header('Location: index.php?action=login');
            exit;
        }
        // Aquí va el código anterior para manejo de asistencia
        switch ($action) {
            case 'registro':
                require __DIR__ . '/view/registro_asistencia.php';
                break;

            case 'agregar':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Validar y sanitizar entradas
                    $idEmpleado = filter_input(INPUT_POST, 'idEmpleado', FILTER_VALIDATE_INT);
                    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $apellido = filter_input(INPUT_POST, 'apellido', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $entrada = $_POST['entrada'];
                    $salida = $_POST['salida'];

                    if (!$idEmpleado || !$nombre || !$apellido || !$entrada || !$salida) {
                        echo "Datos inválidos.";
                        exit;
                    }

                    // Convertir fechas
                    $entrada = date('Y-m-d H:i:s', strtotime($entrada));
                    $salida = date('Y-m-d H:i:s', strtotime($salida));

                    $success = $asistenciaController->agregar($idEmpleado, $nombre, $apellido, $entrada, $salida);
                    if ($success) {
                        header('Location: index.php?action=listar');
                        exit;
                    } else {
                        echo "Error al registrar asistencia.";
                    }
                }
                break;

            case 'listar':
                $registros = $asistenciaController->listar();
                require __DIR__ . '/view/lista_asistencia.php';
                break;

            case 'eliminar':
                if (isset($_GET['id'])) {
                    $id = intval($_GET['id']);
                    $asistenciaController->eliminar($id);
                }
                header('Location: index.php?action=listar');
                exit;
        }
        break;

    default:
        header('Location: index.php?action=login');
        exit;
}
?>
