<?php

declare(strict_types=1);

namespace Drupal\mymodule\Plugin\Block;

use Drupal\Core\Block\Attribute\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\StringTranslation\TranslatableMarkup;
// use Test;

/**
 * Provides a weather api block.
 */
/**
 * Meta-data.
 */
#[Block(
  id: 'mymodule_weather_api',
  admin_label: new TranslatableMarkup('Weather API'),
  category: new TranslatableMarkup('QR'),
)]
final class WeatherApiBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build(): array {
    // $a =  new Test();
    // $build['content'] = [
    //   '#markup' => $this->t('Current weather is 25 degree.'),
    // ];
    // return $build;

    // Wrong: Must return render array or Response object, not string.
    return "This must return render array";
  }

}
