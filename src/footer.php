<footer class="w100">

	<div class="logo">
		<img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="logo MJC la Duchère" />
		<a href="http://www.lagonette.org/"><img src="<?php bloginfo('template_directory'); ?>/img/tampon-gonette.png" alt="Nous acceptons les gonettes !" /></a>
	</div>

	<div class="infos">
		<div class="info">
			<h4>Plan du site</h4>
			<?php wp_nav_menu(array( 'theme_location'  => '', 'menu' => 'menu-footer')); ?>
		</div>

		<div class="info">
			<h4>Où sommes nous ?</h4>
			<address>
				<?php echo get_field('adresse', 'option'); ?>
			</address>
		</div>

		<div class="info">
			<h4>Sur les réseaux sociaux</h4>
			<div class="btn-social">
				<a class="facebook-a" target="blank" href="<?php echo get_field('facebook', 'option'); ?>"><span></span>La mjc</a>
				<a class="facebook-b" target="blank" href="<?php echo get_field('facebook_jeunes', 'option'); ?>"><span></span>Secteur jeunes</a>
				<a class="youtube" target="blank" href="<?php echo get_field('youtube', 'option'); ?>"><span></span>Vidéos</a>
				<a class="flickr" target="blank" href="<?php echo get_field('flickr', 'option'); ?>"><span></span>Photos</a>
			</div>
		</div>

		<div class="info" id="partenaires">
			<h4>Nos partenaires</h4>

		<?php if (have_rows('partenaires', 'option')) : ?>

			<?php while (have_rows('partenaires', 'option')) : the_row(); ?>

				<?php if (get_row_layout() == 'partenaire') :
                $logo = wp_get_attachment_image_src(get_sub_field('logo'), 'activite-carre');
                ?>

				<img src="<?php echo $logo[0]; ?>" alt=""/>

				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>

		</div>

		<div class="clear"></div>

	</div>

	<div class="form">

	<h4>Nous Contacter</h4>

	<?php echo do_shortcode('[contact-form-7 id="99" title="Formulaire de contact"]'); ?>

	</div>

	<address class="infos-mobile"><?php echo get_field('adresse', 'option'); ?></address>

	<div class="clear"></div>

	<div class="under-footer"><p>2017 - MJC Duchère - Tous droits réservés</p></div>

</footer>

</div> <!-- /page_wrap -->

<?php wp_footer(); ?>
</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-30864926-3', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>
