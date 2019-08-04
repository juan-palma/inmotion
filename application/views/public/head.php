<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="es" class="no-js lt-ie9 lt-ie8 lt-ie7" prefix="og: http://ogp.me/ns#"> <![endif]-->
<!--[if IE 7]>         <html lang="es" class="no-js lt-ie9 lt-ie8" prefix="og: http://ogp.me/ns#"> <![endif]-->
<!--[if IE 8]>         <html lang="es" class="no-js lt-ie9" prefix="og: http://ogp.me/ns#"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="es" class="no-js"> <!--<![endif]-->
	<head itemscope itemtype="http://schema.org/Person" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# profile: http://ogp.me/ns/profile#">
		<meta charset="utf-8" />
		<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><![endif]-->
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0" />
		
		<meta http-equiv="Content-Encoding" content="gzip" />
		<meta http-equiv="Accept-Encoding" content="gzip, deflate" />
				
		<link rel="shortcut icon" href="<?php echo(base_url('assets/public/img/favicon.ico')); ?>?v1" />
		<link rel="icon" href="<?php echo(base_url('assets/public/img/favicon.ico')); ?>?v1" />
		<link rel="apple-touch-icon" href="<?php echo(base_url('assets/public/img/apple-touch-icon.png')); ?>" />
				
		<title><?php echo($titulo); ?> | INMOTION</title>
		<meta name="description" content="<?php echo($desc); ?>" />

					
		<meta name="dcterms.audience" content="Global" />
		<meta name="rating" content="General" />
		

		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		
<!-- 		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> -->
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
	    <link href="<?php echo(base_url('assets/admin/css/light-bootstrap-dashboard.css?v=2.0.1')) ?>" rel="stylesheet" />
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.1/tiny-slider.css">
		<link href="<?php echo(base_url('assets/public/css/main.css')) ?>" rel="stylesheet" type="text/css">
				
		
		<!-- Meta Data de verificacion de sitios web. -->
		<meta name="msvalidate.01" content="ED387E3F99B5758EB607324E9928F951" />
		<meta name="p:domain_verify" content="92115dc4d60becb13618274218b951f2"/>
		
		
		<?php if(isset($actual) && $actual !== ''){
			?>
		<script type="text/javascript"> 
			var pageActual = '<?php echo($actual); ?>';
			var baseDir = '<?php echo(base_url()); ?>';
		</script>
			<?php
		}
		?>
		
		
<?php
$headerDB = new stdClass();
$headerDB->titulo_general = 'CONTÁCTANOS';
$headerDB->direccion = 'Monte Elbruz 132,<br />Lomas de Chapultepec, Miguel Hidalgo, CDMX, México';
$headerDB->mail_destino = 'CONTÁCTANOS';
$headerDB->team = [];

$valor = new stdClass();
$valor->red = 'facebook';
$valor->nombre = 'Mi Pagina';
$valor->liga = 'https://www.facebook.com/inmotionmktg';
$valor->icono = 'redes_facebook_blanco.svg';
$headerDB->redes[] = $valor;

/*
$valor = new stdClass();
$valor->red = 'behance';
$valor->nombre = 'Mi Portafolio';
$valor->liga = 'https://behance.com';
$valor->icono = 'redes_behance_blanco.svg';
$headerDB->redes[] = $valor;
*/

$valor = new stdClass();
$valor->red = 'instagram';
$valor->nombre = 'Mi Galeria';
$valor->liga = 'https://www.instagram.com/inmotionmktg';
$valor->icono = 'redes_instagram_blanco.svg';
$headerDB->redes[] = $valor;

$valor = new stdClass();
$valor->red = 'linkedIn';
$valor->nombre = 'Mi Curriculum';
$valor->liga = 'https://www.linkedin.com/company/inmotion-communications';
$valor->icono = 'redes_linkedin_blanco.svg';
$headerDB->redes[] = $valor;

?>
						
	</head>
	<body id="<?php echo($actual); ?>"  itemscope="itemscope" itemtype="http://schema.org/WebPage" class="">
		<div id="menuItems" class="dnone">
			<div id="menuItemClose"><i class="fas fa-times"></i></div>
			
			<div class="redes">
				<?php
					foreach ($headerDB->redes as $i=>$v) {
					?>
						<div class="red">
							<a target="_blank" href="<?php echo($v->liga); ?>">
<!-- 									<object type="image/svg+xml" data="<?php echo( base_url('assets/public/img/'.$v->icono) ); ?>">SVG</object> -->
								<img src="<?php echo( base_url('assets/public/img/'.$v->icono) ); ?>" />
							</a>
						</div>
					<?php
					}
				?>
			</div>
				
			<div class="boxCentro">
				<div class="boxCentrado">
					<div class="menuHi"><a href="<?php echo(base_url('servicios') ); ?>">SERVICIOS</a></div><br />
					<?php
					foreach ($serviciosDB->servicios as $i=>$v) {
						?>
						<div class="menuLow"><a href="<?php echo(base_url('servicios/articulo/'.url_title($v->enlace) )); ?>"><?php echo($v->titulo); ?></a></div><br />
						<?php
					}
					?>
					<div id="menuPortafolio" class="menuHi"><a href="<?php echo(base_url('portafolio') ); ?>">PORTAFOLIO</a></div><br />
				</div>
			</div>
		</div>
		<!-- Add your site or application content here -->
        <main id="primaryContainer">
	        
			<div id="logo" class="mboxI">
				<a href="<?php echo(base_url()); ?>"><img src="<?php echo(base_url('assets/public/img/logo_inmotion.jpg')); ?>" /></a>
			</div>
			<div id="menu" class="mboxD">
				<div id="btnMenu"><i class="fas fa-bars"></i></div>
				<div class="redes">
					<?php
						foreach ($headerDB->redes as $i=>$v) {
						?>
							<div class="red">
								<a target="_blank" href="<?php echo($v->liga); ?>">
<!-- 									<object type="image/svg+xml" data="<?php echo( base_url('assets/public/img/'.$v->icono) ); ?>">SVG</object> -->
									<img src="<?php echo( base_url('assets/public/img/'.$v->icono) ); ?>" />
								</a>
							</div>
						<?php
						}
					?>
				</div>
			</div>










