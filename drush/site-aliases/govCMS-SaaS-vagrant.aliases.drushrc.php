<?php

/**
 * @file
 * Drush aliases for health project.
 */
if (!isset($drush_major_version)) {
  $drush_version_components = explode('.', DRUSH_VERSION);
  $drush_major_version = $drush_version_components[0];
}
// Environment local.
$aliases['local'] = [
  'root' => '/var/beetbox/docroot',
  'uri' => 'govCMS-SaaS-vagrant.local',
];

if (exec('whoami') != 'vagrant') {
  $aliases['local']['remote-host'] = 'govCMS-SaaS-vagrant.local';
  $aliases['local']['remote-user'] = 'vagrant';
  $aliases['local']['ssh-options'] = '-o PasswordAuthentication=no -i ' . drush_server_home() . '/.vagrant.d/insecure_private_key -o StrictHostKeyChecking=no';
}
