<?php

/**
 * Plugin Name: BP Groups Example
 * Plugin URI:  http://buddypress.org
 * Description: Just an example of how to modify BuddyPress Groups via the BuddyPress API
 * Author:      David Bisset
 * Author URI:  http://davidbisset.com
 * Version:     1.0
 * Text Domain: buddypress
 * License:     GPLv2 or later (license.txt)
 */
 
 
/**
 * Load only when BuddyPress is present.
 */
function bpgex_include() {
	require( dirname( __FILE__ ) . '/bp-groups-example.php' );
}

add_action( 'bp_include', 'bpgex_include' );

/* WordPress stuff can go here below */