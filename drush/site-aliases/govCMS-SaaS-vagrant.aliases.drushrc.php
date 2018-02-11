<?php

use Symfony\Component\Yaml\Parser;

include './vendor/autoload.php';

/**
 * @file
 * Drush aliases for health project.
 */
if (!isset($drush_major_version)) {
  $drush_version_components = explode('.', DRUSH_VERSION);
  $drush_major_version = $drush_version_components[0];
}

// Determine a site alias domain based on configuration in
// the root (we are in the ./drush directory).
$parser = new Parser();
$beetbox_settings = $parser->parse(file_get_contents('../.beetbox/config.yml'));
if (isset($beetbox_settings['beet_domain'])) {
  $domain = $beetbox_settings['beet_domain'];
}
else {
  $domain = 'govCMS-SaaS-vagrant.local';
}

// Environment local.
$aliases['local'] = [
  'root' => '/var/beetbox/docroot',
  'uri' => $domain,
];

if (exec('whoami') != 'vagrant') {
  $aliases['local']['remote-host'] = $domain;
  $aliases['local']['remote-user'] = 'vagrant';
  $aliases['local']['ssh-options'] = '-o PasswordAuthentication=no -i ' . drush_server_home() . '/.vagrant.d/insecure_private_key -o StrictHostKeyChecking=no';
}
