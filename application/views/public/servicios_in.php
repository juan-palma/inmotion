<?php
/*
$articuloDB = new stdClass();
$articuloDB->titulo_general = 'EVENTS';

//Video Head
$articuloDB->video = new stdClass();
$articuloDB->video->poster = base_url('assets/public/img/servicios/servicios_in_nombreevento_video_portada.jpg');
/*
$articuloDB->video->webm = 'http://thenewcode.com/assets/videos/polina.webm';
$articuloDB->video->mp4 = 'http://thenewcode.com/assets/videos/polina.mp4';


$articuloDB = new stdClass();


//Bloques
$articuloDB->bloques = [];

$valor = new stdClass();
$valor->fondo = 'servicios_arte_fondo.svg';
$valor->valores = [];
	$vin = new stdClass();
	$vin->titulo = '<span class="fLight">EXPERIENTAL</span><br />MARKETING';
	$vin->texto = 'Sabemos que hoy no es suficiente llevar el mensaje al consumidor si no envolverlo en una experiencia única y memorable: experiential marketing.';
	$valor->valores[] = $vin;
$articuloDB->bloques[] = $valor;


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

$articuloDB->bloques[] = $valor;


//Informes
$articuloDB->informes_fondo = 'toyota_fondo_informes.jpg';
$articuloDB->informes = [];

$valor = new stdClass();
$valor->icono = 'toyota_info_icono1.png';
$valor->titulo = '+15K';
$valor->texto = 'ASISTENTES	';
$articuloDB->informes[] = $valor;

$valor = new stdClass();
$valor->icono = 'toyota_info_icono2.png';
$valor->titulo = '$4,7 M';
$valor->texto = 'VALOR EN COBERTURA DE MEDIOS';
$articuloDB->informes[] = $valor;

$valor = new stdClass();
$valor->icono = 'toyota_info_icono3.png';
$valor->titulo = '+35';
$valor->texto = 'PAÍSES';
$articuloDB->informes[] = $valor;

$valor = new stdClass();
$valor->icono = 'toyota_info_icono4.png';
$valor->titulo = '+80';
$valor->texto = 'MEDIOS';
$articuloDB->informes[] = $valor;


//Clientes
$articuloDB->clientes = [];

$valor = new stdClass();
$valor->logo = 'logo_kia.svg';
$valor->fondo = 'logo_kia_fondo.jpg';
$articuloDB->clientes[] = $valor;

$valor = new stdClass();
$valor->logo = 'logo_natgio_kids.svg';
$valor->fondo = 'logo_natgio_kids_fondo.jpg';
$articuloDB->clientes[] = $valor;

$valor = new stdClass();
$valor->logo = 'logo_fox_sport.svg';
$valor->fondo = 'logo_fox_sport_fondo.jpg';
$articuloDB->clientes[] = $valor;

$valor = new stdClass();
$valor->logo = 'logo_natgio_kids.svg';
$valor->fondo = 'logo_natgio_kids_fondo.jpg';
$articuloDB->clientes[] = $valor;
*/

?>
<section id="servicios_video" class="mboxG">
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

		
<section id="servicios_main" class="mboxG">
	<div class="mboxC">	
		<main class="row row-no-gutters">
			<article>
			<?php
			foreach ($articuloDB->bloques as $i=>$v) {
				?>
				<div class="bloque" style="background-image: url(<?php echo( base_url('assets/public/img/servicios/registros/'.@$v->fondo) ); ?>);">
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
			?>
			</article>
		</main>
	</div>
	<div class="mboxI"></div>
	<div class="mboxD"></div>
</section>

<?php
	if(property_exists($articuloDB, "galeria") && count($articuloDB->galeria) > 0){
?>
	<section id="servicios_galeria" class="mboxG">
		<div class="mboxC">	
			<main class="">
				<article>
					<div class="bloqueInfo">
						<?php
						if($articuloDB->galeria_titulo1 !== ''){
							?>
							<div class="bl v1">
								<div class="box">
									<div class="titulo">
										<?php echo(@$articuloDB->galeria_titulo1); ?>
									</div>
									<div class="texto">
										<?php echo(@$articuloDB->galeria_texto1); ?>
									</div>
								</div>
							</div>
							<?php
						}
						?>
					
					</div>
					<div class="slideMain">
						<div class="slideItems">
						<?php
						foreach ($articuloDB->galeria as $i=>$v) {
							?>
							<div class="bloque-falso">
								<div class="bloque" style="background-image: url(<?php echo( base_url('assets/public/img/servicios/registros/'.@$v->foto) ); ?>);">
									
								</div>
							</div>
							<?php
						}
						?>
						</div>
					</div>
					<div class="mboxD_in">
						<div class="btnSlideNext">
							<img src="<?php echo( base_url('assets/public/img/btnSlideBlancoNext.jpg') ); ?>" />
						</div>
						<div class="btnSlideBack">
							<img src="<?php echo( base_url('assets/public/img/btnSlideBlancoBack.jpg') ); ?>" />
						</div>
					</div>
				</article>
			</main>
		</div>
		<div class="mboxI"></div>
		<div class="mboxD"></div>
	</section>
<?php
	}
?>
