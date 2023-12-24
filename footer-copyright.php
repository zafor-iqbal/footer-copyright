<?php
/**
 * Plugin Name:     Footer Copyright
 * Plugin URI:      https://gigatechsolution.com/copyright-footer-plugin/
 * Description:     A simple plugin for website footer to display copyright symbol, text, year and company name in different order. Current year gets automatically updated. 
 * Version:         1.0
 * Author:          Zafor Iqbal
 * Author URI:      https://zaforiqbal.com/
 * License:         GPLv2 or later
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}


/**
 * 
 * Default: [gigatech_copy_rights]
 * @return Copyright © 2023 Site Title. All rights reserved.
 * 
 * With a start year: [gigatech_copy_rights company="Your Company Name." start_year="2010"]
 * @return Copyright © 2010–2023 Your Company Name. All rights reserved.
 * 
 * Without a start year: [gigatech_copy_rights company="Your Company Name."]
 * @return Copyright © 2023 Your Company Name. All rights reserved.
 * 
 */

function gigatech_copy_date_company_rights( $atts ) {
    $site_title = get_bloginfo( 'name' );
    // Define default attributes
    $default_atts = array(
        'company' => $site_title,
        'start_year' => '' // Start year is empty by default
    );

    // Parse incoming $atts into an array and merge it with $default_atts
    $atts = shortcode_atts( $default_atts, $atts );

    // Get the current year
    $current_year = date('Y');

    // Construct the date range
    $date_range = $atts['start_year'] ? esc_html($atts['start_year']) . " – " . $current_year : $current_year;

    // Construct the text with the customizable parts
    $text = "Copyright © " . $date_range . " " . esc_html($atts['company']) . ". All rights reserved.";

    // Return the formatted text
    return $text;
}

// Register the shortcode with WordPress
add_shortcode( 'gigatech_copy_rights', 'gigatech_copy_date_company_rights' );



/**
 * With a custom company name: [gigatech_copy_company company="Your Company Name"]
 * @return © Your Company Name 2023
 * 
 * With the default company name: [gigatech_copy_company]
 * @return © Site Title 2023
 * 
 */


function gigatech_copy_company_date( $atts ) {
    $site_title = get_bloginfo( 'name' );
    // Define default attributes
    $default_atts = array(
        'company' => $site_title
    );

    // Parse incoming $atts into an array and merge it with $default_atts
    $atts = shortcode_atts( $default_atts, $atts );

    // Get the current year
    $current_year = date('Y');

    // Construct the text with the customizable part
    $text = "© " . esc_html($atts['company']) . " " . $current_year;

    // Return the formatted text
    return $text;
}

// Register the shortcode with WordPress
add_shortcode( 'gigatech_copy_company', 'gigatech_copy_company_date' );



/**
 * With a custom company name: [gigatech_company_year company="Your Company Name"]
 * @return Your Company Name © 2023
 * 
 * With the default company name: [gigatech_company_year]
 * @return Site Title © 2023
 * 
 */


function gigatech_company_copy_date( $atts ) {
    $site_title = get_bloginfo( 'name' );
    // Define default attributes
    $default_atts = array(
        'company' => $site_title,
    );

    // Parse incoming $atts into an array and merge it with $default_atts
    $atts = shortcode_atts( $default_atts, $atts );

    // Get the current year
    $current_year = date('Y');

    // Construct the text with the customizable part
    $text = esc_html($atts['company']) . " © " . $current_year;

    // Return the formatted text
    return $text;
}

// Register the shortcode with WordPress
add_shortcode( 'gigatech_company_year', 'gigatech_company_copy_date' );