<h2 class="[ color-primary-dark ][ text-center ]">Costo de entrega</h2>
<div class="[ row ]">
	<div class="[ col s12 m4 offset-m2 ]">
		<!-- map -->
		<?php include (TEMPLATEPATH . '/sections/map-svg.php'); ?>	
		
	</div>
	<div class="[ col s12 m4 ]">
		<table class="price-zone">
			<thead>
				<tr>
					<th>Zona</th>
					<th>Precio</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><span class="block-color-precio bajo"></span></td>
					<td>
						<?php 
							$term = get_term_by('slug', 'bajo', 'precio'); 
							$price_bajo = $term->description; 
							echo $price_bajo; 
						?>
					</td>
				</tr>
				<tr>
					<td><span class="block-color-precio medio"></span></td>
					<td>
						<?php 
							$term = get_term_by('slug', 'medio', 'precio'); 
							$price_medio = $term->description; 
							echo $price_medio; 
						?>
					</td>
				</tr>
				<tr>
					<td><span class="block-color-precio alto"></span></td>
					<td>
						<?php 
							$term = get_term_by('slug', 'alto', 'precio'); 
							$price_alto = $term->description; 
							echo $price_alto; 
						?>
					</td>
				</tr>
				<tr>
					<td><span class="block-color-precio cotizar"></span></td>
					<td>
						<?php 
							$term = get_term_by('slug', 'a-cotizar', 'precio'); 
							$price_cotizar = $term->description; 
							echo $price_cotizar; 
						?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>