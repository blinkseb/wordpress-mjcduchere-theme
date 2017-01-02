<?php
/*
Template Name: Infos pratiques
*/
?>

<?php get_header();

$location = get_field('map');

?>

</header>

<section id="infos-pratiques">

<div id="carte-container">

	<div id="carte" style="width:100%; height:100%"></div>

</div>


<div class="content container">

	<div class="row">
		<div class="info col-xs-12 col-sm-6">
			<h2>Accueil</h2>
			<hr>
			<p><?php the_field('accueil'); ?></p>
		</div>

		<div class="info col-xs-12 col-sm-6">
			<h2>Accès</h2>
			<hr>
			<p><?php the_field('acces'); ?></p>
		</div>
	</div>

	<div class="row">

		<div class="info col-xs-12 col-sm-6">
			<h2>Accueil téléphonique</h2>
			<hr>
			<p><?php the_field('accueil_telephonique'); ?></p>
		</div>

		<div class="info col-xs-12 col-sm-6">
			<h2>Localisation</h2>
			<hr>
			<p><?php the_field('localisation'); ?></p>
		</div>

	</div>

</div>

<a target="blank" href="<?php echo "http://www.google.fr/maps/place/".$location['address']; ?>" id="toGmap">Voir sur Google maps</a>

</section>

<div class="clear"></div>

<script type="text/javascript">

function initMap() {

var styles = [
			  {
			    "stylers": [
			      { "saturation": -100 },
			      { "lightness": 37 }
			    ]
			  }
			];
var styledMap = new google.maps.StyledMapType(styles, {name: "Gmap stylée"});
var latlng = new google.maps.LatLng(<?php echo $location['lat']; ?>, <?php echo $location['lng']; ?>);
var center = new google.maps.LatLng(45.783719, 4.787938);

if (app.isPhone()) {
	center = latlng;
}

var options = {
	center: center,
	zoom: 16,
	disableDefaultUI: true,
	mapTypeId: google.maps.MapTypeId.ROADMAP,
	scrollwheel: false
};

var carte = new google.maps.Map(document.getElementById("carte"), options);

carte.mapTypes.set('map_style', styledMap);
carte.setMapTypeId('map_style');

var marker = new google.maps.Marker({
      position: latlng,
      map: carte,
      icon: '<?php echo get_template_directory_uri() . '/img/marker.png'; ?>'
  });
}
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhnvEWpGixT5r-tL7KiA_J9b9bPNLrCwc&callback=initMap" />

<?php get_footer(); ?>
