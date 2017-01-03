<?php
/*
Template Name: Accueil
*/
?>
<?php get_header();?>
</header>

<?php

    $activites_intro = get_field('activites_intro');
    $activites = get_field('activites_une');

?>

<div class="">
	<div id="welcome" class="w66">
		<?php if (have_posts()) : ?>
		<h1>Bienvenue à la MJC La Duchère <em>!</em></h1>
		<?php while (have_posts()) : the_post();  ?>
		<?php the_content(); ?>
		<?php
        endwhile;
        endif;
        ?>
	</div>
	<aside id="next-events" class="w33">
		<?php get_sidebar('home'); ?>
	</aside>
	<div class="clear"></div>
</div>

	<?php
      // WP_Query posts_per_page does not work correctly with Sticky posts
      // As a workaround, request first the sticky posts, and if there's room,
      // non Sticky

      function displayPost() {
        ?>
        <div class="bloc actualite">
          <a href="<?php echo get_permalink(); ?>"></a>
          <span>Actualité</span>
          <div class="perm-content">
            <date><?php the_date('d F Y'); ?></date>
            <h4><a href="<?php echo get_permalink(); ?>" ><?php the_title(); ?></a></h4>
          </div>
          <div class="hover-content">
            <?php the_excerpt(); ?>
            <a class="more" href="<?php echo get_permalink(); ?>" >Voir l'article</a>
          </div>
          <div class="filtre"></div>
          <?php the_post_thumbnail('actualite-carre'); ?>
        </div>
        <?php
      }

      function displayPosts($query) {
        if ($query->have_posts()) {
          while ($query->have_posts()) {
            $query->the_post();
            displayPost();
          }
        }
      }

      $query = new WP_Query(
        array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'post__in' => get_option('sticky_posts'),
            'ignore_sticky_posts' => 1,
        )
      );

      displayPosts($query);

      if ($query->post_count < 3) {
        $n = 3 - $query->post_count;
        $query = new WP_Query(
          array(
              'post_type' => 'post',
              'posts_per_page' => $n,
              'ignore_sticky_posts' => 1,
              'post__not_in' => get_option( 'sticky_posts' )
          )
        );

        displayPosts($query);
      }
  ?>

	<div class="bloc social">
		<h2>S'inscrire à la newsletter</h2>
		<p><?php echo get_field('texte_newsletter', 'option'); ?></p>

		<?php echo do_shortcode('[contact-form-7 id="667" title="Inscription à la newsletter"]'); ?>

		<h2>Sur les réseaux sociaux</h2>
		<div class="btn-social">
			<a class="facebook-a"  target="blank" href="<?php echo get_field('facebook', 'option'); ?>"><span></span>La MJC</a><!--
			--><a class="facebook-b"  target="blank" href="<?php echo get_field('facebook_jeunes', 'option'); ?>"><span></span>Secteur jeunes</a><!--
			--><a class="youtube" target="blank" href="<?php echo get_field('youtube', 'option'); ?>"><span></span>Vidéos</a><!--
			--><a class="flickr"  target="blank" href="<?php echo get_field('flickr', 'option'); ?>"><span></span>Photos</a>
		</div>
	</div>
	<div class="activites-intro bloc">
		<h4>Nos activités</h4>
		<hr>
		<p><?php echo $activites_intro; ?></p>
		<a href="/activites" class="more">Voir toutes nos activités ></a>
	</div>

	<div class="bloc list-activites">
	<?php

    function closeDiv() {
      ?>
      </div>
      <div class="bloc list-activites">
      <?php
    }

    function displayActivity($a) {
      $types = get_the_terms($activite->ID, 'type');

      // Use only the first type
      $type = NULL;
      if (count($types) > 0) {
        $type = $types[0]->slug;
      }

      ?>
      <a href="<?php echo $a->guid; ?>" class="activite <?php echo $type; ?>">
        <span><?php echo $a->post_title; ?></span>
        <?php echo wp_get_attachment_image(get_post_thumbnail_id($a->ID), 'activite-carre'); ?>
      </a>
      <?php
    }

    $colors = array();
    $index = 0;

    if ($activites):
      foreach ($activites as $activite):

        if ($index > 0 && $index % 4 == 0) {
          // Close activities div, every 4 activities
          closeDiv();
        }

        setup_postdata($activite);
        displayActivity($activite);
        wp_reset_postdata();

        $index++;

      endforeach;
    endif;
  ?>
	</div>

<div class="clear"></div>

<?php get_footer();?>

</div><!-- page_wrap -->
