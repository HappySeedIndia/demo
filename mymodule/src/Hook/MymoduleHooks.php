<?php

namespace Drupal\mymodule\Hook;

use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Hook\Attribute\Hook;

/**
 * Hook implementations for mymodule.
 */
class MymoduleHooks {
  /**
   * @file
   * Primary module hooks for My Module module.
   */

  /**
   * Implements hook_help().
   */
  #[Hook('help', module: 'mymodule_demo')]
  public function demoHelp($route_name, RouteMatchInterface $route_match) {
    switch ($route_name) {
      case 'help.page.rector_demo':
        // Deprecated drupal_set_message().
        drupal_set_message(t('This is a demo help page.'));
        break;
    }
  }

}
