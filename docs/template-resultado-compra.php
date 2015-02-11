<?php
/*
Template Name: Resultado Compra
*/
get_header();

/* This code retrieves all our admin options. */
global $options;
foreach ($options as $value) {
	if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}


if(isset($_GET['cod'])){
	$_SESSION['codigo'] = $_GET['cod'];
}

if($_GET['mp'] == "ok") :

	?>
		<div style="min-height:200px;"> 
		<div style="position: absolute; left:45%; top:25%"> 
				<img src="http://s9.postimg.org/eikge0gu3/spinner_128_anti_alias.gif" /> 
		</div>
		</div>
						
	<?php


	if($_POST['compra_turno_submit'] == true){
		$_SESSION['compra_turno_submit'] = $_POST['compra_turno_submit'];
		$_SESSION['compra_turno_nombre'] = $_POST['compra_turno_nombre'];
		$_SESSION['compra_turno_apellido'] = $_POST['compra_turno_apellido'];
		$_SESSION['compra_turno_email'] = $_POST['compra_turno_email'];
		$_SESSION['compra_turno_telefono'] = $_POST['compra_turno_telefono'];
		$_SESSION['diagnostico_date_1'] = $_POST['diagnostico_date_1'];
		$_SESSION['diagnostico_horario_1'] = $_POST['diagnostico_horario_1'];
		$_SESSION['diagnostico_date_2'] = $_POST['diagnostico_date_2'];
		$_SESSION['diagnostico_horario_2'] = $_POST['diagnostico_horario_2'];
		$_SESSION['diagnostico_comentario'] = $_POST['diagnostico_comentario'];
		$_SESSION['compra_turno_otra_opcion'] = $_POST['compra_turno_otra_opcion'];
	}
	if($_POST['compra_regalar_submit'] == true){
		$_SESSION['compra_regalar_submit'] = $_POST['compra_regalar_submit'];
		$_SESSION['compra_regalar_nombre'] = $_POST['compra_regalar_nombre'];
		$_SESSION['compra_regalar_apellido'] = $_POST['compra_regalar_apellido'];
		$_SESSION['compra_regalar_email'] = $_POST['compra_regalar_email'];
		$_SESSION['compra_regalar_telefono'] = $_POST['compra_regalar_telefono'];
		$_SESSION['compra_regalar_nombre_amiga'] = $_POST['compra_regalar_nombre_amiga'];
		$_SESSION['compra_regalar_apellido_amiga'] = $_POST['compra_regalar_apellido_amiga'];
		$_SESSION['compra_regalar_mensaje_amiga'] = $_POST['compra_regalar_mensaje_amiga'];
	}
?>		
	<!-- <a id="mp-button" href="https://www.mercadopago.com/checkout/pay?pref_id=<?php echo $_SESSION['codigo'] ?>" name="MP-payButton"></a>
	
	 -->
	
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="<?php echo $_SESSION['codigo'] ?>">
<input style="visibility:hidden;" id="mp-button" type="image" src="" border="0" name="submit" alt="">
</form>
<script type="text/javascript" src="http://mp-tools.mlstatic.com/buttons/render.js"></script>
<script> document.getElementById('mp-button').click(); </script>
	

	

<?php endif; ?>




	<div id="template-resultado-compra">

		<?php
		if($_SESSION['compra_turno_submit'] == true && isset($_GET['t'])) {
			$tt = @$_GET[t];
			switch ($tt) {
				case 1:
				$mercado_pago = "Mini Day Spa";
				break;
				case 2:
				$mercado_pago = "Día de Spa 2";
				break;
				case 3:
				$mercado_pago = "Día de Spa 3";
				break;
				case 4:
				$mercado_pago = "Día de Spa Premium";
				break;
				case 5:
				$mercado_pago = "Men Care";
				break;
				case 6:
				$mercado_pago = "Implante de pestañas";
				break;
				case 7:
				$mercado_pago = "Diseño y alisado de cejas";
				break;
				case 8:
				$mercado_pago = "Spa de manos y pies";
				break;
				case 9:
				$mercado_pago = "Masajes con piedras calientes";
				break;
				case 10:
				$mercado_pago = "Autobronceante St Tropez";
				break;
				case 11:
				$mercado_pago = "Ducha Solar";
				break;
				case 12:
				$mercado_pago = "Drenaje linfático";
				break;
				case 13:
				$mercado_pago = "Cama de ozonoterapia";
				break;
				case 14:
				$mercado_pago = "Pulido facial y corporal";
				break;
				case 15:
				$mercado_pago = "Reiki";
				break;
				case 16:
				$mercado_pago = "Reflexología";
				break;
				case 17:
				$mercado_pago = "So Delicate | Rosácea";
				break;
				case 18:
				$mercado_pago = "Masajes descontracturantes y de relajación";
				break;
				case 19:
				$mercado_pago = "Lifting sin cirugía";
				break;
				case 20:
				$mercado_pago = "Hidrodermoabrasión";
				break;
				case 21:
				$mercado_pago = "Microdermoabrasión con puntas de diamante";
				break;
				case 22:
				$mercado_pago = "Limpieza de cutis profunda";
				break;
				case 23:
				$mercado_pago = "Diagnóstico de piel cosmiatria";
				break;
				case 24:
				$mercado_pago = "Dermopigmentación";
				break;
				case 25:
				$mercado_pago = "Curso de Maquillaje Profesional (Matrícula)";
				break;
				case 26:
				$mercado_pago = "Clases de AutoMaquillaje (sección Make Up)";
				break;
				case 27:
				$mercado_pago = "Depilación: Axilas y cavado profundo";
				break;
				case 28:
				$mercado_pago = "Clases de AutoMaquillaje (sección Promociones)";
				break;
				case 29:
				$mercado_pago = "Presoterapia: 10 sesiones";
				break;
				case 30:
				$mercado_pago = "Ducha solar: 10 sesiones + 3 sin cargo";
				break;
				case 31:
				$mercado_pago = "Masajes + Reflexología + Reiki";
				break;
				case 32:
				$mercado_pago = "Timexpert White";
				break;
				case 33:
				$mercado_pago = "Activador del Bronceado | SPF 2";
				break;
				case 34:
				$mercado_pago = "Golden Caresse | SPF 50";
				break;
				case 35:
				$mercado_pago = "Pure T Skin Hidra Mat";
				break;
				case 36:
				$mercado_pago = "Timexpert SRNS";
				break;
				case 37:
				$mercado_pago = "Limpieza de cutis + Reflexologia";
				break;
				case 38:
				$mercado_pago = "Manicuria";
				break;
				case 39:
				$mercado_pago = "Pedicuria";
				break;
				case 40:
				$mercado_pago = "5 sesiones de Corpo02";
				break;
				case 41:
				$mercado_pago = "St Tropez + 3 duchas solares";
				break;
				case 42:
				$mercado_pago = "Una sesión facial/corporal en La Réserve por el Día del Amigo";
				break;
				case 43:
				$mercado_pago = "Brunch para 2 personas";
				break;
				case 44:
				$mercado_pago = "Brunch para 4 personas";
				break;
				case 45:
				$mercado_pago = "Tratamiento hidratante GOTA";
				break;
				case 46:
				$mercado_pago = "";
				break;
				case 47:
				$mercado_pago = "";
				break;
				case 48:
				$mercado_pago = "";
				break;
				case 49:
				$mercado_pago = "5 sesiones de Mesoterapia y 5 de Presoterapia";
				break;
				case 50:
				$mercado_pago = "3 sesiones de BodyTer y 3 de Drenaje Linfatico";
				break;
				case 51:
				$mercado_pago = "3 sesiones de Ultracavitacion y 3 de Presoterapia";
				break;
				case 52:
				$mercado_pago = "10 sesiones de BodyTer";
				break;
				case 53:
				$mercado_pago = "Radiofrecuencia DermaDeep";
				break;
				case 54:
				$mercado_pago = "Tratamiento láser";
				break;
				case 55:
				$mercado_pago = "Ultracavitacion";
				break;
				case 56:
				$mercado_pago = "Mesoterapia corporal y capilar";
				break;
				case 57:
				$mercado_pago = "Mesolifting";
				break;
				case 58:
				$mercado_pago = "Bodyter Premium 1 sesion";
				break;
				case 59:
				$mercado_pago = "Bodyter 1 sesion";
				break;
				case 60:
				$mercado_pago = "Corpo 1 sesion";
				break;
				case 61:
				$mercado_pago = "Masajes de relajación + Spa de manos";
				break;
				case 62:
				$mercado_pago = "Día de Spa para parejas";
				break;
				case 63:
				$mercado_pago = "Día de la madre";
				break;
				case 64:
				$mercado_pago = "3 Sesiones de Masajes Descontracturantes";
				break;
				case 65:
				$mercado_pago = "Masajes + Spa de Manos + Esmalte OPI";
				break;
				case 66:
				$mercado_pago = "Día de Spa Germaine de Capuccini";
				break;
				case 67:
				$mercado_pago = "Masajes Relajantes";
				break;
				case 68:
				$mercado_pago = "Día del Padre – Relax";
				break;
				case 69:
				$mercado_pago = "Día del Padre – Issey Miyake";
				break;
				case 70:
				$mercado_pago = "Día de Spa para embarazadas";
				break;
				case 71:
				$mercado_pago = "Tratamiento post embarazo";
				break;
				case 72:
				$mercado_pago = "Tratamiento Facial + Vitanoin C";
				break;
				case 73:
				$mercado_pago = "Día de Spa para Amigas";
				break;
				case 74:
				$mercado_pago = "5 sesiones de masajes";
				break;
				case 75:
				$mercado_pago = "10 sesiones de masajes";
				break;
				case 76:
				$mercado_pago = "Dia de Spa Madre e Hija";
				break;
			}

			/// INSERTA TABLA
			$con = mysql_connect("localhost","uv5919","7k1wHz39H8");
			mysql_select_db("spa1", $con);

			$sql = "INSERT INTO compra(tipo, nombre, apellido, email, telefono, dia1, horario1, dia2, horario2, fecha)
			VALUES ('Turno: ". $mercado_pago ."', '$_SESSION[compra_turno_nombre]', '$_SESSION[compra_turno_apellido]', '$_SESSION[compra_turno_email]', '$_SESSION[compra_turno_telefono]', '$_SESSION[diagnostico_date_1]', '$_SESSION[diagnostico_horario_2]', '$_SESSION[diagnostico_date_2]', '$_SESSION[diagnostico_horario_2]', NOW())";
			mysql_query($sql);

			////

			$to = $opt_email;
			$subject = 'Compra - La Réserve';
			if(isset($_SESSION["compra_turno_otra_opcion"]) ) {
				$test = '<tr>
					<td width="30%" style="background: #fafafa; padding:8px; border-bottom:1px solid #fafafa;">Fecha y Horario (alternativo)</td>
					<td width="70%" style="padding:8px; border-bottom:1px solid #fafafa;">'.$_SESSION["diagnostico_date_2"].' | '.$_SESSION["diagnostico_horario_2"].'</td>
				</tr>';
			};
			$cuerpo = '
			<html>
			<head>
			  <title>Compra</title>
			</head>
			<body>
			<table width="100%" style="margin-bottom: 20px;" cellpadding="0" cellspacing="0">
				<tbody>
					<tr>
						<td width="30%" style="background: #fafafa; padding:8px; border-bottom:1px solid #fafafa;">Nombre y Apellido:</td>
						<td width="70%" style="padding:8px; border-bottom:1px solid #fafafa;">'.$_SESSION["compra_turno_nombre"].' '.$_SESSION["compra_turno_apellido"].'</td>
					</tr>
					<tr>
						<td width="30%" style="background: #fafafa; padding:8px; border-bottom:1px solid #fafafa;">Email:</td>
						<td width="70%" style="padding:8px; border-bottom:1px solid #fafafa;">'.$_SESSION["compra_turno_email"].'</td>
					</tr>
					<tr>
						<td width="30%" style="background: #fafafa; padding:8px; border-bottom:1px solid #fafafa;">Tel&eacute;fono:</td>
						<td width="70%" style="padding:8px; border-bottom:1px solid #fafafa;">'.$_SESSION["compra_turno_telefono"].'</td>
					</tr>
					<tr>
						<td width="30%" style="background: #fafafa; padding:8px; border-bottom:1px solid #fafafa;">Compra:</td>
						<td width="70%" style="padding:8px; border-bottom:1px solid #fafafa;">'.$mercado_pago.'</td>
					</tr>
					<tr>
						<td width="30%" style="background: #fafafa; padding:8px; border-bottom:1px solid #fafafa;">Fecha y Horario</td>
						<td width="70%" style="padding:8px; border-bottom:1px solid #fafafa;">'.$_SESSION["diagnostico_date_1"].' | '.$_SESSION["diagnostico_horario_1"].'</td>
					</tr>
					'.
						$test
					.'
				</tbody>
			</table>
			</body>
			</html>
			';
			$header  = 'MIME-Version: 2.0' . "\r\n";
			$header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$header .= 'From: '.$_SESSION["compra_turno_nombre"].' '.$_SESSION["compra_turno_apellido"].' <'.$_SESSION["compra_turno_email"].'>';

			if(@mail($to, $subject, $cuerpo, $header))
			{


				///

				$to_client = $_SESSION[compra_turno_email];
				$subject = 'Gracias por escribirnos';


				$cuerpo = '<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
			  <tr>
				<td height="144"><a href="http://www.lareserve.com.uy" target="_blank"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/turno/images/header.jpg" alt="La Réserve " width="600" height="144" border="0" style="border:0; display:block;"></a></td>
			  </tr>
			  <tr>
				<td><table width="600" border="0" cellpadding="0" cellspacing="0">
				  <tr>
					<td width="124" height="26" bgcolor="#F2F2F2"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/turno/images/izq1.jpg" width="108" height="26" border="0"  style="border:0; display:block;"></td>
					<td width="402" bgcolor="#F2F2F2" style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#5B5D5C;">'.$_SESSION["compra_turno_nombre"].'</td>
					<td width="74"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/turno/images/der1.jpg" width="74" height="26" border="0"  style="border:0; display:block;"></td>
				  </tr>
				</table></td>
			  </tr>
			  <tr>
				<td><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/turno/images/hr.jpg" width="600" height="15" border="0" style="border:0; display:block;"></td>
			  </tr>
			  <tr>
				<td><table width="600" border="0" cellpadding="0" cellspacing="0">
				  <tr>
					<td width="122" height="26" bgcolor="#F2F2F2"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/turno/images/izq2.jpg" width="108" height="101" border="0" style="border:0; display:block;"></td>
					<td width="375" bgcolor="#F2F2F2"><table width="375" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#5B5D5C;">Ya recibimos los detalles del turno que solicitaste y ser&aacute; confirmado cuando recibas una respuesta de nuestra recepci&oacute;n via email o por tel&eacute;fono.</td>
					  </tr>
					  </table></td>
					<td width="103"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/turno/images/der2.jpg" width="103" height="101" border="0" style="border:0; display:block;"></td>
				  </tr>
				</table></td>
			  </tr>
			  <tr>
				<td><table width="600" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="242"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/turno/images/izq3.jpg" width="242" height="33" style="border:0; display:block;"></td>
					<td width="215" align="right" bgcolor="#F2F2F2" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#5A5A5A;">&nbsp;</td>
					<td width="143"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/turno/images/der3.jpg" width="146" height="33" style="border:0; display:block;"></td>
				  </tr>
				</table></td>
			  </tr>
			  <tr>
				<td><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/turno/images/fin-sobre.jpg" width="600" height="149" border="0" style="border:0; display:block;"></td>
			  </tr>
			  <tr>
				<td height="10" bgcolor="#E5E3E4"></td>
			  </tr>
			  <tr>
				<td bgcolor="#E5E3E4"><table width="600" border="0" cellspacing="0" cellpadding="0">
				  <tr valign="bottom">
					<td colspan="3"></td>
				  </tr>
				  <tr valign="bottom">
					<td width="56" height="10"></td>
					<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:15px; color:#595e5d; font-weight:bold">CONTACTO:</td>
					<td width="58"></td>
				  </tr>
				</table></td>
			  </tr>
			  <tr>
				<td height="10" bgcolor="#E5E3E4"></td>
			  </tr>
			  <tr>
				<td bgcolor="#E5E3E4"><table width="600" border="0" cellspacing="0" cellpadding="0">
				  <tr valign="bottom">
					<td colspan="5"></td>
				  </tr>
				  <tr valign="bottom">
					<td width="56" height="10"></td>
					<td width="174" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#5B5D5C;"><strong>Email:</strong> <a href="mailto: recepcion@lareserve.com.uy" style="text-decoration:none;color:#5B5D5C;">recepcion@lareserve.com.uy</a></td>
					<td width="152" align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#5B5D5C;"><strong>Tel: </strong>4784.3333</td>
					<td width="160" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#5B5D5C;"><strong>Web:</strong> <a href="http://www.lareserve.com.uy" target="_blank" style="text-decoration:none;color:#5B5D5C;"> www.lareserve.com.uy</a><br /></td>
					<td width="58"></td>
				  </tr>
				</table></td>
			  </tr>
			  <tr>
				<td height="10" bgcolor="#E5E3E4"></td>
			  </tr>
			  <tr>
				<td><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/turno/images/footer-top.jpg" width="600" height="14" border="0" style="border:0; display:block;"></td>
			  </tr>
			  <tr>
				<td align="right" bgcolor="#D9D7D8"><table width="542" border="0" cellspacing="0" cellpadding="0">
				  <tr bgcolor="#DBD9DA">
					<td width="425" height="38" bgcolor="#D9D7D8" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#5B5D5C;">Sumate a nuestra Fan Page en Facebook, seguinos en Twitter y conoc&eacute; nuestras propuestas, novedades y promociones</td>
					<td width="33"><a href="http://www.facebook.com/spabelgrano" target="_blank"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/turno/images/fbk.jpg" alt="facebook" width="33" height="32" border="0"  style="display:block"/></a></td>
        			<td width="87"><a href="https://twitter.com/spabelgrano" target="_blank"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/turno/images/twitter.jpg" alt="twitter" width="87" height="32" border="0"  style="display:block"/></a></td>
				  </tr>
				</table></td>
			  </tr>
			  <tr>
				<td height="10" bgcolor="#D9D7D8"></td>
			  </tr>
			</table>';

				$header  = 'MIME-Version: 2.0' . "\r\n";
				$header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
				//$header .= 'From: La Réserve <recepcion@lareserve.com.uy>';
				$header .= 'From: '.$_SESSION["compra_turno_nombre"].' '.$_SESSION["compra_turno_apellido"].' <'.$_SESSION["compra_turno_email"].'>';

				/// ENVIO MAIL CLIENTE

				@mail($to_client, $subject, $cuerpo, $header);

				$form_result_turno = 'ok';

				}
				else
				{
				$form_result_turno = 'error';
				}
			}
		?>

		<?php


		if($_SESSION['compra_regalar_submit'] == true && isset($_GET['t'])) {
			$tt = @$_GET[t];
			switch ($tt) {
				case 1:
				$mercado_pago = "Mini Day Spa";
				break;
				case 2:
				$mercado_pago = "Día de Spa 2";
				break;
				case 3:
				$mercado_pago = "Día de Spa 3";
				break;
				case 4:
				$mercado_pago = "Día de Spa Premium";
				break;
				case 5:
				$mercado_pago = "Men Care";
				break;
				case 6:
				$mercado_pago = "Implante de pestañas";
				break;
				case 7:
				$mercado_pago = "Diseño y alisado de cejas";
				break;
				case 8:
				$mercado_pago = "Spa de manos y pies";
				break;
				case 9:
				$mercado_pago = "Masajes con piedras calientes";
				break;
				case 10:
				$mercado_pago = "Autobronceante St Tropez";
				break;
				case 11:
				$mercado_pago = "Ducha Solar";
				break;
				case 12:
				$mercado_pago = "Drenaje linfático";
				break;
				case 13:
				$mercado_pago = "Cama de ozonoterapia";
				break;
				case 14:
				$mercado_pago = "Pulido facial y corporal";
				break;
				case 15:
				$mercado_pago = "Reiki";
				break;
				case 16:
				$mercado_pago = "Reflexología";
				break;
				case 17:
				$mercado_pago = "So Delicate | Rosácea";
				break;
				case 18:
				$mercado_pago = "Masajes descontracturantes y de relajación";
				break;
				case 19:
				$mercado_pago = "Lifting sin cirugía";
				break;
				case 20:
				$mercado_pago = "Hidrodermoabrasión";
				break;
				case 21:
				$mercado_pago = "Microdermoabrasión con puntas de diamante";
				break;
				case 22:
				$mercado_pago = "Limpieza de cutis profunda";
				break;
				case 23:
				$mercado_pago = "Diagnóstico de piel cosmiatria";
				break;
				case 24:
				$mercado_pago = "Dermopigmentación";
				break;
				case 25:
				$mercado_pago = "Curso de Maquillaje Profesional (Matrícula)";
				break;
				case 26:
				$mercado_pago = "Clases de AutoMaquillaje (sección Make Up)";
				break;
				case 27:
				$mercado_pago = "Depilación: Axilas y cavado profundo";
				break;
				case 28:
				$mercado_pago = "Clases de AutoMaquillaje (sección Promociones)";
				break;
				case 29:
				$mercado_pago = "Presoterapia: 10 sesiones";
				break;
				case 30:
				$mercado_pago = "Ducha solar: 10 sesiones + 3 sin cargo";
				break;
				case 31:
				$mercado_pago = "Masajes + Reflexología + Reiki";
				break;
				case 32:
				$mercado_pago = "Timexpert White";
				break;
				case 33:
				$mercado_pago = "Activador del Bronceado | SPF 2";
				break;
				case 34:
				$mercado_pago = "Golden Caresse | SPF 50";
				break;
				case 35:
				$mercado_pago = "Pure T Skin Hidra Mat";
				break;
				case 36:
				$mercado_pago = "Timexpert SRNS";
				break;
				case 37:
				$mercado_pago = "Limpieza de cutis + Reflexologia";
				break;
				case 38:
				$mercado_pago = "Manicuria";
				break;
				case 39:
				$mercado_pago = "Pedicuria";
				break;
				case 40:
				$mercado_pago = "5 sesiones de Corpo02";
				break;
				case 41:
				$mercado_pago = "St Tropez + 3 duchas solares";
				break;
				case 42:
				$mercado_pago = "Una sesión facial/corporal en La Réserve por el Día del Amigo";
				break;
				case 43:
				$mercado_pago = "Brunch para 2 personas";
				break;
				case 44:
				$mercado_pago = "Brunch para 4 personas";
				break;
				case 45:
				$mercado_pago = "Tratamiento hidratante GOTA";
				break;
				case 46:
				$mercado_pago = "";
				break;
				case 47:
				$mercado_pago = "";
				break;
				case 48:
				$mercado_pago = "";
				break;
				case 49:
				$mercado_pago = "5 sesiones de Mesoterapia y 5 de Presoterapia";
				break;
				case 50:
				$mercado_pago = "3 sesiones de BodyTer y 3 de Drenaje Linfatico";
				break;
				case 51:
				$mercado_pago = "3 sesiones de Ultracavitacion y 3 de Presoterapia";
				break;
				case 52:
				$mercado_pago = "10 sesiones de BodyTer";
				break;
				case 53:
				$mercado_pago = "Radiofrecuencia DermaDeep";
				break;
				case 54:
				$mercado_pago = "Tratamiento láser";
				break;
				case 55:
				$mercado_pago = "Ultracavitacion";
				break;
				case 56:
				$mercado_pago = "Mesoterapia corporal y capilar";
				break;
				case 57:
				$mercado_pago = "Mesolifting";
				break;
				case 58:
				$mercado_pago = "Bodyter Premium 1 sesion";
				break;
				case 59:
				$mercado_pago = "Bodyter 1 sesion";
				break;
				case 60:
				$mercado_pago = "Corpo 1 sesion";
				break;
				case 61:
				$mercado_pago = "Masajes de relajación + Spa de manos";
				break;
				case 62:
				$mercado_pago = "Día de Spa para parejas";
				break;
				case 63:
				$mercado_pago = "Día de la madre";
				break;
				case 64:
				$mercado_pago = "3 Sesiones de Masajes Descontracturantes";
				break;
				case 65:
				$mercado_pago = "Masajes + Spa de Manos + Esmalte OPI";
				break;
				case 66:
				$mercado_pago = "Día de Spa Germaine de Capuccini";
				break;
				case 67:
				$mercado_pago = "Masajes Relajantes";
				break;
				case 68:
				$mercado_pago = "Día del Padre – Relax";
				break;
				case 69:
				$mercado_pago = "Día del Padre – Issey Miyake";
				break;
				case 70:
				$mercado_pago = "Día de Spa para embarazadas";
				break;
				case 71:
				$mercado_pago = "Tratamiento post embarazo";
				break;
				case 72:
				$mercado_pago = "Tratamiento Facial + Vitanoin C";
				break;
				case 73:
				$mercado_pago = "Día de Spa para Amigas";
				break;
				case 74:
				$mercado_pago = "5 sesiones de masajes";
				break;
				case 75:
				$mercado_pago = "10 sesiones de masajes";
				break;
				case 76:
				$mercado_pago = "Dia de Spa Madre e Hija";
				break;
			}


			/// INSERTA TABLA
			$con = mysql_connect("localhost","uv5919","7k1wHz39H8");
			mysql_select_db("spa1", $con);

			$sql = "INSERT INTO compra(tipo, nombre, apellido, email, telefono, nombre_amiga, apellido_amiga, mensaje, fecha)
			VALUES ('Turno: ". $mercado_pago ."', '$_SESSION[compra_regalar_nombre]', '$_SESSION[compra_regalar_apellido]', '$_SESSION[compra_regalar_email]', '$_SESSION[compra_regalar_telefono]', '$_SESSION[compra_regalar_nombre_amiga]', '$_SESSION[compra_regalar_apellido_amiga]', '$_SESSION[compra_regalar_mensaje_amiga]' , NOW())";
			mysql_query($sql);
			////

			$to = $opt_email;
			$subject = 'Compra - La Réserve';
			$cuerpo = '<html>
			<head>
			  <title>Compra</title>
			</head>
			<body>
			<table width="100%" style="margin-bottom: 20px;" cellpadding="0" cellspacing="0">
				<tbody>
					<tr>
						<td width="30%" style="background: #fafafa; padding:8px; border-bottom:1px solid #fafafa;">Nombre y Apellido:</td>
						<td width="70%" style="padding:8px; border-bottom:1px solid #fafafa;">'.$_SESSION["compra_regalar_nombre"].' '.$_SESSION["compra_regalar_apellido"].'</td>
					</tr>
					<tr>
						<td width="30%" style="background: #fafafa; padding:8px; border-bottom:1px solid #fafafa;">Email:</td>
						<td width="70%" style="padding:8px; border-bottom:1px solid #fafafa;">'.$_SESSION["compra_regalar_email"].'</td>
					</tr>
					<tr>
						<td width="30%" style="background: #fafafa; padding:8px; border-bottom:1px solid #fafafa;">Tel&eacute;fono:</td>
						<td width="70%" style="padding:8px; border-bottom:1px solid #fafafa;">'.$_SESSION["compra_regalar_telefono"].'</td>
					</tr>
					<tr>
						<td width="30%" style="background: #fafafa; padding:8px; border-bottom:1px solid #fafafa;">Regalo:</td>
						<td width="70%" style="padding:8px; border-bottom:1px solid #fafafa;">'.$mercado_pago.'</td>
					</tr>
				</tbody>
			</table>
			</body>
			</html>
			';
			$header  = 'MIME-Version: 2.0' . "\r\n";
			$header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$header .= 'From: '.$_SESSION["compra_regalar_nombre"].' '.$_SESSION["compra_regalar_apellido"].' <'.$_SESSION["compra_regalar_email"].'>';
			if(@mail($to, $subject, $cuerpo, $header))
			{
				$subject = 'Regalo - La Réserve';
				$cuerpo = '<table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td align="center"><table width="599" border="0" cellspacing="0" cellpadding="0">
								  <tr>
									<td width="599" height="124"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/voucher/images/header-gift.jpg" width="599" height="124" border="0" style="display:block;" alt="La Réserve | Susana Noguera" title="La Réserve | Susana Noguera" /></td>
								  </tr>
								  <tr>
									<td><table width="599" border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td width="46" height="213" valign="top"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/voucher/images/borde-izquierdo.jpg" width="46" height="213" border="0" style="display:block;" alt="" /></td>
										<td bgcolor="#F1F1F1"><table width="380" border="0" cellspacing="0" cellpadding="0">
										  <tr>
											<td width="380" height="147" align="left" valign="top" bgcolor="#F1F1F1"><table width="380" border="0" cellspacing="0" cellpadding="0">
											  <tr>
												<td align="left" valign="top" style="font-family:Helvetica, Arial, sans-serif; font-size:14px; color:#424242">'.$_SESSION["compra_regalar_nombre_amiga"].',</td>
											  </tr>
											  <tr>
												<td height="60" align="left" valign="top" style="font-family:Helvetica, Arial, sans-serif; font-size:14px; color:#424242">'.$_SESSION["compra_regalar_mensaje_amiga"].'</td>
											  </tr>
											  <tr>
												<td align="right" valign="top"><table width="380" border="0" cellspacing="0" cellpadding="0">
													<tr>
													  <td width="310" align="right" valign="top" style="font-family:Helvetica, Arial, sans-serif; font-size:14px; color:#424242">'.$_SESSION["compra_regalar_nombre"].' '.$_SESSION["compra_regalar_apellido"].'</td>
													  <td width="70"></td>
													</tr>
												  </table></td>
											  </tr>
											  <tr>
												<td height="7" align="center" valign="middle" style="font-family:Arial; font-size:14px; color:#424242"></td>
											  </tr>
											  <tr>
												<td height="40" align="center" valign="bottom">
												  <table width="380" border="0" cellspacing="0" cellpadding="0">
													<tr>
													  <td align="center"style="font-family:Helvetica, Arial, sans-serif; font-size:14px; color:#424242">Gift Certificate V&aacute;lido por: '.$mercado_pago.'</td>
													  <td width="20"></td>
													</tr>
												  </table></td>
											  </tr>
											</table></td>
										  </tr>
										  <tr>
											<td width="380" height="42"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/voucher/images/estrellas.jpg" width="380" height="42" border="0" style="display:block;" alt="" /></td>
										  </tr>
										  <tr>
											<td><table width="380" border="0" cellspacing="0" cellpadding="0">
											  <tr>
												<td valign="middle">
												  <table width="332" border="0" cellspacing="0" cellpadding="0">
													<tr>
													  <td width="48"></td>
													  <td align="center" valign="middle" style="font-family:Helvetica, Arial, sans-serif; font-size:12px; color:#424242">Validez: 90 d&iacute;as a partir del '.date("d/m/y").'</td>
													</tr>
												  </table></td>
												<td width="48" height="24"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/voucher/images/borde-sobre.jpg" width="48" height="24" border="0" style="display:block;" alt="" /></td>
											  </tr>
											</table></td>
										  </tr>
										</table></td>
										<td width="173" height="213" valign="top"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/voucher/images/sobre.jpg" width="173" height="213" border="0" style="display:block;" /></td>
									  </tr>
									</table></td>
								  </tr>
								  <tr>
									<td width="599" height="72"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/voucher/images/sobre-cierre.jpg" width="599" height="72" border="0" alt="" style="display:block;" /></td>
								  </tr>
								  <tr>
									<td><table width="599" border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td width="26" height="65"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/voucher/images/vacio1.jpg" width="26" height="65" border="0" alt="" style="display:block;" /></td>
										<td><table width="516" border="0" cellspacing="0" cellpadding="0">
										  <tr>
											<td><table width="516" border="0" cellspacing="0" cellpadding="0">
											  <tr>
												<td width="209" height="21"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/voucher/images/direccion-telefono.jpg" width="209" height="21" border="0" style="display:block;" alt="Virrey del Pino 2337 - 4784.3333" title="Virrey del Pino 2337 - 4784.3333" /></td>
												<td width="157" height="21"><a href="mailto:recepcion@lareserve.com.uy" target="_blank"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/voucher/images/info-spabelgrano-com.jpg" width="157" height="21" border="0" style="display:block;" alt="recepcion@lareserve.com.uy" title="recepcion@lareserve.com.uy" /></a></td>
												<td width="150" height="21"><a href="http://www.lareserve.com.uy" target="_blank"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/voucher/images/spabelgrano-com.jpg" width="150" height="21" border="0" style="display:block;" alt="www.lareserve.com.uy" title="www.lareserve.com.uy" /></a></td>
											  </tr>
											</table></td>
										  </tr>
										  <tr>
											<td><table width="516" border="0" cellspacing="0" cellpadding="0">
											  <tr>
												<td width="146" height="44"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/voucher/images/vacio3.jpg" width="146" height="44" border="0" style="display:block;" alt="" /></td>
												<td><table width="370" border="0" cellspacing="0" cellpadding="0">
												  <tr>
													<td><table width="370" border="0" cellspacing="0" cellpadding="0">
													  <tr>
														<td width="85" height="24"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/voucher/images/seguinos.jpg" width="85" height="24" border="0" style="display:block;" alt="seguinos en:" title="seguinos en:" /></td>
														<td width="19" height="24"><a href="http://www.facebook.com/spabelgrano" target="_blank"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/voucher/images/facebook.jpg" width="19" height="24" border="0" style="display:block;" alt="facebook" title="facebook" /></a></td>
														<td width="20" height="24"><a href="https://twitter.com/spabelgrano" target="_blank"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/voucher/images/twitter.jpg" width="20" height="24" border="0" style="display:block;" alt="twitter" title="twitter" /></a></td>
														<td width="246" height="24"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/voucher/images/spabelgrano.jpg" width="246" height="24" border="0" style="display:block;" alt="/spabelgrano" title="/spabelgrano" /></td>
													  </tr>
													</table></td>
												  </tr>
												  <tr>
													<td width="370" height="20"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/voucher/images/vacio4.jpg" width="370" height="20" border="0" style="display:block;" alt="" /></td>
												  </tr>
												</table></td>
											  </tr>
											</table></td>
										  </tr>
										</table></td>
										<td width="57" height="65"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/voucher/images/vacio2.jpg" width="57" height="65" border="0" style="display:block;" alt="" /></td>
									  </tr>
									</table></td>
								  </tr>
								 </table></td>
							  </tr>
							</table>';

			$to_cliente = $_SESSION[compra_regalar_email];
			$to = 'recepcion@lareserve.com.uy';

			$header  = 'MIME-Version: 2.0' . "\r\n";
			$header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$header .= 'From: '.$_SESSION["compra_regalar_nombre"].' '.$_SESSION["compra_regalar_apellido"].' <'.$_SESSION["compra_regalar_email"].'>';

			/// ENVIO MAIL CLIENTE

			@mail($to_cliente, $subject, $cuerpo, $header);
			@mail($to, $subject, $cuerpo, $header);

			$form_result_regalar = 'ok';

			}
			else
			{
				$form_result_regalar = 'error';
			}
		}
		?>

		<?php
		if($_POST['recomendar_submit'] == true) {

			/// INSERTA TABLA
			$con = mysql_connect("localhost","uv5919","7k1wHz39H8");
			mysql_select_db("spa1", $con);

			$sql =  mysql_query("SELECT * FROM compra ORDER BY id DESC");
			$row = mysql_fetch_array($sql);

			$id = $row['id'];

			$nombre_amiga1 = $_POST['recomendar_nombre_1'];
			$nombre_amiga2 = $_POST['recomendar_nombre_2'];
			$email_amiga1 = $_POST['recomendar_email_1'];
			$email_amiga2 = $_POST['recomendar_email_2'];

			$sql = "UPDATE compra SET ";
			$sql.= "recomenda1='$nombre_amiga1', email_recomenda1='$email_amiga1', recomenda2='$nombre_amiga2', email_recomenda2='$email_amiga2', fecha = NOW() ";
  			$sql.= "WHERE id = '$id'";
			mysql_query($sql);

			///

			$to = $opt_email;
			$subject = 'Recomendacion - La Réserve';
			$cuerpo = '
			<html>
			<head>
			  <title>Recomendacion</title>
			</head>
			<body>
			<table width="100%" style="margin-bottom: 20px;" cellpadding="0" cellspacing="0">
				<tbody>
					<tr>
						<td width="30%" style="background: #fafafa; padding:8px; border-bottom:1px solid #fafafa;">Amigas recomendadas por:</td>
						<td width="70%" style="padding:8px; border-bottom:1px solid #fafafa;">'.$_POST["recomendar_nombre"].' '.$_POST["recomendar_apellido"].'</td>
					</tr>
					<tr>
						<td width="30%" style="background: #fafafa; padding:8px; border-bottom:1px solid #fafafa;">Amiga 1:</td>
						<td width="70%" style="padding:8px; border-bottom:1px solid #fafafa;">'.$_POST["recomendar_nombre_1"].' - '.$_POST["recomendar_email_1"].'</td>
					</tr>
					<tr>
						<td width="30%" style="background: #fafafa; padding:8px; border-bottom:1px solid #fafafa;">Amiga 2:</td>
						<td width="70%" style="padding:8px; border-bottom:1px solid #fafafa;">'.$_POST["recomendar_nombre_2"].' - '.$_POST["recomendar_email_2"].'</td>
					</tr>
				</tbody>
			</table>
			</body>
			</html>
			';
			$header  = 'MIME-Version: 2.0' . "\r\n";
			$header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$header .= 'From: '.$_POST["recomendar_nombre"].' '.$_POST["recomendar_apellido"].' <'.$_POST["recomendar_email"].'>';

			if(@mail($to, $subject, $cuerpo, $header))
			{

					//// RECOMENDACION 1

				$subject = ' '.$_POST["recomendar_nombre_1"].', Te recomiendo La Réserve';
				$cuerpo = '
				<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr>
		<td height="144"><a href="http://www.lareserve.com.uy" target="_blank"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/recomenda/images/header.jpg" alt="La Réserve " width="600" height="144" border="0" style="border:0; display:block"></a></td>
	  </tr>
	  <tr>
		<td><table width="600" border="0" cellpadding="0" cellspacing="0">
		  <tr>
			<td width="124" height="26" bgcolor="#F2F2F2"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/recomenda/images/izq1.jpg" width="108" height="26" border="0" style="border:0; display:block"></td>
			<td width="402" bgcolor="#F2F2F2" style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#5B5D5C;"> '.$_POST["recomendar_nombre_1"].'</td>
			<td width="74"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/recomenda/images/der1.jpg" width="74" height="26" border="0" style="border:0; display:block"></td>
		  </tr>
		</table></td>
	  </tr>
	  <tr>
		<td><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/recomenda/images/hr.jpg" width="600" height="15" border="0" style="border:0; display:block"></td>
	  </tr>
	  <tr>
		<td><table width="600" border="0" cellpadding="0" cellspacing="0">
		  <tr>
			<td width="122" height="26" bgcolor="#F2F2F2"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/recomenda/images/izq2.jpg" width="108" height="101" border="0" style="border:0; display:block"></td>
			<td width="375" bgcolor="#F2F2F2"><table width="375" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#5B5D5C;">Estuve viendo la p&aacute;gina de La Réserve y me encant&oacute; la variedad de tratamientos faciales y corporales que tienen para ofrecernos. Realmente te los recomiendo.</td>
			  </tr>
			  </table></td>
			<td width="103"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/recomenda/images/der2.jpg" width="103" height="101" border="0" style="border:0; display:block"></td>
		  </tr>
		</table></td>
	  </tr>
	  <tr>
		<td><table width="600" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td width="242"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/recomenda/images/izq3.jpg" width="242" height="33" style="border:0; display:block"></td>
			<td width="215" align="right" bgcolor="#F2F2F2" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#5A5A5A;"><strong>'.$_POST["recomendar_nombre"].' '.$_POST["recomendar_apellido"].'</strong></td>
			<td width="143"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/recomenda/images/der3.jpg" width="146" height="33" style="border:0; display:block"></td>
		  </tr>
		</table></td>
	  </tr>
	  <tr>
		<td><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/recomenda/images/fin-sobre.jpg" width="600" height="145" border="0" style="border:0; display:block"></td>
	  </tr>
	  <tr>
		<td height="25" bgcolor="#D9D7D8"></td>
	  </tr>
	  <tr>
		<td bgcolor="#D9D7D8"><table width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			  <td width="32">&nbsp;</td>
			  <td width="32">&nbsp;</td>
			  <td width="336">&nbsp;</td>
			  <td width="145"><a href="http://www.lareserve.com.uy" target="_blank"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/recomenda/images/visita-el-sitio.jpg" alt="Visita el Sitio" width="145" height="29" border="0" style="border:0; display:block" /></a></td>
			  <td width="55">&nbsp;</td>
			</tr>
			<tr>
			  <td height="25" colspan="5">&nbsp;</td>
			</tr>
		</table></td>
	  </tr>
	  <tr>
		<td><table width="600" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td align="right" bgcolor="#D9D7D8"><table width="542" border="0" cellspacing="0" cellpadding="0">
			  <tr bgcolor="#DBD9DA">
				<td width="425" height="38" bgcolor="#D9D7D8" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#5B5D5C;">Sumate a nuestra Fan Page en Facebook, seguinos en Twitter y conoc&eacute; nuestras propuestas, novedades y promociones</td>
				<td width="33"><a href="http://www.facebook.com/spabelgrano" target="_blank"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/turno/images/fbk.jpg" alt="facebook" width="33" height="32" border="0"  style="display:block"/></a></td>
        		<td width="87"><a href="https://twitter.com/spabelgrano" target="_blank"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/turno/images/twitter.jpg" alt="twitter" width="87" height="32" border="0"  style="display:block"/></a></td>
			  </tr>
			</table></td>
		  </tr>
		  <tr>
			<td align="right" bgcolor="#D9D7D8">&nbsp;</td>
		  </tr>
		</table></td>
	  </tr>
	  </table>
			';
			$header  = 'MIME-Version: 2.0' . "\r\n";
			$header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$header .= 'From: '.$_POST["recomendar_nombre"].' '.$_POST["recomendar_apellido"].' <'.$_POST["recomendar_email"].'>';
			@mail($email_amiga1, $subject, $cuerpo, $header);

			////

		//// RECOMENDACION 2
		if($_POST['recomendar_nombre_2'] != '' && $_POST['recomendar_email_2'] != '') {
			$subject = ' '.$_POST["recomendar_nombre_2"].', Te recomiendo La Réserve';
			$cuerpo = '
				<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr>
		<td height="144"><a href="http://www.lareserve.com.uy" target="_blank"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/recomenda/images/header.jpg" alt="La Réserve " width="600" height="144" border="0" style="border:0; display:block"></a></td>
	  </tr>
	  <tr>
		<td><table width="600" border="0" cellpadding="0" cellspacing="0">
		  <tr>
			<td width="124" height="26" bgcolor="#F2F2F2"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/recomenda/images/izq1.jpg" width="108" height="26" border="0" style="border:0; display:block"></td>
			<td width="402" bgcolor="#F2F2F2" style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#5B5D5C;"> '.$_POST["recomendar_nombre_2"].'</td>
			<td width="74"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/recomenda/images/der1.jpg" width="74" height="26" border="0" style="border:0; display:block"></td>
		  </tr>
		</table></td>
	  </tr>
	  <tr>
		<td><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/recomenda/images/hr.jpg" width="600" height="15" border="0" style="border:0; display:block"></td>
	  </tr>
	  <tr>
		<td><table width="600" border="0" cellpadding="0" cellspacing="0">
		  <tr>
			<td width="122" height="26" bgcolor="#F2F2F2"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/recomenda/images/izq2.jpg" width="108" height="101" border="0" style="border:0; display:block"></td>
			<td width="375" bgcolor="#F2F2F2"><table width="375" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#5B5D5C;">Estuve viendo la p&aacute;gina de La Réserve y me encant&oacute; la variedad de tratamientos faciales y corporales que tienen para ofrecernos. Realmente te los recomiendo.</td>
			  </tr>
			  </table></td>
			<td width="103"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/recomenda/images/der2.jpg" width="103" height="101" border="0" style="border:0; display:block"></td>
		  </tr>
		</table></td>
	  </tr>
	  <tr>
		<td><table width="600" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td width="242"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/recomenda/images/izq3.jpg" width="242" height="33" style="border:0; display:block"></td>
			<td width="215" align="right" bgcolor="#F2F2F2" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#5A5A5A;"><strong>'.$_POST["recomendar_nombre"].' '.$_POST["recomendar_apellido"].'</strong></td>
			<td width="143"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/recomenda/images/der3.jpg" width="146" height="33" style="border:0; display:block"></td>
		  </tr>
		</table></td>
	  </tr>
	  <tr>
		<td><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/recomenda/images/fin-sobre.jpg" width="600" height="145" border="0" style="border:0; display:block"></td>
	  </tr>
	  <tr>
		<td height="25" bgcolor="#D9D7D8"></td>
	  </tr>
	  <tr>
		<td bgcolor="#D9D7D8"><table width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			  <td width="32">&nbsp;</td>
			  <td width="32">&nbsp;</td>
			  <td width="336">&nbsp;</td>
			  <td width="145"><a href="http://www.lareserve.com.uy" target="_blank"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/recomenda/images/visita-el-sitio.jpg" alt="Visita el Sitio" width="145" height="29" border="0" style="border:0; display:block" /></a></td>
			  <td width="55">&nbsp;</td>
			</tr>
			<tr>
			  <td height="25" colspan="5">&nbsp;</td>
			</tr>
		</table></td>
	  </tr>
	  <tr>

		<td><table width="600" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td align="right" bgcolor="#D9D7D8"><table width="542" border="0" cellspacing="0" cellpadding="0">
			  <tr bgcolor="#DBD9DA">
				<td width="425" height="38" bgcolor="#D9D7D8" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#5B5D5C;">Sumate a nuestra Fan Page en Facebook, seguinos en Twitter y conoc&eacute; nuestras propuestas, novedades y promociones</td>
				<td width="33"><a href="http://www.facebook.com/spabelgrano" target="_blank"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/turno/images/fbk.jpg" alt="facebook" width="33" height="32" border="0"  style="display:block"/></a></td>
       			<td width="87"><a href="https://twitter.com/spabelgrano" target="_blank"><img src="http://www.lareserve.com.uy/wp-content/themes/spa-belgrano/mailing/turno/images/twitter.jpg" alt="twitter" width="87" height="32" border="0"  style="display:block"/></a></td>
			  </tr>
			</table></td>
		  </tr>
		  <tr>
			<td align="right" bgcolor="#D9D7D8">&nbsp;</td>
		  </tr>
		</table></td>
	  </tr>
	  </table>
			';


				$header  = 'MIME-Version: 2.0' . "\r\n";
				$header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
				$header .= 'From: '.$_POST["recomendar_nombre"].' '.$_POST["recomendar_apellido"].' <'.$_POST["recomendar_email"].'>';
				@mail($email_amiga2, $subject, $cuerpo, $header);
		}

				$form_result_recomendar = 'ok';
				header("Location: http://tienda.spabelgrano.com/"); 

			}
			else
			{
				$form_result_recomendar = 'error';
			}
		}
		?>

		<?php
		if( $form_result_turno=='ok' or $form_result_regalar=='ok'  ) {
			if( $form_result_turno=='ok' )
			{
				$nombre = $_SESSION["compra_turno_nombre"];
				$apellido = $_SESSION["compra_turno_apellido"];
				$email = $_SESSION["compra_turno_apellido"];
			}
			if( $form_result_regalar=='ok' )
			{
				$nombre = $_SESSION["compra_regalar_nombre"];
				$apellido = $_SESSION["compra_regalar_apellido"];
				$email = $_SESSION["compra_regalar_apellido"];
			}
			session_destroy();
		?>

		<h2 class="no-sombra">Gracias <?php echo $nombre; ?> por escribirnos.</h2>
		<h2 style="font-size:14px;" class="no-sombra">- Chequeá en tu correo que hayas recibido el Gift Certificate correctamente.<br />
		- No olvides revisar tu Correo No Deseado. <br />
		- Si en una hora no recibiste tu Gift Certificate, envianos por favor un mail a <a href="mailto:recepcion@lareserve.com.uy">recepcion@lareserve.com.uy</a> y te lo enviaremos a la brevedad.</h2>		
		
		<hr />

		<p class="contacto-social">Segu&iacute;nos y enterate de las &uacute;ltimas novedades. <a href="<?php echo $opt_url_fb; ?>" class="icon-fb" target="_blank">Facebook</a> <a href="<?php echo $opt_url_tw; ?>" class="icon-tw" target="_blank">Twitter</a></p>

		<hr />

		<p class="title">&iquest;A qui&eacute;n crees que le interesaran nuestras propuestas?</p>

		<form method="post" action="" class="form-recomendar">

		<div class="left">
			<table width="100%">
				<tr>
					<td><strong>Amiga/o 1</strong></td>
					<td><label>Nombre</label></td>
					<td><input type="text" name="recomendar_nombre_1" value="" class="input" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><label>Email</label></td>
					<td><input type="email" name="recomendar_email_1" value="" class="input" /></td>
				</tr>
				<tr>
					<td colspan="3">*Solicit&aacute; tu bonificaci&oacute;n por haber concurrido con las personas que contactaste.</td>
				</tr>
			</table>
		</div>
		<div class="right">
			<table width="100%">
				<tr>
					<td><strong>Amiga/o 2</strong></td>
					<td><label>Nombre</label></td>
					<td><input type="text" name="recomendar_nombre_2" value="" class="input" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><label>Email</label></td>
					<td><input type="email" name="recomendar_email_2" value="" class="input" /></td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
					<td>
						<input type="hidden" name="recomendar_nombre" value="<?php echo $nombre; ?>" />
						<input type="hidden" name="recomendar_apellido" value="<?php echo $apellido; ?>" />
						<input type="hidden" name="recomendar_email" value="<?php echo $email; ?>" />
						<input type="submit" name="recomendar_submit" value="Recomendar" class="submit submit-text" />
					</td>
				</tr>
			</table>
		</div>
		<div class="clear">&nbsp;</div>

		</form>

		<?php } elseif( $form_result_recomendar == 'ok') { ?>

		<h2 class="no-sombra">Has completado todo el proceso satisfactoriamente</h2>

		<hr />

		<p class="contacto-social">Segu&iacute;nos y enterate de las &uacute;ltimas novedades. <a href="<?php echo $opt_url_fb; ?>" class="icon-fb" target="_blank">Facebook</a> <a href="<?php echo $opt_url_tw; ?>" class="icon-tw" target="_blank">Twitter</a></p>

		<?php } else { ?>

		<h2>Complet&aacute; el formulario para solicitar un turno o hacer un regalo</h2>

			<table width="60%">
				<tr>
					<td><label for="compra-turno"><input type="radio" name="compra_opcion" id="compra-turno" value="Solicitar turno" checked="checked" /> QUIERO SOLICITAR UN TURNO</label></td>
					<td><label for="compra-regalar"><input type="radio" name="compra_opcion" id="compra-regalar" value="Para regalar" /> QUIERO HACER UN REGALO</label></td>
				</tr>
			</table>

			<div id="resultado-compra-turno" class="resultado-compra-pane">

				<form method="post" action="?mp=ok">

				<div class="left">
					<table width="100%">
						<tr>
							<td colspan="2"><strong>Tus Datos</strong></td>
						</tr>
						<tr>
							<td><label>Nombre*</label></td>
							<td><input type="text" name="compra_turno_nombre" value="" class="input" required /></td>
						</tr>
						<tr>
							<td><label>Apellido*</label></td>
							<td><input type="text" name="compra_turno_apellido" value="" class="input" required /></td>
						</tr>
						<tr>
							<td><label>Email*</label></td>
							<td><input type="email" name="compra_turno_email" value="" class="input" required /></td>
						</tr>
						<tr>
							<td><label>Tel&eacute;fono*</label></td>
							<td><input type="tel" name="compra_turno_telefono" value="" class="input" required /></td>
						</tr>
					</table>
				</div>
				<div class="right">
					<table width="100%">
					<tr>
						<td><label class="dos-lineas">Día que <br />quisieras venir*</label></td>
						<td><input type="date" name="diagnostico_date_1" class="input date" value="" required /></td>
					</tr>
					<tr>
						<td><label>Horario*</label></td>
						<td>
							<select name="diagnostico_horario_1" class="input" required>
								<option value="">-</option>
								<option value="8 a.m.">8 a.m.</option>
								<option value="8:30 a.m.">8:30 a.m.</option>
								<option value="9 a.m.">9 a.m.</option>
                                <option value="9:30 a.m.">9:30 a.m.</option>
								<option value="10 a.m.">10 a.m.</option>
                                <option value="10:30 a.m.">10:30 a.m.</option>
								<option value="11 a.m.">11 a.m.</option>
								<option value="11:30 a.m.">11:30 a.m.</option>
                                <option value="12 p.m.">12 p.m.</option>
								<option value="12:30 p.m.">12:30 p.m.</option>
                                <option value="1 p.m.">1 p.m.</option>
								<option value="1:30 p.m.">1:30 p.m.</option>
                                <option value="2 p.m.">2 p.m.</option>
								<option value="2:30 p.m.">2:30 p.m.</option>
                                <option value="3 p.m.">3 p.m.</option>
                                <option value="3:30 p.m.">3:30 p.m.</option>
								<option value="4 p.m.">4 p.m.</option>
								<option value="4:30 p.m.">4:30 p.m.</option>
                                <option value="5 p.m.">5 p.m.</option>
								<option value="5:30 p.m.">5:30 p.m.</option>
                                <option value="6 p.m.">6 p.m.</option>
								<option value="6:30 p.m.">6:30 p.m.</option>
                                <option value="7 p.m.">7 p.m.</option>
								<option value="7:30 p.m.">7:30 p.m.</option>
                                <option value="8 p.m.">8 p.m.</option>
								<option value="8:30 p.m.">8:30 p.m.</option>
                                <option value="9 p.m.">9 p.m.</option>
                                <option value="9:30 p.m.">9:30 p.m.</option>
                                <option value="10 p.m.">10 p.m.</option>
                          </select>
						</td>
					</tr>
					<tr class="otra-opcion">
						<td><label>D&iacute;a</label></td>
						<td><input type="date" name="diagnostico_date_2" class="input date" value="" /></td>
					</tr>
					<tr class="otra-opcion">
						<td><label>Horario</label></td>
						<td>
							<select name="diagnostico_horario_2" class="input">
								<option value="8 a.m.">8 a.m.</option>
								<option value="8:30 a.m.">8:30 a.m.</option>
								<option value="9 a.m.">9 a.m.</option>
                                <option value="9:30 a.m.">9:30 a.m.</option>
								<option value="10 a.m.">10 a.m.</option>
                                <option value="10:30 a.m.">10:30 a.m.</option>
								<option value="11 a.m.">11 a.m.</option>
								<option value="11:30 a.m.">11:30 a.m.</option>
                                <option value="12 p.m.">12 p.m.</option>
								<option value="12:30 p.m.">12:30 p.m.</option>
                                <option value="1 p.m.">1 p.m.</option>
								<option value="1:30 p.m.">1:30 p.m.</option>
                                <option value="2 p.m.">2 p.m.</option>
								<option value="2:30 p.m.">2:30 p.m.</option>
                                <option value="3 p.m.">3 p.m.</option>
                                <option value="3:30 p.m.">3:30 p.m.</option>
								<option value="4 p.m.">4 p.m.</option>
								<option value="4:30 p.m.">4:30 p.m.</option>
                                <option value="5 p.m.">5 p.m.</option>
								<option value="5:30 p.m.">5:30 p.m.</option>
                                <option value="6 p.m.">6 p.m.</option>
								<option value="6:30 p.m.">6:30 p.m.</option>
                                <option value="7 p.m.">7 p.m.</option>
								<option value="7:30 p.m.">7:30 p.m.</option>
                                <option value="8 p.m.">8 p.m.</option>
								<option value="8:30 p.m.">8:30 p.m.</option>
                                <option value="9 p.m.">9 p.m.</option>
                                <option value="9:30 p.m.">9:30 p.m.</option>
                                <option value="10 p.m.">10 p.m.</option>
							</select>
						</td>
					</tr>
                    <tr>
						<td colspan="2" align="left"><div align="left">*Horario de atención de 8 a 22hs.</div></td>
			    </tr>
					<tr>
						<td colspan="2"><label for="otra-opcion">¿Qué otro día podrías venir?</label> <input type="checkbox" name="diagnostico_otra_opcion" id="otra-opcion" value="" /></td>
					</tr>
					<tr>
						<td><label>Comentario</label></td>
						<td><textarea name="diagnostico_comentario" class="textarea"></textarea></td>
					</tr>
					<tr>
						<td colspan="2">
							
				
				<input type="submit" name="compra_turno_submit" value="Enviar" class="submit submit-text" /></td>	
	
			
					</tr>
                    </table>
				</div>
				<div class="clear">&nbsp;</div>

				</form>

				<br /><br />
				<p id="aclaracion"><span>Aclaración:</span> Actualmente tenemos las agendas de nuestros profesionales muy comprometidas, por lo que el turno será confirmado una vez nos pongamos en contacto vía mail o por teléfono. Por favor, asegúrese de comunicarse con recepción una vez solicitado el turno online.</p>

			</div>

			<div id="resultado-compra-regalar" class="resultado-compra-pane campos-grandes">

				<form method="post" action="?mp=ok">

				<div class="left">
					<table width="100%">
						<tr>
							<td colspan="2"><strong>Datos</strong></td>
						</tr>
						<tr>
							<td colspan="2">Los datos que escribas los vas a ver en este Gift Certificate, que luego vas a recibir por mail para reenviarlo a quien corresponda.</td>
						</tr>
						<tr>
							<td><label>Tu nombre*</label></td>
							<td><input type="text" id="compra_regalar_nombre" name="compra_regalar_nombre" value="" class="input" maxlength="60" required /></td>
						</tr>
						<tr>
							<td><label>Tu apellido*</label></td>
							<td><input type="text" id="compra_regalar_apellido" name="compra_regalar_apellido" value="" class="input" required /></td>
						</tr>
						<tr>
							<td><label>Tu email*</label></td>
							<td><input type="email" name="compra_regalar_email" value="" class="input" required /></td>
						</tr>
						<tr>
							<td><label>Tu tel&eacute;fono*</label></td>
							<td><input type="tel" name="compra_regalar_telefono" value="" class="input" required /></td>
						</tr>
						<tr>
							<td><label>Nombre del<br /> agasajado*</label></td>
							<td><input type="text" id="compra_regalar_nombre_amiga" name="compra_regalar_nombre_amiga" value="" class="input" maxlength="60" required /></td>
						</tr>
						<tr>
							<td><label>Apellido del<br /> agasajado*</label></td>
							<td><input type="text" id="compra_regalar_apellido_amiga" name="compra_regalar_apellido_amiga" value="" class="input" maxlength="60" required /></td>
						</tr>
						<tr>
							<td><label>Mensaje personalizado<br />(Hasta 150 caracteres)</label></td>
							<td><textarea id="compra_regalar_mensaje_amiga" name="compra_regalar_mensaje_amiga" class="textarea" maxlength="150"></textarea></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:right;"><input type="submit" name="compra_regalar_submit" value="Continuar" class="submit submit-text" /></td>
						</tr>
					</table>
				</div>
				<div class="right">
					<div id="cupon-regalar">
						<input type="text" id="cupon-tratamiento" class="campo-cupon" readonly="readonly" value="<?php echo rawurldecode($_GET['trat']) ?>">
						<input type="text" id="cupon-agasajado" class="campo-cupon" readonly="readonly">
						<input type="text" id="cupon-cliente" class="campo-cupon" readonly="readonly">
						<textarea type="text" id="cupon-mensaje" class="campo-cupon" readonly="readonly"></textarea>
					</div>
				<p style="margin-top:10px; font-style: italic">*Ambos apellidos no aparecerán en el Gift Certificate aunque los guardaremos en nuestra base de datos</p>
				</div>
				
				<div class="clear">&nbsp;</div>

				</form>

				<br /><br />
				<p id="aclaracion">
					<span>Aclaraciones:</span><br />
					- Si no recibis instantáneamente el Gift Certificate en tu casilla de mail, por favor verificá el Correo No Deseado. <br />
					- Validez del Voucher: 90 días a partir de la fecha de compra.
				</p>

			</div>
			<br />

		<?php } ?>

	</div>

<?php get_footer(); ?>