<?php
/*
Template Name: Activités
*/
?>

<?php get_header(); ?>

<h1>Activités</h1>


</header>

<nav class="sous-nav sous-nav-activites">
	<ul>
		<li><a class="tab on" data-typ="desc" href= "">Description</a></li>
		<li><a class="tab" data-typ="infos" href= "">Tarifs et horaires</a></li>
		<li><a class="tab" data-typ="photos" href= "">Photos</a></li>
		<li><a class="tab" data-typ="inscription" href= "">Comment s'inscrire</a></li>
	</ul>
</nav>


<aside id="filtres">

<?php get_sidebar('activites'); ?>

</aside>



<section id="desc" class="onglet onglet-activite on">

	<h2>Lorem ipsum</h2>

	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

</section>




<section id="infos" class="onglet onglet-activite ">

	<h2>Tarifs et horaires</h2>

	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

</section>



<section id="photos" class="onglet onglet-activite ">

	<h2>Tarifs et horaires</h2>

	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

</section>



<section id="inscription" class="onglet onglet-activite ">

	<h2>Tarifs et horaires</h2>

	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

</section>


<aside id="cplt">
	<div class="img">
		<img src="<?php bloginfo('template_directory'); ?>/img/equipe.jpg" alt=""/>
	</div>

	<h3>Titre</h3>

	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

</aside>

<div class="clear"></div>


<?php get_footer(); ?>