<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Gift - Spa belgrano</title>
	<link rel="shortcut icon" href="<?php echo base_url() . TEMPLATE_ASSETS; ?>images/favicon.ico" type="image/x-icon">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<link href="<?php echo base_url() . TEMPLATE_ASSETS; ?>css/style.css" rel="stylesheet"/>
	<link href="<?php echo base_url() . TEMPLATE_ASSETS; ?>css/colors/style-color-01.css" rel="stylesheet"/>
	<link rel="stylesheet" href="<?php echo base_url() . TEMPLATE_ASSETS; ?>css/contact.css">
	<link rel="stylesheet" href="<?php echo base_url() . TEMPLATE_ASSETS; ?>css/simple-line-icons.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700' rel='stylesheet' type='text/css'>
</head>
<body>




<div id="wrapper">

	<!-- Start Header -->

	<div id="header">

		<div class="container">
			<div class="row">
				<div class="span12">

					<h1><a href="<?php echo base_url(''); ?>"><img src="<?php echo base_url() . TEMPLATE_ASSETS; ?>images/logo-spa.png" alt="Convert" /></a></h1>
					<h2 class="menulink"><a href="<?php echo base_url(''); ?>">Menu</a></h2>

					<!-- Start Menu -->
					<div id="menu">




					</div>
					<!-- End Menu -->

				</div>
				<div class="clearfix"></div>
			</div>

		</div>

	</div>

	<!-- End Header -->

	<!-- Start Content -->

		<div class="container">

          <div class="row">
 	<div style="margin-bottom:30px;">
   <h1 style="text-align:center;">Muchas gracias <?php echo $this->session->userdata('nombre_comprador'); ?> <?php echo $this->session->userdata('apellido_comprador'); ?>!</h1>
   <p style="text-align:center; color:#555;">Tu Gift ha sido enviado por correo electrónico para que puedas reenviarlo a tu agasajado.<br>
     Si no recibiste el gift, por favor corroborá la carpeta de correo no deseado, o envianos un mail a <a class="link_sociales" href="mailto:info@spabelgrano.com">info@spabelgrano.com</a>
   </p>
   <hr style="color:#999;" />
   </div>
          </div>


            <div class="row">


            <h2 style="text-align:center;">Recomendá a tus amigos lo fácil que es regalar en Spa Belgrano!</h2>
            <div style="text-align:center; height:200px;"><!-- Go to www.addthis.com/dashboard to customize your tools -->
	    <div style="text-align:center" class="addthis_native_toolbox"></div>
	    <div>	

             </div>

                <!-- FOOTER -->

          	<div class="row">
                <div class="footer">
         			<HR />

         			<ul>
         				<li><strong>Teléfono:</strong> 4784.3333</li>
         				<li><strong>Email:</strong> <a class="link_sociales" href="mailto:info@spabelgrano.com"> info@spabelgrano.com</a></li>
         				<li><strong>Dirección:</strong> Virrey del Pino 2237, Belgrano</li>
         				<li>
         					<a class="link_sociales" href="https://twitter.com/SpaBelgrano" target="_blank">
         						<img src="<?php echo base_url() . TEMPLATE_ASSETS; ?>images/twitter.png" width="20" height="20"> @spabelgrano
         					</a>
         				</li>
         				<li>
         					<a class="link_sociales" href="https://www.facebook.com/spabelgrano?fref=ts" target="_blank">
         						<img src="<?php echo base_url() . TEMPLATE_ASSETS; ?>images/facebook.png" width="20" height="20"> /spabelgrano
         					</a>
         				</li>
         			</ul>

         		</div>
            </div>
                <!-- FOOTER -->
            </div>



		</div>




	<!-- End content -->

	<div class="clearfix"></div>

</div>


<!--[if lte IE 7]><script src="js/icons-lte-ie7.js"></script><![endif]-->
<script src="<?php echo base_url() . TEMPLATE_ASSETS; ?>js/jquery.min.js"></script>
<script src="<?php echo base_url() . TEMPLATE_ASSETS; ?>js/respond.min.js"></script>
<script src="<?php echo base_url() . TEMPLATE_ASSETS; ?>js/scripts.js"></script>
<script src="<?php echo base_url() . TEMPLATE_ASSETS; ?>js/jquery.form.js"></script>
<script src="<?php echo base_url() . TEMPLATE_ASSETS; ?>js/jquery.validate.min.js"></script>
<script src="<?php echo base_url() . TEMPLATE_ASSETS; ?>js/contact.js"></script>


<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50e5a99710278f46" async="async"></script>
</body>
</html>
