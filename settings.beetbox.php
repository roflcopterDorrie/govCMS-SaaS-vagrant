<?php

$databases = array();
$databases['default']['default'] = array(
  'driver' => 'mysql',
  'database' => 'beetbox',
  'username' => 'beetbox',
  'password' => 'beetbox',
  'host' => 'localhost',
  'prefix' => '',
);

$update_free_access = FALSE;
$drupal_hash_salt = '';
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 100);
ini_set('session.gc_maxlifetime', 200000);
ini_set('session.cookie_lifetime', 2000000);

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
$conf['error_level'] = 2;
$conf['preprocess_css'] = FALSE;
$conf['preprocess_js'] = FALSE;

// Look for a settings file outside the docroot, since everything in the docroot
// can get destroyed when we build the local site from the ACSF backup.
if (file_exists('../settings.local.php')) {
  include_once '../settings.local.php';
}
