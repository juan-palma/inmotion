<?php
$portafolio_inDB = new stdClass();
$portafolio_inDB->titulo_general = 'TOYOTA';

//Video Head
$portafolio_inDB->video = new stdClass();
$portafolio_inDB->video->poster = base_url('assets/public/img/portafolios/porta_in_nombreevento_video_portada.jpg');
/*
$portafolio_inDB->video->webm = 'http://thenewcode.com/assets/videos/polina.webm';
$portafolio_inDB->video->mp4 = 'http://thenewcode.com/assets/videos/polina.mp4';
*/

$portafolio_inDB->contenido = new stdClass();


//Bloques
$portafolio_inDB->contenido->bloques = [];

$valor = new stdClass();
$valor->fondo = 'toyota_fondo_bl1.jpg';
$valor->valores = [];
	$vin = new stdClass();
	$vin->titulo = '<span class="fLight">CONFERENCIA DE PRENSA</span><br />TOYOTA-LA LIGA';
	$vin->texto = '<span class="cNaranja">TOYOTA</span> en conjunto con <span class="cNaranja">LALIGA</span>, dieron una conferencia de presa donde develar sus autos: RAV4 y CAMRY HÍDRIDO. Se dieron ciertas figuras importantes del fútbol para hablar  de los que viene en temas deportivos.';
	$valor->valores[] = $vin;
$portafolio_inDB->contenido->bloques[] = $valor;


$valor = new stdClass();
$valor->fondo = 'toyota_fondo_bl2.jpg';
$valor->valores = [];
	$vin = new stdClass();
	$vin->titulo = 'DISEÑO';
	$vin->texto = 'Diseñamos la experiencia integral para el evento desde layout, hasta los pequeños detalles.';
	$valor->valores[] = $vin;
	
	$vin = new stdClass();
	$vin->titulo = 'PRODUCCIÓN';
	$vin->texto = 'Diseñamos la experiencia integral para el evento desde layout, hasta los pequeños detalles.';
	$valor->valores[] = $vin;
$portafolio_inDB->contenido->bloques[] = $valor;


//Informes
$portafolio_inDB->contenido->informes_fondo = 'toyota_fondo_informes.jpg';
$portafolio_inDB->contenido->informes = [];

$valor = new stdClass();
$valor->icono = 'toyota_info_icono1.png';
$valor->titulo = '+15K';
$valor->texto = 'ASISTENTES	';
$portafolio_inDB->contenido->informes[] = $valor;

$valor = new stdClass();
$valor->icono = 'toyota_info_icono2.png';
$valor->titulo = '$4,7 M';
$valor->texto = 'VALOR EN COBERTURA DE MEDIOS';
$portafolio_inDB->contenido->informes[] = $valor;

$valor = new stdClass();
$valor->icono = 'toyota_info_icono3.png';
$valor->titulo = '+35';
$valor->texto = 'PAÍSES';
$portafolio_inDB->contenido->informes[] = $valor;

$valor = new stdClass();
$valor->icono = 'toyota_info_icono4.png';
$valor->titulo = '+80';
$valor->texto = 'MEDIOS';
$portafolio_inDB->contenido->informes[] = $valor;


//Clientes
$portafolio_inDB->contenido->clientes = [];

$valor = new stdClass();
$valor->logo = 'logo_kia.svg';
$valor->fondo = 'logo_kia_fondo.jpg';
$portafolio_inDB->contenido->clientes[] = $valor;

$valor = new stdClass();
$valor->logo = 'logo_natgio_kids.svg';
$valor->fondo = 'logo_natgio_kids_fondo.jpg';
$portafolio_inDB->contenido->clientes[] = $valor;

$valor = new stdClass();
$valor->logo = 'logo_fox_sport.svg';
$valor->fondo = 'logo_fox_sport_fondo.jpg';
$portafolio_inDB->contenido->clientes[] = $valor;

$valor = new stdClass();
$valor->logo = 'logo_natgio_kids.svg';
$valor->fondo = 'logo_natgio_kids_fondo.jpg';
$portafolio_inDB->contenido->clientes[] = $valor;


?>
<section id="portafolio_video" class="mboxG">
	<div class="mboxC">
		<div class="video">
<!-- 			<video poster="" id="bgvid" playsinline autoplay muted loop> -->
			<video class="stopfade" poster="<?php echo($portafolio_inDB->video->poster); ?>" id="bgvid" loop>
				<?php
					if(isset($portafolio_inDB->video->webm)){
					?>
					<source src="<?php echo($portafolio_inDB->video->webm); ?>" type="video/webm">
					<?php	
					}
				?>
				<?php
					if(isset($portafolio_inDB->video->mp4)){
					?>
					<source src="<?php echo($portafolio_inDB->video->mp4); ?>" type="video/mp4">
					<?php	
					}
				?>
			</video>
			<div class="centro">
				<div class="centrado">
					<h2>PORTAFOLIO //</h2>
					<h1 class="titulos"><?php echo($portafolio_inDB->titulo_general); ?></h1>
				</div>
				<div class="btnPlay"><i class="far fa-play-circle"></i></div>
				<div class="btnPlayPause dnone op0"><i class="fas fa-pause"></i></div>
			</div>
			
		</div>
	</div>
	<div class="mboxI"></div>
	<div class="mboxD"></div>
</section>

		
<section id="portafolio_main" class="mboxG">
	<div class="mboxC">	
		<main class="row row-no-gutters">
			<article>
			<?php
			foreach ($portafolio_inDB->contenido->bloques as $i=>$v) {
				?>
				<div class="bloque" style="background-image: url(<?php echo( base_url('assets/public/img/portafolios/'.@$v->fondo) ); ?>);">
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
			
			if(count($portafolio_inDB->contenido->informes) > 0 ){
				?>
				<div class="bloque informes" style="background-image: url(<?php echo( base_url('assets/public/img/portafolios/'.@$portafolio_inDB->contenido->informes_fondo) ); ?>);">
					<div class="bloqueInformes">
						<div class="row row-no-gutters">
						<?php
						foreach ($portafolio_inDB->contenido->informes as $i=>$v) {
							?>
							<div class="col-12 col-sm-6 col-md-3">
								<div class="icono">
									<img src="<?php echo( base_url('assets/public/img/portafolios/'.$v->icono) ); ?>" alt="portafolio_icono_<?php echo($i); ?>" />
								</div>
								<h2 class="titulo"><?php echo($v->titulo); ?></h2>
								<div class="texto"><span><?php echo($v->texto); ?></span></div>
							</div>
							<?php
						}
						?>
						</div>
					</div>
						<?php
				}
				
					?>
					<div class="slideMain">
						<div class="slideItems">
						<?php
						foreach ($portafolio_inDB->contenido->clientes as $i=>$v) {
							?>
							<div class="logo" style="background-image: url(<?php echo( base_url('assets/public/img/portafolios/'.@$v->fondo) ); ?>);">
								<img src="<?php echo( base_url('assets/public/img/portafolios/'.$v->logo) ); ?>" />
							</div>
							<?php
						}
						?>
						</div>
						<div class="mboxD_in">
							<div class="btnSlideNext">
								<img src="<?php echo( base_url('assets/public/img/btnSlideBlancoNext.jpg') ); ?>" />
							</div>
							<div class="btnSlideBack">
								<img src="<?php echo( base_url('assets/public/img/btnSlideBlancoBack.jpg') ); ?>" />
							</div>
						</div>
					</div>
				</div>
			
			
			</article>
		</main>
	</div>
	<div class="mboxI"></div>
	<div class="mboxD"></div>
</section>

