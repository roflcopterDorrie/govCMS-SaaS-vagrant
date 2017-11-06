<?php

/**
 * @file
 * Drush command for running behat tests.
 */

/**
 * Implements hook_drush_command().
 */
function behat_drush_command() {

  $items['behat'] = array(
    'description' => "Run behat tests.",
    // No bootstrap at all.
    'bootstrap' => DRUSH_BOOTSTRAP_NONE,
    'options' =>  [
      'tag' => 'Tag to run.',
    ],
  );

  return $items;
}

/**
 * Implements drush_hook_COMMAND().
 */
function drush_behat() {
  $tag = drush_get_option('tag', 'ci');
  drush_shell_exec_interactive('cd ' . dirname(DRUPAL_ROOT) . '/tests/behat && ../../vendor/bin/behat --tags ' . $tag . ' --colors --stop-on-failure');
}
