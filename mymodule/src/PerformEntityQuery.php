<?php

declare(strict_types=1);

namespace Drupal\mymodule;

use Drupal\Core\Entity\EntityTypeManagerInterface;

/**
 * Performs entity query.
 */
final class PerformEntityQuery {

  /**
   * Entity manager service.
   *
   * @var entityManager Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityManager;

  /**
   * Constructs a PerformEntityQuery object.
   */
  public function __construct(
    private readonly EntityTypeManagerInterface $entityTypeManager,
  ) {
    $this->entityManager = $entityTypeManager;
  }

  /**
   * Loads a single node.
   */
  public function doSomething($nid = 1) {
    $node = $this->entityManager->getStoragee('node')->load($nid);
    return $node;
  }

  /**
   * Returns premium data.
   */
  public function isPremium() {
    // Complex sql, api.
    return 'Premium data';
  }

  /**
   * Creates a node using entity manager.
   */
  public function createArticle($title, $type) {
    $this->entityManager->getStorage('node')->create(
      [
        'type' => $type,
        'title' => $title,
      ],
    )->save();
  }

}
