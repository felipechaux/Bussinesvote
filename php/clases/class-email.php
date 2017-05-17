<?php 

class Email{



function comprobar_email($email) {
    return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? 1 : 0;
}

function enviarMail($email,$documento,$pass){
$cuerpo='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<div style="margin-bottom:0; padding-bottom:0; min-width:100%; margin-top:0; margin-right:0; margin-left:0; padding-top:0; padding-right:0; padding-left:0; width:100%">

<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-spacing:0; border-collapse:collapse">
<tbody>
<tr>
<td class="x_outer" valign="top" style="word-break:break-word; min-width:600px; border-collapse:collapse; background-color:#c3c6cd">
<table width="640" align="center" id="x_boxing" border="0" cellpadding="0" cellspacing="0" class="x_m_boxing" style="border-spacing:0; border-collapse:collapse">
<tbody>
<tr>
<td class="x_mktoContainer x_boxedbackground" id="x_template-wrapper" style="word-break:break-word; border-collapse:collapse">
<table id="x_hero" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="x_mktoModule x_m_hero" style="border-spacing:0; border-collapse:collapse; color:#fff">
<tbody>
<tr>

</tr>
</tbody>
</table>
<table id="x_free-texta5b384dd-8c46-4913-8b65-f54d4f6ac07a" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="x_mktoModule x_m_free-text" style="border-spacing:0; border-collapse:collapse">
<tbody>
<tr>
<td bgcolor="#ffffff" valign="top" style="word-break:break-word; border-collapse:collapse; background-color:#ffffff">
<center>
<table id="x_photo-l" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="x_mktoModule x_m_photo-l" style="border-spacing:0; border-collapse:collapse">
<tbody>
<tr>
<td bgcolor="#0F71C4" valign="top" style="word-break:break-word; border-collapse:collapse; background-color:#0F71C4">
<table class="x_table600" align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-spacing:0; border-collapse:collapse; margin-top:0; margin-right:auto; margin-bottom:0; margin-left:auto">
<tbody>
<tr>
<td height="40px" style="word-break:break-word; border-collapse:collapse; line-height:40px; font-size:40px">&nbsp;
</td>
</tr>
<tr>
<td style="word-break:break-word; border-collapse:collapse">
<center>
<table class="x_table1-3" align="left" border="0" cellpadding="0" cellspacing="0" width="173" style="border-spacing:0; border-collapse:collapse">
<tbody>
<tr>
<td class="x_photo" style="word-break:break-word; border-collapse:collapse">
<div class="x_mktoImg x_mobile-img" id="x_photo1" style="display:inline-block"><img src="http://na-ab20.marketo.com/rs/256-IFR-038/images/destacado-02.jpg" alt="destacado-02.jpg" class="x_mobile-img" height="auto" width="173" style="outline:none; border-right-width:0; border-bottom-width:0; border-left-width:0; text-decoration:none; border-top-width:0; display:block; max-width:100%; line-height:100%; height:auto; width:173px"> </div>
</td>
</tr>
<tr class="x_stack-tablet" style="padding-left:0; overflow:hidden; margin-left:0; padding-top:0; padding-right:0; padding-bottom:0; float:left; margin-top:0; margin-right:0; margin-bottom:0; display:none">
<td style="word-break:break-word; border-collapse:collapse">&nbsp;</td>
</tr>
</tbody>
</table>
<table class="x_table2-3" align="right" border="0" cellpadding="0" cellspacing="0" width="350" style="border-spacing:0; border-collapse:collapse">
<tbody>
<tr>
<td style="word-break:break-word; border-collapse:collapse">
<table class="x_contents" align="center" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0; border-collapse:collapse">
<tbody>
<tr>
<td class="x_article" style="word-break:break-word; border-collapse:collapse">
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-spacing:0; border-collapse:collapse">
<tbody>
<tr>
<td class="x_primary-font x_title" style="word-break:break-word; font-family:"Roboto",Arial,sans-serif; font-weight:bold; text-align:left; font-size:19px; border-collapse:collapse">
<div class="x_mktoText" id="x_articleTitle">
<div><span style="color:#ffffff">BUSINESS VOTE</span> </div>
<div><br>
</div>
</div>
</td>
</tr>
<tr>
<td height="15px" style="word-break:break-word; border-collapse:collapse; line-height:15px; font-size:15px">&nbsp;
</td>
</tr>
<tr>
<td class="x_secondary-font x_text" style="word-break:break-word; color:#868686; font-size:13px; font-weight:300; line-height:220%; text-align:left; font-family:"Roboto Condensed",Arial,sans-serif; border-collapse:collapse">
<div class="x_mktoText" id="x_text7">
<table width="342" height="131">
<tbody>
<tr>
<td>
<div><span style="color:#ffffff">Es un sistema de voto electrónico para la elección de representantes, directivos, delegados, entre otros. Orientado principalmente a empresas u organizaciones, cuyo objetivo es responder de manera efectiva, a las fuertes exigencias y expectativas que se tienen de una elección democrática.</span> </div>
</td>
</tr>
</tbody>
</table>
</div>
</td>
</tr>
<tr>
<td height="15px" style="word-break:break-word; border-collapse:collapse; line-height:15px; font-size:15px">&nbsp;
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</center>
</td>
</tr>
<tr>
<td height="40px" style="word-break:break-word; border-collapse:collapse; line-height:40px; font-size:40px">&nbsp;
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table class="x_table600" align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-spacing:0; border-collapse:collapse; margin-top:0; margin-right:auto; margin-bottom:0; margin-left:auto">
<tbody>
<tr>
<td height="15px" style="word-break:break-word; border-collapse:collapse; line-height:15px; font-size:15px">&nbsp;
</td>
</tr>
<tr>
<td class="x_primary-font x_title" style="word-break:break-word; font-family:"Roboto",Arial,sans-serif; font-weight:bold; text-align:center; font-size:16px; color:#000; border-collapse:collapse">
<div class="x_mktoText" id="x_title6a5b384dd-8c46-4913-8b65-f54d4f6ac07a">
<p>ESTIMADO USUARIO<br>
</p>
</div>
</td>
</tr>
<tr>
<td height="15px" style="word-break:break-word; border-collapse:collapse; line-height:15px; font-size:15px">&nbsp;
</td>
</tr>
<tr>
<td class="x_primary-font x_text" style="word-break:break-word;font-family:"Roboto",Arial,sans-serif;font-size:14px;color:#333;font-weight:300;line-height:190%;border-collapse:collapse;">
<div class="x_mktoText" id="x_text10a5b384dd-8c46-4913-8b65-f54d4f6ac07a">
<div><span style="font-family: roboto, helvetica, sans-serif, serif, EmojiFont;color: rgb(45, 45, 45);text-align: justify;">Tu registro en el sistema de Voto Electrónico<strong> Business Vote</strong> fue exitoso, hemos generado el siguiente usuario y contraseña :
 <br>
 <br>

    <strong>Usuario:</strong> '; $cuerpo.=$documento.'<br>
    <strong>Contraseña:</strong> '; $cuerpo.=$pass.'<br>';
    $cuerpo.='
 </span> </div>
<div> </div>

</div>
</td>
</tr>
<tr>
<td height="25px" style="word-break:break-word; border-collapse:collapse; line-height:25px; font-size:25px">&nbsp;
</td>
</tr>
</tbody>
</table>
</center>
</td>
</tr>
</tbody>
</table>
<table id="x_half" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="x_m_half x_mktoModule" style="border-spacing:0; border-collapse:collapse">
<tbody>
<tr>
<td bgcolor="#ffffff" valign="top" style="word-break:break-word; border-collapse:collapse; background-color:#ffffff">
</td>
</tr>
</tbody>
</table>
<table id="x_half2" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="x_m_half x_mktoModule" style="border-spacing:0; border-collapse:collapse">
<tbody>
<tr>
<td bgcolor="#ffffff" valign="top" style="word-break:break-word; border-collapse:collapse; background-color:#ffffff">
<center>

</center>
</td>
</tr>
</tbody>
</table>



<table id="x_free-image51a994ae-a230-42e3-a497-a8814cd983c9" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="x_mktoModule x_m_free-image" style="border-spacing:0; border-collapse:collapse">
<tbody>
<tr>
<td bgcolor="#ffffff" valign="top" style="word-break:break-word; border-collapse:collapse; background-color:#ffffff">
<center>
<table class="x_table600" align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-spacing:0; border-collapse:collapse; margin-top:0; margin-right:auto; margin-bottom:0; margin-left:auto">
<tbody>
<tr>
<td height="20px" style="word-break:break-word; border-collapse:collapse; line-height:20px; font-size:20px">&nbsp;
</td>
</tr>
<tr>
<td style="word-break:break-word; border-collapse:collapse">
<center>
<div class="x_mktoImg" id="x_photo51a994ae-a230-42e3-a497-a8814cd983c9" style="display:inline-block">
<img src="http://na-ab20.marketo.com/rs/256-IFR-038/images/Footer_virtual.jpg" alt="Footer_pregradov2.jpg" width="600" style="outline:none; border-right-width:0; border-bottom-width:0; border-left-width:0; text-decoration:none; border-top-width:0; width:auto; height:auto; max-width:100%; display:block; line-height:100%"> </div>
</center>
</td>
</tr>
<tr>
<td height="20px" style="word-break:break-word; border-collapse:collapse; line-height:20px; font-size:20px">&nbsp;
</td>
</tr>
</tbody>
</table>
</center>
</td>
</tr>
</tbody>
</table>

</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<a href="http://poli.poli.edu.co/iSSD0JZ1xYb00c000NM3V0f" target="_blank" rel="noopener noreferrer"></a><img src="http://poli.poli.edu.co/trk?t=1&amp;mid=NzYzLURaVi05MTM6MDozNzk2OjE1MzA0OjE6MjcyODo5OjEzOTc0OjM3NjI1MDMtMTpudWxs" width="1" height="1" alt="" style="display:none!important"> </div>
</body>
</html>
 ';
	$obj = new Email();
 if ($obj->comprobar_email($email)) {
        require_once("phpmailer.php");
        $mail = new PHPMailer();
        $mail->From = "tecnologia@bussinesvote.com";
        $mail->FromName = "@Bussinesvote";
        $mail->IsHTML(true);
        $mail->Subject = "Credenciales - App bussinesvote ";
        $mail->Body = $cuerpo;
        $mail->AddAddress($email, "User Name");
        $mail->Send();
        //echo '<p>Se ha enviado correctamente el email a '.$email.'!</p>';
    }
    else {
        echo '<p>El email introducido no es correcto!</p>';
    }

}

   



}




?>