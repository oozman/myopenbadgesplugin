<?php
/*
Plugin Name: My OpenBadges Displayer
Plugin URI: http://omarusman.com
Description: A simple shortcode for displaying your earned Mozilla OpenBadges.
Version: 1.0
Author: Omar Usman
Author URI: http://omarusman.com
License: http://creativecommons.org/licenses/by/3.0/
*/

/* Usage:
	Add this shortcode to any of your post or pages. Automatically, it will fetch your earned OpenBadges.
	
	1. [openbadges user_id="1234" group_id="1234"]
	2. [openbadges user_id="1234" group_id="1234" badge_size="200px" badge_desc_size="15px"]
*/


function openbadge_function( $atts ) {

	//Parse parameters
	extract( shortcode_atts( array(
		'user_id' => '',
		'group_id' => '',
		'badge_size' => '200px',
		'badge_desc_size' => '15px',
	), $atts ) );

	//If no user_id or group_id found, show an error message.
	if( empty( $user_id ) OR empty( $group_id ) )
	{
		return 'Please provide both your OpenBadge UserID and GroupID';
	}
	
	//Fetch your Mozilla Open Badges
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'http://beta.openbadges.org/displayer/' . $user_id . '/group/' . $group_id. '.json'); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$response = trim(curl_exec($ch));
	curl_close($ch);
	
	//json decode the response
	$json = json_decode($response);
	
	//Intialize $html response
	$html = '<div class="ou_openbadges">';
		
	//Double check if it's a valid response
	if( is_object($json ) AND isset( $json->badges ) )
	{
	
		
		
		//Generate $html for each badge
		foreach( $json->badges as $badge )
		{
			$description = $badge->assertion->badge->description;
			$image = $badge->imageUrl;
			$criteria = $badge->assertion->badge->criteria;
			
			//HTML codes for each badge is here
			$html .= '<div class="ou_badge" style="float: left;margin-right:20px;width:' . $badge_size . '">';
				$html .= '<div class="ou_badge_image" style="text-align:center;">';
					$html .= '<a href="' . $criteria . '" target="_blank"><img src="' . $image . '" style="width:50%;"/></a>';
				$html .= '</div>';
				$html .= '<div class="ou_badge_description" style="text-align:center;">';
					$html .= '<p style="font-size:' . $badge_desc_size . '">' . $description . '</p>';
				$html .= '</div>';
			$html .= '</div>';
		}
	}
	
	$html .= '</div>';
	
	return $html;
}

//Tell Wordpress about our awesome shortcode.
add_shortcode( 'openbadges', 'openbadge_function' );

#END OF PHP FILE