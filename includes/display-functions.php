<?php

/*our display functions for outputting information*/

function mfwp_add_content($content) {
	// récupération de la valeur déclarée en global
	global $mfwp_options;

	// Deux conditions: templating et case à cocher pour unable (fichier admin-page.php)
	if(is_singular() && $mfwp_options["enable"] == true ) {
		// affichage des contenus avec un nettoyage au dernier moment
		$extra_content = sprintf('<p class="twitter-message %s">Follow <a href="%s" target="_blank">%s</a> on Twitter:<br>%s</p>', $mfwp_options["theme"], esc_url($mfwp_options["twitter_url"]), esc_html($mfwp_options["twitter_name"]), wp_kses_post($mfwp_options["twitter_bio"]) );
		$content .= $extra_content;
	}
	// dans un filtre le contenu est toujours retourné
	return $content;
}
add_filter('the_content', 'mfwp_add_content');