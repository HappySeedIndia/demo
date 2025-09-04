<?php

namespace Drupal\mymodule\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Demonstrates deprecated function calls.
 */
class DeprecatedController extends ControllerBase {

  /**
   * Depreacted use of entity_create().
   */
  public function content() {
    // Deprecated entity_create().
    $node = entity_create('node', ['type' => 'article']);
    $node->setTitle('Demo Node');
    $node->save();

    // Deprecated t().
    $text = t('Hello from Rector Demo!');

    return [
      '#markup' => $text,
    ];
  }

  /**
   * Deprecated use of drupal_render().
   */
  public function renderRxample() {
    $build = [
      '#markup' => '<p>Hello World!</p>',
    ];

    // Deprecated in Drupal 8.0, removed in 9.x.
    return drupal_render($build);
  }

  /**
   * Deprecated use of db_query().
   */
  public function dbExample() {
    // Deprecated wrapper for database queries.
    $result = db_query("SELECT uid, name FROM {users_field_data} WHERE status = 1");

    foreach ($result as $record) {
      \Drupal::logger('demo')->notice("User: @name", ['@name' => $record->name]);
    }
  }

}
