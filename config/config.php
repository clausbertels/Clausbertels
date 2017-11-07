<?php
/**
 * Pico configuration
 *
 * This is the configuration file for {@link Pico}. It comes loaded with the
 * default values, which can be found in {@link Pico::getConfig()} (see
 * {@path "lib/Pico.php"}).
 *
 * To override any of the default settings below, copy this file to
 * {@path "config/config.php"}, uncomment the line, then make and
 * save your changes.
 *
 * @author  Gilbert Pellegrom
 * @link    http://picocms.org
 * @license http://opensource.org/licenses/MIT The MIT License
 * @version 1.0
 */


/*
BASIC */
$config['site_title'] = 'Claus Bertels';
//$config['base_url'] = 'claus.design'; // Override base URL (e.g. http://example.com)
//$config['rewrite_url'] = true; // forced URL rewriting


/*
THEME */
$config['theme'] = 'claus-one';  // Set the theme (defaults to "default")
$config['twig_config'] = array(              // Twig settings
//     'cache' => false,  // To enable Twig caching change this to a path to a writable directory
     'autoescape' => true,                   // Auto-escape Twig vars
     //'debug' => false                         // Enable Twig debug
);


/*
CONTENT */
// $config['date_format'] = '%D %T';            // Set the PHP date format as described here: http://php.net/manual/en/function.strftime.php
$config['pages_order_by'] = 'date';         // Order pages by "alpha" or "date"
$config['pages_order'] = 'desc';              // Order pages "asc" or "desc"
// $config['content_dir'] = 'content-sample/';  // Content directory
// $config['content_ext'] = '.md';              // File extension of content files to serve


/*
TIMEZONE */
// $config['timezone'] = 'UTC';  // Timezone may be required by your php install


/*
PLUGINS */
$config['PicoCategorizedPages.enabled'] = true;

/*
CUSTOM Can be accessed by {{ config.custom_setting }} in a theme */
// $config['custom_setting'] = 'Hello';
$config['pages_order_by'] = 'position';             // Needed by PicoCategorizedPages
$config['pages_order'] = 'desc';                 // Order pages "asc" or "desc"
$config['categories_order'] = 'asc';              // Order categories "asc" or "desc"
$config['categories_directory']
