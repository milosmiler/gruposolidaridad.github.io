<?php
require ('phpmailer/Exception.php');
require ('phpmailer/PHPMailer.php');
require ('phpmailer/SMTP.php');


    if (isset($_POST['action']) &&  $_POST['action'] == 'formulario-contacto') {
        enviarMailadmin();
        enviarMainUser();
    }

    function enviarMainUser(){
        $nombre = $_POST['nombre'];
        $soluciones = $_POST['soluciones'];
        $tamano = $_POST['tamano'];
        $puesto= $_POST['puesto'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $de= $nombre;
        $para= $email;
        $mail = new PHPMailer\PHPMailer\PHPMailer();

        // $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = "in-v3.mailjet.com"; // SMTP a utilizar. Por ej. smtp.elserver.com
        $mail->Username = "14aa0edee73b58372b54ca9574795a68"; // Correo completo a utilizar
        $mail->Password = "20d82c977a1fb01204394ee9e0ac30e0"; // Contraseña
        $mail->Port = 465; // Puerto a utilizar

        // $mail->IsSMTP();
        // $mail->SMTPAuth = true;
        // $mail->SMTPSecure = 'tls';
        // $mail->Host = "smtp.gmail.com"; // SMTP a utilizar. Por ej. smtp.elserver.com
        // $mail->Username = "osramsmtp@gmail.com"; // Correo completo a utilizar
        // $mail->Password = "RaKman2414"; // Contraseña
        // $mail->Port = 587; // Puerto a utilizar

        $mail->IsHTML(true);
        $mail->SetFrom($email);
        $mail->AddAddress($para);
        $mail->Subject = 'Nuevo Contacto' ;
        ob_start();
        include 'template/confirmacion.php';
        $html = ob_get_clean();
	    $mail->Body    = $html;
        if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo  json_encode("success");
        }
    }



      function enviarMailadmin(){

            $nombre = $_POST['nombre'];
            $soluciones = $_POST['soluciones'];
            $tamano = $_POST['tamano'];
            $puesto= $_POST['puesto'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $de= $nombre;
            $para='milosmiler23@gmail.com';
            $message = 'Nuevo contacto: Te escribio <br>'.$nombre.'<br> '.$soluciones.'<br> - '.$tamano.'<br>'.$puesto.'<br>'.$email.'<br>'.$telefono.'<br>';
            $mail = new PHPMailer\PHPMailer\PHPMailer();

            // $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Host = "in-v3.mailjet.com"; // SMTP a utilizar. Por ej. smtp.elserver.com
            $mail->Username = "14aa0edee73b58372b54ca9574795a68"; // Correo completo a utilizar
            $mail->Password = "20d82c977a1fb01204394ee9e0ac30e0"; // Contraseña
            $mail->Port = 465; // Puerto a utilizar

            // $mail->IsSMTP();
            // $mail->SMTPAuth = true;
            // $mail->SMTPSecure = 'tls';
            // $mail->Host = "smtp.gmail.com"; // SMTP a utilizar. Por ej. smtp.elserver.com
            // $mail->Username = "osramsmtp@gmail.com"; // Correo completo a utilizar
            // $mail->Password = "RaKman2414"; // Contraseña
            // $mail->Port = 587; // Puerto a utilizar

            $mail->IsHTML(true);
            $mail->SetFrom($email);
            $mail->AddAddress($para);
            $mail->Subject = 'Nuevo Contacto' ;
            $mail->Body = $message;

            if(!$mail->Send()) {
              echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
              echo  json_encode("success");
            }
      }
?>
