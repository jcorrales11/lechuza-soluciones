<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $mensaje = $_POST["mensaje"];

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
        exit(); // Detener la ejecución después de la redirección
    } else {
        // Si el envío del correo falla, registra el error
        error_log("Error al enviar el correo.");
        // También podrías redirigir a una página de error o mostrar un mensaje
        header("Location: error.html"); // Esto es opcional si tienes una página de error
        exit();
    }
} else {
    // Si se intenta acceder directamente a este archivo sin enviar el formulario, redirige al formulario.
    header("Location: index.html");
    exit();
}
?>