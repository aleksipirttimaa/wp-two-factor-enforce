<?php
/**
 * @package Two_Factor_Enforce
 * @version 0.1.0
 */
/*
Plugin Name: two-factor-enforce
Description: Enforce policy for the Two Factor -plugin
Author: aleksipirttimaa
Version: 0.1.0
*/

/*

This plugin uses wordpress/two-factor -hooks. The providers are declared in:
https://github.com/WordPress/two-factor/blob/master/class-two-factor-core.php

*/

$TWO_FACTOR_EMAIL = 'Two_Factor_Email';
$TWO_FACTOR_TOTP = 'Two_Factor_Totp';
$TWO_FACTOR_FIDO_U2F = 'Two_Factor_FIDO_U2F';

$TWO_FACTOR_PROVIDERS = array(
	$TWO_FACTOR_EMAIL => null,
	$TWO_FACTOR_TOTP => null,
	$TWO_FACTOR_FIDO_U2F => null,
);

/*

Enforce providers

*/

function providers($providers) {
	global $TWO_FACTOR_PROVIDERS;
	return array_intersect_key($providers, $TWO_FACTOR_PROVIDERS);
}

add_filter('two_factor_providers', 'providers');

/*

Enforce two factor for everyone

*/

function role_user_providers($enabled_providers, $user_id) {
	global $role_users;
	global $TWO_FACTOR_EMAIL;
	if (count($enabled_providers) == 0) {
		return array($TWO_FACTOR_EMAIL);
	}
	return $enabled_providers;
}

add_filter('two_factor_enabled_providers_for_user', 'role_user_providers', 10, 2);
