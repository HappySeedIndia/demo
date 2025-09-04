<?php

declare(strict_types=1);

namespace Drupal\mymodule\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\mymodule\PerformEntityQuery;

/**
 * Returns responses for My Module routes.
 */
final class HelloController extends ControllerBase {

  /**
   * The entity query builder.
   *
   * @var \Drupal\mymodule\PerformEntityQuery
   */
  protected $entityQuery;

  /**
   * Hello Controller constructor.
   *
   * @param \Drupal\mymodule\PerformEntityQuery $entity_query
   *   The entity query builder.
   */
  public function __construct(PerformEntityQuery $entity_query) {
    $this->entityQuery = $entity_query;
  }

  /**
   * {@inheritdoc}
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   The Drupal service container.
   *
   * @return static
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('mymodule.entity')
    );
  }

  /**
   * Builds the response.
   */
  public function content(): array {
    $data = $this->entityQuery->isPremium();
    // Render array.
    $build['content'] = [
      '#type' => 'item',
      '#markup' => $data,
    ];

    return $build;
  }

  /**
   * Returns protected data.
   */
  public function protectedContent(): array {
    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('This is protected data'),
    ];

    return $build;
  }

  /**
   * Returns JSON data.
   */
  public function jsonContent(): JsonResponse {
    $content = [
      'uid' => 1,
      'data' => ['heading' => 'JSON'],
    ];
    return new JsonResponse($content);
  }

  /**
   * Demonstrates permission check.
   */
  public function demoPermission(): array {
    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('This requires mymodule permissions.'),
    ];
    return $build;
  }

}
