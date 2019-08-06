
<header id="header" class="mboxG">
	<div class="mboxC">
		<div id="keep_on">
			<img src="<?php echo(base_url('assets/public/img/keep_on.svg')) ?>" alt="Keep on' moving" />
		</div>
		<div id="direccion">
			<span class="tel">T: <a href="tel:5553938627">(55) 5393 8627</a></span>
			<span class="mail">M: <a href="mailto:info@inmotion.com.mx">info@inmotion.com.mx</a></span>
		</div>
	</div>
	<div class="mboxI"></div>
	<div class="mboxD"></div>
</header>


<section id="servicios" class="mboxG">
	<div class="mboxC">
		<h1 class="titulos"><?php echo($serviciosDB->titulo_general); ?></h1>
		<main class="row row-no-gutters">
			<?php
			foreach ($serviciosDB->servicios as $i=>$v) {
				?>
				<article class="col-12 col-sm-6 col-md-3">
					<div class="icono">
						<img src="<?php echo( base_url('assets/public/img/servicios/'.$v->icono) ); ?>" alt="servicio_icono_<?php echo($i); ?>" />
					</div>
					<h2 class="titulo"><?php echo($v->titulo); ?></h2>
					<div class="texto"><span><?php echo($v->texto); ?></span></div>
					<div class="enlace">
						<input type="button" onclick="window.location.href = '<?php echo(base_url('servicios/articulo/'.url_title($v->enlace) )); ?>'" value="ver más"></input>
					</div>
				</article>
				<?php
			}
			?>
		</main>
	</div>
	<div class="mboxI"></div>
	<div class="mboxD"></div>
</section>



<section id="clientes" class="mboxG">
	<div class="mboxC">
		<h1 class="titulos">NUESTROS CLIENTES<?php //echo($serviciosDB->titulo_general); ?></h1>
		<main class="row row-no-gutters">
			<div class="slideMain">
				<div class="slideItems">
				<?php
					$clientes = ['fox_sport.png', 'fox.png', 'national.png', 'adidas.png', 'kia.png', 'sports.png', 'lg.png', 'reyes.png', 'fox_sport.png', 'fox.png', 'national.png', 'adidas.png', 'kia.png', 'sports.png', 'lg.png', 'reyes.png'];
					
					$conteno = 0;
					foreach ($clientes as $i=>$v) {
						
						if($conteno <= 0){
							?>
							<div class="slideLine">
								<div class="logo">
									<img src="<?php echo( base_url('assets/public/img/clientes/'.$v) ); ?>" />
								</div>
							<?php
							$conteno++;
						} else if($conteno >= 3){
							?>
								<div class="logo">
									<img src="<?php echo( base_url('assets/public/img/clientes/'.$v) ); ?>" />
								</div>
							</div>
							<?php
							$conteno = 0;
						} else{
							?>
								<div class="logo">
									<img src="<?php echo( base_url('assets/public/img/clientes/'.$v) ); ?>" />
								</div>
							<?php
							$conteno++;
						}
						
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
		</main>
	</div>
	<div class="mboxI"></div>
	<div class="mboxD"></div>
</section>


<?php
$portafolioDB = new stdClass();
$portafolioDB->titulo_general = 'PORTAFOLIO';
$portafolioDB->portafolios = [];

$valor = new stdClass();
$valor->fondo = 'summit_2019_fondo.jpg';
$valor->titulo = 'SPORTS ANTI-PIRACY<br />SUMMIT 2019';
$valor->enlace = 'anti_piracy_summit_2019';
$portafolioDB->portafolios[] = $valor;

$valor = new stdClass();
$valor->fondo = 'national_fondo.jpg';
$valor->titulo = 'NATIONAL<br />GEOGRAPHIC';
$valor->enlace = 'national_geographic';
$portafolioDB->portafolios[] = $valor;

$valor = new stdClass();
$valor->fondo = 'toyota_fondo.jpg';
$valor->titulo = 'TOYOTA';
$valor->enlace = 'toyota';
$portafolioDB->portafolios[] = $valor;
?>
<section id="portafolios" class="mboxG">
	<div class="mboxC">
		<h1 class="titulos"><?php echo($portafolioDB->titulo_general); ?></h1>
		<main class="">
			<?php
			foreach ($portafolioDB->portafolios as $i=>$v) {
				?>
				<article class="boxMainPortafolio" style="background-image: url(<?php echo( base_url('assets/public/img/portafolios/'.$v->fondo) ); ?>);">
					<h2 class="titulo">
						<?php echo($v->titulo); ?>
					</h2>
					<div class="enlace">
						<input type="button" onclick="window.location.href = '<?php echo(base_url('portafolio/articulo/'.url_title($v->enlace) )); ?>'" value="ver más"></input>
					</div>
				</article>
				<?php
			}
			?>
			<input id="btnMasPortafolios" type="button" onclick="window.location.href = '<?php echo(base_url('portafolio/')); ?>'" value="ver más"></input>
<!-- 			<div id="btnMasPortafolios">ver más</div> -->
		</main>
	</div>
	<div class="mboxI"></div>
	<div class="mboxD"></div>
</section>



<?php
$nosotrosDB = new stdClass();
$nosotrosDB->titulo_general = 'NOSOTROS';
$nosotrosDB->team = [];

$valor = new stdClass();
$valor->foto = 'hombre1.jpg';
$valor->color = '#a1c6b4';
$valor->nombre = 'Hombre';
$valor->apellido = 'Uno';
$valor->cargo = 'Puesto';
$nosotrosDB->team[] = $valor;

$valor = new stdClass();
$valor->foto = 'maria.jpg';
$valor->color = '#fcf5b5';
$valor->nombre = 'Maria';
$valor->apellido = 'Pérez';
$valor->cargo = 'Director Creativo';
$nosotrosDB->team[] = $valor;

$valor = new stdClass();
$valor->foto = 'hombre2.jpg';
$valor->color = '#cf746b';
$valor->nombre = 'Hombre';
$valor->apellido = 'Dos';
$valor->cargo = 'Puesto';
$nosotrosDB->team[] = $valor;

$valor = new stdClass();
$valor->foto = 'mujer2.jpg';
$valor->color = '#f1d25f';
$valor->nombre = 'Mujer';
$valor->apellido = 'Dos';
$valor->cargo = 'Puesto';
$nosotrosDB->team[] = $valor;

$valor = new stdClass();
$valor->foto = 'hombre3.jpg';
$valor->color = '#b6d0b3';
$valor->nombre = 'Hombre';
$valor->apellido = 'Tres';
$valor->cargo = 'Puesto';
$nosotrosDB->team[] = $valor;
?>
<section id="nosotros" class="mboxG">
	<div class="mboxC">
		<h1 class="titulos"><?php echo($nosotrosDB->titulo_general); ?></h1>
		<main class="row row-no-gutters">
			<div class="slideMain">
				<div class="slideItems">
				<?php
					$conteno = 0;
					foreach ($nosotrosDB->team as $i=>$v) {
					?>
						<article class="item" style="background-image: url(<?php echo( base_url('assets/public/img/nosotros/'.$v->foto) ); ?>); background-color: <?php echo($v->color); ?>">
							<div class="persona">
								<span class="nombre"><?php echo($v->nombre ); ?></span>
								<span class="apellido"><?php echo($v->apellido ); ?></span>
								<span class="cargo"><?php echo($v->cargo ); ?></span>
							</div>
						</article>
					<?php
					}
				?>
				</div>
				<div class="mboxD_in">
					<div class="btnSlideBack">
						<img src="<?php echo( base_url('assets/public/img/btnSlideNaranjaBack.jpg') ); ?>" />
					</div>
					<div class="btnSlideNext">
						<img src="<?php echo( base_url('assets/public/img/btnSlideNaranjaNext.jpg') ); ?>" />
					</div>
				</div>
			</div>
		</main>
	</div>
	<div class="mboxI"></div>
	<div class="mboxD"></div>
</section>



















