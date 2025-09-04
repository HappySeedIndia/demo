<?php

namespace Drupal\mymodule\Plugin\Block;

use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\Block\Attribute\Block;
use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Example: deprecated annotation' block.
 */
#[Block(id: 'deprecated_annotation', admin_label: new TranslatableMarkup('Example: deprecated annotation'))]
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
