<?php
$servicios_inDB = new stdClass();
$servicios_inDB->titulo_general = 'EVENTS';

//Video Head
$servicios_inDB->video = new stdClass();
$servicios_inDB->video->poster = base_url('assets/public/img/servicios/servicios_in_nombreevento_video_portada.jpg');
/*
$servicios_inDB->video->webm = 'http://thenewcode.com/assets/videos/polina.webm';
$servicios_inDB->video->mp4 = 'http://thenewcode.com/assets/videos/polina.mp4';
*/

$servicios_inDB->contenido = new stdClass();


//Bloques
$servicios_inDB->contenido->bloques = [];

$valor = new stdClass();
$valor->fondo = 'servicios_arte_fondo.svg';
$valor->valores = [];
	$vin = new stdClass();
	$vin->titulo = '<span class="fLight">EXPERIENTAL</span><br />MARKETING';
	$vin->texto = 'Sabemos que hoy no es suficiente llevar el mensaje al consumidor si no envolverlo en una experiencia única y memorable: experiential marketing.';
	$valor->valores[] = $vin;
$servicios_inDB->contenido->bloques[] = $valor;


$valor = new stdClass();
$valor->fondo = 'servicios_bl2.jpg';
$valor->valores = [];
	$vin = new stdClass();
	$vin->titulo = 'SERVICIOS';
	$vin->texto = 'Cada marca tiene necesidades diferentes y nuestro método nos permite reaccionar a cada caso de forma dinámica.';
	$valor->valores[] = $vin;
	
/*
	$vin = new stdClass();
	$vin->titulo = 'PRODUCCIÓN';
	$vin->texto = 'TEXTO_BLOQUE_2';
	$valor->valores[] = $vin;
*/
$servicios_inDB->contenido->bloques[] = $valor;


//Informes
$servicios_inDB->contenido->informes_fondo = 'toyota_fondo_informes.jpg';
$servicios_inDB->contenido->informes = [];

$valor = new stdClass();
$valor->icono = 'toyota_info_icono1.png';
$valor->titulo = '+15K';
$valor->texto = 'ASISTENTES	';
$servicios_inDB->contenido->informes[] = $valor;

$valor = new stdClass();
$valor->icono = 'toyota_info_icono2.png';
$valor->titulo = '$4,7 M';
$valor->texto = 'VALOR EN COBERTURA DE MEDIOS';
$servicios_inDB->contenido->informes[] = $valor;

$valor = new stdClass();
$valor->icono = 'toyota_info_icono3.png';
$valor->titulo = '+35';
$valor->texto = 'PAÍSES';
$servicios_inDB->contenido->informes[] = $valor;

$valor = new stdClass();
$valor->icono = 'toyota_info_icono4.png';
$valor->titulo = '+80';
$valor->texto = 'MEDIOS';
$servicios_inDB->contenido->informes[] = $valor;


//Clientes
$servicios_inDB->contenido->clientes = [];

$valor = new stdClass();
$valor->logo = 'logo_kia.svg';
$valor->fondo = 'logo_kia_fondo.jpg';
$servicios_inDB->contenido->clientes[] = $valor;

$valor = new stdClass();
$valor->logo = 'logo_natgio_kids.svg';
$valor->fondo = 'logo_natgio_kids_fondo.jpg';
$servicios_inDB->contenido->clientes[] = $valor;

$valor = new stdClass();
$valor->logo = 'logo_fox_sport.svg';
$valor->fondo = 'logo_fox_sport_fondo.jpg';
$servicios_inDB->contenido->clientes[] = $valor;

$valor = new stdClass();
$valor->logo = 'logo_natgio_kids.svg';
$valor->fondo = 'logo_natgio_kids_fondo.jpg';
$servicios_inDB->contenido->clientes[] = $valor;


?>
<section id="servicios_video" class="mboxG">
	<div class="mboxC">
		<div class="video">
<!-- 			<video poster="" id="bgvid" playsinline autoplay muted loop> -->
			<video class="stopfade" poster="<?php echo($servicios_inDB->video->poster); ?>" id="bgvid" loop>
				<?php
					if(isset($servicios_inDB->video->webm)){
					?>
					<source src="<?php echo($servicios_inDB->video->webm); ?>" type="video/webm">
					<?php	
					}
				?>
				<?php
					if(isset($servicios_inDB->video->mp4)){
					?>
					<source src="<?php echo($servicios_inDB->video->mp4); ?>" type="video/mp4">
					<?php	
					}
				?>
			</video>
			<div class="centro">
				<div class="centrado">
					<h2>SERVICIOS //</h2>
					<h1 class="titulos"><?php echo($servicios_inDB->titulo_general); ?></h1>
				</div>
				<div class="btnPlay"><i class="far fa-play-circle"></i></div>
				<div class="btnPlayPause dnone op0"><i class="fas fa-pause"></i></div>
			</div>
			
		</div>
	</div>
	<div class="mboxI"></div>
	<div class="mboxD"></div>
</section>

		
<section id="servicios_main" class="mboxG">
	<div class="mboxC">	
		<main class="row row-no-gutters">
			<article>
			<?php
			foreach ($servicios_inDB->contenido->bloques as $i=>$v) {
				?>
				<div class="bloque" style="background-image: url(<?php echo( base_url('assets/public/img/servicios/'.@$v->fondo) ); ?>);">
					<?php
					foreach ($v->valores as $i2=>$v2) {
						?>
						<div class="bl v<?php echo($i2+1); ?>">
							<div class="box">
								<div class="titulo">
									<?php echo($v2->titulo); ?>
								</div>
								<div class="texto">
									<?php echo($v2->texto); ?>
								</div>
							</div>
						</div>
						<?php
					}
					?>
				</div>
				<?php
			}
			?>
			</article>
		</main>
	</div>
	<div class="mboxI"></div>
	<div class="mboxD"></div>
</section>

