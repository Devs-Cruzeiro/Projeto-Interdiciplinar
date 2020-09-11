<?php get_header(); ?>
<main>
	<div class="container mt-5">
		<div class="row">
			<?php
				if(have_posts()):
					while(have_posts()): the_post();
						?>
							<article>
								<h3><?php the_title(); ?></h3>
								<div><?php the_content(); ?></div>
							</article>
						<?php
					endwhile;
				else:
					//echo 'Sem conteudo';
				endif;
			?>
		</div>
	</div>
</main>
<?php get_footer(); ?>