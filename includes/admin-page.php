<?php

// Affichage dans la page
function mfwp_options_page() {
	// Chargement de la globale déclarée dans le fichier principal
	global $mfwp_options;

	ob_start(); ?>
	<!-- classe wrap présente dans le core WordPress -->
	<div class="wrap">
		<h2><?php _e('My First WordPress Plugin Options', 'my-first-wordpress-plugin'); ?></h2>
		<!-- form qui donne accès à la table d'options -->
		<form method="post" action="options.php">
			<!-- Liens vers le groupe d'option déjà enregistré -->
			<?php settings_fields('mfwp_settings_group'); ?>

				<!--
					les for , id et name doivent correspondre au nom utilisé dans register_setting
					suivi par des [] car  mfwp_settings est un array
					Il seront utilisé aussi des les input
				-->


			<!-- Option d'affichage -->

			<h4><?php _e('Enable', 'my-first-wordpress-plugin'); ?></h4>

			<p>

				<label class="description" for="mfwp_settings[enable]"><?php _e('Display the Follow Me on Twitter Link', 'my-first-wordpress-plugin'); ?></label>
				<!-- utilisation de checked pour vérifier l'état d'une case à cocher ou un bouton radio -->
				<!-- la value 1 est donnée pour avoir une valeur déclarée à comparer -->
				<input id="mfwp_settings[enable]" name="mfwp_settings[enable]" type="checkbox" value="1" <?php checked( 1, $mfwp_options['enable'] );?> />
			</p>


			<!-- Lien vers le compte Twitter -->

			<h4><?php _e('Twitter information', 'my-first-wordpress-plugin'); ?></h4>

			<p>
				<label class="description" for="mfwp_settings[twitter_url]"><?php _e('Enter your Twitter URL', 'my-first-wordpress-plugin'); ?></label>
				<input id="mfwp_settings[twitter_url]" name="mfwp_settings[twitter_url]" type="text" value="<?php echo $mfwp_options['twitter_url']; ?>" class="regular-text ltr"></input>

			</p>

			<p>

				<label class="description" for="mfwp_settings[twitter_name]"><?php _e('Enter your Twitter Name with @', 'my-first-wordpress-plugin'); ?></label>
				<input id="mfwp_settings[twitter_name]" name="mfwp_settings[twitter_name]" type="text" value="<?php echo $mfwp_options['twitter_name']; ?>"></input>

			</p>

			<p>

				<label class="description" for="mfwp_settings[twitter_bio]"><?php _e('Enter your short twitter bio', 'my-first-wordpress-plugin'); ?></label>
				<textarea id="mfwp_settings[twitter_bio]" class="widefat" name="mfwp_settings[twitter_bio]" rows="10" cols="3"><?php echo $mfwp_options['twitter_bio']; ?></textarea>

			</p>


			<!-- Theme  -->
			<h4><?php _e('Theme', 'my-first-wordpress-plugin'); ?></h4>
			<p>
				<?php $styles = array('blue', 'magenta', 'green'); ?>
				<select name="mfwp_settings[theme]" id="mfwp_settings[theme]">
					<?php foreach ($styles as $style) {	?>
						<?php
							// Afficher le menu selectionné avec opérateur ternaire
							// http://www.sitepoint.com/using-the-ternary-operator/
							$selected = $mfwp_options['theme'] == $style ? 'selected="selected"' : '';
						 ?>
						<option value="<?php echo $style; ?>" <?php echo $selected; ?>><?php echo $style; ?></option>
					<?php } ?>


				</select>

			</p>

			<!-- classe submit et button-primary présentent dans le core WordPress -->
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Save Options', 'my-first-wordpress-plugin'); ?>" />
			</p>


		</form>
	</div>
	<?php
	echo ob_get_clean();
}

// Déclaration de la page
function mfwp_add_options_link() {
	$name = __('My First Plugin', 'my-first-wordpress-plugin');
	add_options_page('My First WordPress Plugin Options', $name, 'manage_options', 'mfwp-options', 'mfwp_options_page');
}
add_action('admin_menu', 'mfwp_add_options_link');

// Enregistrement de l'option
function mfwp_register_settings() {
	// déclaration du groupe et de la clef "option_name" qui donnera "mfwp_settings" dans la base
	// cette clef "mfwp_settings" sera utilisée pour l'enregistrement des valeurs
	register_setting( 'mfwp_settings_group', 'mfwp_settings');
}
add_action('admin_init', 'mfwp_register_settings');
