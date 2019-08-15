<?php
/*
$articuloDB = new stdClass();
$articuloDB->titulo_general = 'TOYOTA';

//Video Head
$articuloDB->video = new stdClass();
$articuloDB->video->poster = base_url('assets/public/img/portafolios/porta_in_nombreevento_video_portada.jpg');

$articuloDB->video->webm = 'http://thenewcode.com/assets/videos/polina.webm';
$articuloDB->video->mp4 = 'http://thenewcode.com/assets/videos/polina.mp4';


$articuloDB->contenido = new stdClass();


//Bloques
$articuloDB->contenido->bloques = [];

$valor = new stdClass();
$valor->fondo = 'toyota_fondo_bl1.jpg';
$valor->valores = [];
	$vin = new stdClass();
	$vin->titulo = '<span class="fLight">CONFERENCIA DE PRENSA</span><br />TOYOTA-LA LIGA';
	$vin->texto = '<span class="cNaranja">TOYOTA</span> en conjunto con <span class="cNaranja">LALIGA</span>, dieron una conferencia de presa donde develar sus autos: RAV4 y CAMRY HÍDRIDO. Se dieron ciertas figuras importantes del fútbol para hablar  de los que viene en temas deportivos.';
	$valor->valores[] = $vin;
$articuloDB->contenido->bloques[] = $valor;


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
$articuloDB->contenido->bloques[] = $valor;


//Informes
$articuloDB->contenido->informes_fondo = 'toyota_fondo_informes.jpg';
$articuloDB->contenido->informes = [];

$valor = new stdClass();
$valor->icono = 'toyota_info_icono1.png';
$valor->titulo = '+15K';
$valor->texto = 'ASISTENTES	';
$articuloDB->contenido->informes[] = $valor;

$valor = new stdClass();
$valor->icono = 'toyota_info_icono2.png';
$valor->titulo = '$4,7 M';
$valor->texto = 'VALOR EN COBERTURA DE MEDIOS';
$articuloDB->contenido->informes[] = $valor;

$valor = new stdClass();
$valor->icono = 'toyota_info_icono3.png';
$valor->titulo = '+35';
$valor->texto = 'PAÍSES';
$articuloDB->contenido->informes[] = $valor;

$valor = new stdClass();
$valor->icono = 'toyota_info_icono4.png';
$valor->titulo = '+80';
$valor->texto = 'MEDIOS';
$articuloDB->contenido->informes[] = $valor;


//Clientes
$articuloDB->contenido->clientes = [];

$valor = new stdClass();
$valor->logo = 'logo_kia.svg';
$valor->fondo = 'logo_kia_fondo.jpg';
$articuloDB->contenido->clientes[] = $valor;

$valor = new stdClass();
$valor->logo = 'logo_natgio_kids.svg';
$valor->fondo = 'logo_natgio_kids_fondo.jpg';
$articuloDB->contenido->clientes[] = $valor;

$valor = new stdClass();
$valor->logo = 'logo_fox_sport.svg';
$valor->fondo = 'logo_fox_sport_fondo.jpg';
$articuloDB->contenido->clientes[] = $valor;

$valor = new stdClass();
$valor->logo = 'logo_natgio_kids.svg';
$valor->fondo = 'logo_natgio_kids_fondo.jpg';
$articuloDB->contenido->clientes[] = $valor;
*/


?>
<section id="portafolio_video" class="mboxG">
	<div class="mboxC">
		<div class="video">
			<div class="iframe-container">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo($articuloDB->video); ?>?rel=0&controls=0&disablekb=1&showinfo=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
			foreach ($articuloDB->bloques as $i=>$v) {
				?>
				<div class="bloque" style="background-image: url(<?php echo( base_url('assets/public/img/portafolios/registros/'.@$v->fondo) ); ?>);">
					<?php
					if($v->titulo1 !== ''){
						?>
						<div class="bl v1">
							<div class="box">
								<div class="titulo">
									<?php echo($v->titulo1); ?>
								</div>
								<div class="texto">
									<?php echo($v->texto1); ?>
								</div>
							</div>
						</div>
						<?php
					}
					
					if($v->titulo2 !== ''){
						?>
						<div class="bl v2">
							<div class="box">
								<div class="titulo">
									<?php echo($v->titulo2); ?>
								</div>
								<div class="texto">
									<?php echo($v->texto2); ?>
								</div>
							</div>
						</div>
						<?php
					}
					?>
				</div>
				<?php
			}
			
			if(count($articuloDB->informes) > 0 ){
				?>
				<div class="bloque informes" style="background-image: url(<?php echo( base_url('assets/public/img/portafolios/registros/'.@$articuloDB->informes_fondo) ); ?>);">
					<div class="bloqueInformes">
						<div class="row row-no-gutters">
						<?php
						foreach ($articuloDB->informes as $i=>$v) {
							?>
							<div class="col-12 col-sm-6 col-md-3">
								<div class="icono">
									<img src="<?php echo( base_url('assets/public/img/portafolios/registros/'.$v->icono) ); ?>" alt="portafolio_icono_<?php echo($i); ?>" />
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
						foreach ($articuloDB->logos as $i=>$v) {
							?>
							<div class="logo" style="background-image: url(<?php echo( base_url('assets/public/img/portafolios/registros/'.@$v->fondo) ); ?>);">
								<img src="<?php echo( base_url('assets/public/img/portafolios/registros/'.$v->logo) ); ?>" />
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

