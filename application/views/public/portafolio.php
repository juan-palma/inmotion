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
		<main class="">
			<div class="slideMain">
				<div class="slideItems">
				<?php
				foreach ($portafolioDB->portafolios as $i=>$v) {
					?>
					<article class="item" style="background-image: url(<?php echo( base_url('assets/public/img/portafolios/'.$v->fondo) ); ?>);">
						<div class="centro">
							<div class="noMargin"></div>
							<h2 class="titulo">
								<?php echo($v->titulo); ?>
							</h2>
							<div class="enlace">
								<input type="button" onclick="window.location.href = '<?php echo(base_url('portafolio/articulo/'.url_title($v->enlace) )); ?>'" value="ver más"></input>
							</div>
						</div>
					</article>
					<?php
				}
				?>
				</div>
			</div>
		</main>
	</div>
	<div class="mboxI"></div>
	<div class="mboxD_in">
		<div id="navSlide">
			<div class="centro">
			<?php
				foreach ($portafolioDB->portafolios as $i=>$v) {
					?>
					<div class="nBox">
						<div class="text"><?php echo($v->titulo); ?></div>
						<div class="circulo"></div>
						<div class="line"></div>
					</div>
					<?php
				}
			?>
			</div>
		</div>
	</div>
</section>