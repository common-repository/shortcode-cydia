<?php
/*
Copyright (C) Shortcode Cydia Schiavon Maikol

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/
/**
 * @package Shortcode_Cydia
 * @version 1.0
 */
/*
Plugin Name: Shortcode Cydia
Plugin URI: 
Description: Enable new shortcode for create container that includes all info tweak cydia of the your article
Author: Maikol Schiavon
Version: 1.0
Author URI: 
*/
/* 
EXAMPLE:
[cydia url="https://repo.cydia.com" cost="$ 2.99" name="TEST" style="smallbox"]
*/

function cydia_func( $atts ) {
	$tweak_name = $atts["name"];
	$tweak_cost = $atts["cost"];
	$tweak_url = $atts["url"];

	$open_cydia = "cydia://url/https://cydia.saurik.com/api/share#?source=".$tweak_url;

	$html = cydia_css(); 

	if($atts["style"] == "smallbox"){
		$html .= "<div class='row row-cydia'>
					<div class='col-md-6 col-sm-6 col-xs-6'>
						<h3 class='tweak_name'>$tweak_name</h3>
					</div>
					<div class='col-md-6 col-sm-6 col-xs-6'>
						<a href='$open_cydia' class='btn btn-cydia'>Cydia Download</a>
						<h4 class='cydia'>$tweak_cost</h4>
					</div>
				</div>";

	}
	$a = shortcode_atts( array(
		'foo' => 'something',
		'bar' => 'something else',
	), $atts );

	return $html;
}
add_shortcode( 'cydia', 'cydia_func' );

function cydia_css() {
	
	$css_style = "
	<style type='text/css'>
	.row-cydia{margin: 20px 0;}
	h3.tweak_name{line-height: 20px;}
	h4.cydia{color: #b17457;margin-left: 10px;}
	.btn-cydia {
		border-radius: 20px;
		background: transparent;
		border: 1px solid #b17457;
		color: #b17457;
		text-align:right;
	}
	.btn-cydia:hover{color:#fff;background-color:#b17457;text-align:right;}
	</style>
	";

	return $css_style;
}
?>
