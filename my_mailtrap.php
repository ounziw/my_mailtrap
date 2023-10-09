<?php
/**
 * Plugin Name:       my mailtrap setting
 * Plugin Description: adds mailtrap setting, and shows a notification on admin bar.
 * Version:           0.1.0
 */


function my_mailtrap( $phpmailer ) {
	$phpmailer->isSMTP();
	$phpmailer->Host     = 'sandbox.smtp.mailtrap.io';
	$phpmailer->SMTPAuth = true;
	$phpmailer->Port     = 2525;
	$phpmailer->Username = 'xxxxxxxxxxxxxx';
	$phpmailer->Password = 'xxxxxxxxxxxxxx';
}

add_action( 'phpmailer_init', 'my_mailtrap' );


function notify_mailtrap( $wp_admin_bar ) {
	$wp_admin_bar->add_node(
		[
			'id'    => 'mailtrap-active',
			'title' => 'Mailtrap ACTIVE',
			'href'  => '#',
			'meta'  => [
				'title' => 'Mailtrap ACTIVE',
				'class' => 'mailtrap-active'
			],
		]
	);
}

add_action( 'admin_bar_menu', 'notify_mailtrap' );


function my_notify_css() {
	echo '<style>li#wp-admin-bar-mailtrap-active { background-color: #900!important; }</style>';
}

add_action( 'admin_footer', 'my_notify_css' );
add_action( 'wp_footer', 'my_notify_css' );