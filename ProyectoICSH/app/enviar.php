<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewpot" content="width=device-width,Initial-escale=1,Maximun-scale=1">
     <script src="../plugins/js/sweetalert2.all.min.js"></script>
     <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Expanded&display=swap" rel="stylesheet" rel="stylesheet">
     <style type="text/css">
        body{
        font-family: 'Encode Sans Expanded', sans-serif;
        margin: 0 auto;
        }
    </style>
</head>
<body>
</body>
</html>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPmailer/Exception.php';
require 'PHPmailer/PHPMailer.php';
require 'PHPmailer/SMTP.php';


	// Instantiation and passing `true` enables exceptions
    try{
         function llenarCorreo($depto,$nomb,$tel,$fec,$desc) {

    
    $departamento = $depto;
    $nombre = $nomb;
    $telefono = $tel;
    $fecha = $fec;
    $descrip = $desc;

    /*echo $nCernet.$departamento,$nombre.$telefono.$fecha.$descrip;
    die();*/

    //instancia de la clase
    $mail = new PHPMailer(true);

    try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // vista de dato
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Metodo de envio
    $mail->SMTPAuth   = true;                                  // Enable SMTP authentication
    $mail->Username   = 'proyectoicsh@gmail.com';                // usuario al que se leenvia
    $mail->Password   = 'icsh2019';                               // contraseña del usuario
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption
    $mail->Port       = 587;                                    // Puerto que usaremos

    //Recipients
    $mail->setFrom('prueba@gmail.com',$nombre);     //Correo desde donde se enviara
    $mail->addAddress('proyectoicsh@gmail.com');     // Correo que lo recibira

    // Attachments
    //Envio de correo
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $nombre;
    $mail->Body    = "<br> <b>Nombre:</b> ".$nombre."<br><b>Departamento:</b> ".$departamento."<br><b>Fecha de envio:</b> ".$fecha."<br><b>Telefono:</b> ".$telefono."<br><br> <h3><b>Descripción:</b> ".$descrip."</h3>";
    //$mail->AltBody = 

    $mail->send();
    echo "<script type='text/javascript'>
        Swal.fire({
                type: 'success',
                title: '¡Bien hecho!',
                text: '¡Ticket enviado exitosamente!',   
                showConfirmButton: false,
                timer: 1500                       
                });
        </script>";

    } catch (Exception $e) {
        echo "<script type='text/javascript'>
                        Swal.fire({
                          type: 'error',
                          title: 'Oops...',
                          text: '¡Algo salió mal! Vuelve a intentarlo metodo de envio.',
                          showConfirmButton: false,
                        })
                    </script>";
    }
}
    }catch(Exception $e){
     echo "<script type='text/javascript'>
                        Swal.fire({
                          type: 'error',
                          title: 'Oops...',
                          text: '¡Algo salió mal! Vuelve a intentarlo metodo fuera de envio.',
                          showConfirmButton: false,
                        })
                    </script>";
    }


