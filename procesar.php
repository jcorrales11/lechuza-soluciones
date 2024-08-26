<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : '';
    $correo = isset($_POST["correo"]) ? $_POST["correo"] : '';
    $telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : '';
    $mensaje = isset($_POST["mensaje"]) ? $_POST["mensaje"] : '';

    // Validar que todos los campos necesarios estén presentes
    if (empty($nombre) || empty($correo) || empty($telefono) || empty($mensaje)) {
        // Puedes redirigir a una página de error o mostrar un mensaje de error
        header("Location: error.html");
        exit();
    }

    $destinatario = "lechuzasoluciones@gmail.com"; // Reemplaza con la dirección de correo donde deseas recibir los mensajes.

    $asunto = "Mensaje de contacto de $nombre";

    $contenido = "Nombre: $nombre\n";
    $contenido .= "Correo Electrónico: $correo\n";
    $contenido .= "Teléfono: $telefono\n";
    $contenido .= "Mensaje:\n$mensaje";

    // Intenta enviar el correo y verifica si hay errores
    if (mail($destinatario, $asunto, $contenido)) {
        // Si el correo se envió correctamente, redirige a la página de confirmación
        header("Location: index.html");
    } else {
        // Si el envío del correo falla, registra el error
        error_log("Error al enviar el correo.");
        // Redirige a una página de error o muestra un mensaje de error
        header("Location: error.html");
    }
    exit(); // Es recomendable agregar exit después de header para evitar ejecutar más código
} else {
    // Si se intenta acceder directamente a este archivo sin enviar el formulario, redirige al formulario.
    header("Location: index.html");
    exit();
}
?>