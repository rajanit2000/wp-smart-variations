<?php
/*
Plugin Name: WP Smart Variations
Author: <strong>Rajan V, A2Z Technologies</strong>
Version: 1.0
Description: This is variations plugin for WP-e Commerce Site.
*/

/*  Copyright 2007-2014 Rajan V (email: ratanit2000 at gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

// Hook for adding admin menus
add_action('wp_footer', 'variationScript');
add_action('wp_head', 'whshCSS');

function whshCSS(){
	echo '<link type="text/css" rel="stylesheet" href="'.plugins_url().'/wp-smart-variations/css/custom.css" />';
}

function variationScript() {
    ?>
	<script type="text/javascript" >
	jQuery(function(){
		jQuery('.wpsc_variation_forms').append('<div class="new-variation-div"></div>');
		var i = 0;
		jQuery( ".wpsc_variation_forms" ).each(function() {
			var output = '';
			var variation = '';
			jQuery(this).find('.wpsc_select_variation').each(function(){
				var name = jQuery(this).attr('name');
					jQuery(this).find('option').each(function(){
						var val = jQuery(this).text();
						var value = jQuery(this).attr('value');
						if( value != '0' ){
							variation = variation + '<label class="new-variation-radio radio-variation" for="'+name+i+'"><input class="wpsc_select_variation" type="radio" id="'+name+i+'" name="'+name+'" value="'+value+'" rel=' + val +' />'+val+'</label>';
						}
						i++;
					});
					variation = '<div class="variation-variation">'+variation+'</div>';
				output = variation;
			});
			jQuery(this).find('.new-variation-div').html( output );
			jQuery(this).find('table').hide();
		});
	});
    </script>
	<?php
}

?>