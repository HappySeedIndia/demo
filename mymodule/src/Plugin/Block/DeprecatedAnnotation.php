<?php

namespace Drupal\mymodule\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Example: deprecated annotation' block.
 *
 * @Block(
 *   id = "deprecated_annotation",
 *   admin_label = @Translation("Example: deprecated annotation")
 * )
 */
class DeprecatedAnnotation extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#markup' => $this->t("Example: deprecated annotation."),
    ];
  }

}
