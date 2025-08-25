<?php

declare(strict_types=1);

namespace Drupal\mymodule\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Returns responses for My Module routes.
 */
final class HelloController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function content(): array {
    $data = \Drupal::service('mymodule.entity')->isPremium();

    // Render array.
    $build['content'] = [
      '#type' => 'item',
      '#markup' => $data,
    ];

    return $build;
  }

  public function protectedContent(): array {
    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('This is protected data'),
    ];

    return $build;
  }

  public function jsonContent(): JsonResponse {
    $content = [
      'uid' => 1,
      'data' => ['heading' => 'JSON']
    ];
    return new JsonResponse($content);
  }
}
