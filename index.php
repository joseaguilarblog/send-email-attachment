<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Enviar email con archivo adjunto</title>
</head>

<body>
<?php
function comprobar_email($email) {
    return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? 1 : 0;
}

if (isset($_POST['recibir'])) {
	if (comprobar_email($_POST['email'])) {
		require_once("classes/class.phpmailer.php");
		$mail = new PHPMailer();
		$mail->From = "blog@jose-aguilar.com";
		$mail->FromName = "Jose Aguilar";
		$mail->Subject = "Demo de PHPMailer";
		$mail->Body = "Hola, esto es una demo de envio de emails con archivos adjuntos!!!";
		$mail->IsHTML(true);
		$mail->AddAddress($_POST['email'], "User Name");
		$archivo = 'prueba.pdf';
		$mail->AddAttachment($archivo,$archivo);
		$mail->Send();
		echo '<p>Se ha enviado correctamente el email a '.$_POST['email'].'!</p>';
	}
	else {
		echo '<p>El email introducido no es correcto!</p>';
	}
}
?>
<form action="index.php" method="post">
<h3>Envíate un email con archivo adjunto</h3>
<table>
	<tr>
		<td>Email:</td>
		<td><input type="text" name="email"></td>
		<td><input type="submit" name="recibir" value="Recibir email"/></td>
	</tr>
</table>
</form>
</body>
</html>
