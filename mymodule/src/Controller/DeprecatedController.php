<?php

namespace Drupal\mymodule\Controller;

use Drupal\Core\Controller\ControllerBase;

class DeprecatedController extends ControllerBase {

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

  function my_render_example() {
    $build = [
      '#markup' => '<p>Hello World!</p>',
    ];

    // Deprecated in Drupal 8.0, removed in 9.x.
    return drupal_render($build);
  }

  function my_db_example() {
    // Deprecated wrapper for database queries.
    $result = db_query("SELECT uid, name FROM {users_field_data} WHERE status = 1");

    foreach ($result as $record) {
      \Drupal::logger('demo')->notice("User: @name", ['@name' => $record->name]);
    }
  }
}
