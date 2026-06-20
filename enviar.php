<?php
// 1. Recibir datos del formulario
$nombre   = isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : '';
$correo   = isset($_POST['correo']) ? htmlspecialchars($_POST['correo']) : '';
$telefono = isset($_POST['telefono']) ? htmlspecialchars($_POST['telefono']) : '';
$servicio = isset($_POST['servicio']) ? htmlspecialchars($_POST['servicio']) : '';
$mensaje  = isset($_POST['mensaje']) ? nl2br(htmlspecialchars($_POST['mensaje'])) : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 2. Configuración del correo
    $destinatario = "infor@inversionesinpelka.com";
    $asunto       = "Nuevo contacto web de " . $nombre;

    // 3. Plantilla HTML del correo
    $cuerpo = '
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contacto Inpelka</title>
        <style>
            body { margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f4f4; }
            .email-container { max-width: 600px; margin: 0 auto; background-color: #ffffff; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
            
            /* Header */
            .header {
                background: linear-gradient(135deg, #FF9800 0%, #4CAF50 100%);
                padding: 20px;
                position: relative;
                overflow: hidden;
                min-height: 100px;
            }
            /* Logo en parte superior izquierda */
            .logo {
                max-width: 150px;
                height: auto;
                position: relative;
                z-index: 2;
                display: block;
            }
            /* Fondo de ondas sinusoidales */
            .wave-bg {
                position: absolute;
                top: 0; left: 0; width: 100%; height: 100%;
                background-image: url("data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 1440 320\'%3E%3Cpath fill=\'%23ffffff\' fill-opacity=\'0.3\' d=\'M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z\'%3E%3C/path%3E%3C/svg%3E");
                background-size: cover;
                z-index: 1;
            }

            /* Cuerpo con tabla */
            .body-content { padding: 30px; background-color: #ffffff; color: #333333; }
            .data-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
            .data-table td { padding: 12px 5px; vertical-align: top; border-bottom: 1px solid #eeeeee; }
            .label { font-weight: bold; color: #d32f2f; width: 120px; }
            .value { color: #555555; }
            .message-box { background-color: #f9f9f9; padding: 15px; border-radius: 5px; border-left: 4px solid #4CAF50; margin-top: 10px; }

            /* Footer Negro */
            .footer { background-color: #000000; color: #ffffff; padding: 20px; text-align: center; font-size: 12px; }
            .social-icons { margin-bottom: 10px; }
            .social-icon { 
                display: inline-block; 
                margin: 0 6px; 
                width: 28px; 
                height: 28px; 
                border-radius: 50%; 
                overflow: hidden;
                vertical-align: middle;
                /* Degradado naranja-verde */
                background: linear-gradient(135deg, #FF9800 0%, #4CAF50 100%);
            }
            .social-icon img {
                width: 16px;
                height: 16px;
                object-fit: contain;
                display: block;
                margin: 6px auto;
            }
            .copyright { color: #aaaaaa; margin-top: 5px; }
        </style>
    </head>
    <body>
        <div class="email-container">
            
            <!-- Encabezado con Logo y Ondas -->
            <div class="header">
                <div class="wave-bg"></div>
                <!-- Logo de Inpelka - Ruta absoluta -->
                <img src="http://inversionesinpelka.com/img/Logo_InvInp.png" alt="Inversiones Inpelka" class="logo" onerror="this.src=\'https://via.placeholder.com/150x80/d32f2f/ffffff?text=INPELKA\'">
            </div>

            <!-- Cuerpo del Mensaje con Tabla -->
            <div class="body-content">
                <p style="margin-bottom: 20px; font-size: 16px;">Hola, has recibido un nuevo mensaje de contacto:</p>
                
                <table class="data-table">
                    <tr>
                        <td class="label">Nombre:</td>
                        <td class="value">' . $nombre . '</td>
                    </tr>
                    <tr>
                        <td class="label">Correo:</td>
                        <td class="value"><a href="mailto:' . $correo . '" style="color:#4CAF50; text-decoration:none;">' . $correo . '</a></td>
                    </tr>
                    <tr>
                        <td class="label">Teléfono:</td>
                        <td class="value">' . $telefono . '</td>
                    </tr>
                    <tr>
                        <td class="label">Servicio:</td>
                        <td class="value">' . $servicio . '</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-top: 15px;">
                            <strong style="color:#333;">Mensaje:</strong>
                            <div class="message-box">' . $mensaje . '</div>
                        </td>
                    </tr>
                </table>
            </div>

            <!-- Footer Negro con Redes Sociales -->
            <div class="footer">
                <div class="social-icons">
                    <!-- Instagram - CON LINK ACTUALIZADO -->
                    <a href="https://www.instagram.com/inversiones_inpelka/" class="social-icon" title="Instagram" target="_blank">
                        <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/instagram.svg" alt="Instagram" style="filter: brightness(0) invert(1);" onerror="this.src=\'https://upload.wikimedia.org/wikipedia/commons/e/e7/Instagram_logo_2016.svg\'">
                    </a>
                    <!-- X (Twitter) -->
                    <a href="#" class="social-icon" title="X" target="_blank">
                        <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/x.svg" alt="X" style="filter: brightness(0) invert(1);" onerror="this.src=\'https://upload.wikimedia.org/wikipedia/commons/c/ce/X_logo_2023.svg\'">
                    </a>
                    <!-- Facebook -->
                    <a href="https://facebook.com/Inpelka" class="social-icon" title="Facebook" target="_blank">
                        <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/facebook.svg" alt="Facebook" style="filter: brightness(0) invert(1);" onerror="this.src=\'https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg\'">
                    </a>
                    <!-- YouTube -->
                    <a href="https://youtube.com/Inpelka" class="social-icon" title="YouTube" target="_blank">
                        <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/youtube.svg" alt="YouTube" style="filter: brightness(0) invert(1);" onerror="this.src=\'https://upload.wikimedia.org/wikipedia/commons/0/09/YouTube_full-color_icon_%282017%29.svg\'">
                    </a>
                    <!-- LinkedIn -->
                    <a href="https://linkedin.com/company/inpelka" class="social-icon" title="LinkedIn" target="_blank">
                        <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/linkedin.svg" alt="LinkedIn" style="filter: brightness(0) invert(1);" onerror="this.src=\'https://upload.wikimedia.org/wikipedia/commons/c/ca/LinkedIn_logo_initials.png\'">
                    </a>
                </div>
                <p class="copyright">© Inversiones Inpelka 2026 Todos los derechos reservados</p>
            </div>

        </div>
    </body>
    </html>
    ';

    // 4. Cabeceras para correo HTML
    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: Sitio Web Inpelka <infor@inversionesinpelka.com>\r\n";
    $headers .= "Reply-To: $correo\r\n";

    // 5. Envío
    if (mail($destinatario, $asunto, $cuerpo, $headers)) {
        echo json_encode(['success' => true, 'message' => '✅ Mensaje enviado exitosamente.']);
    } else {
        echo json_encode(['success' => false, 'message' => '❌ Error al enviar el correo.']);
    }
}
?>