<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $mensaje = $_POST["mensaje"];

    $destinatario = "lechuzasoluciones@gmail.com"; // Reemplaza con la dirección de correo donde deseas recibir los mensajes.

    $asunto = "Mensaje de contacto de $nombre ";

    $contenido = "Nombre: $nombre \n";
    $contenido .= "Correo Electrónico: $correo\n";
    $contenido .= "Teléfono: $telefono\n";
    $contenido .= "Mensaje:\n$mensaje";

    // Envía el correo
    mail($destinatario, $asunto, $contenido);

    // Redirecciona a una página de confirmación
    header(Location: index.html);
} else {
    // Si se intenta acceder directamente a este archivo sin enviar el formulario, redirige al formulario.
    header(Location: index.html);
}
?>