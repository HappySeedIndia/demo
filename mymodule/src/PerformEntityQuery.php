<?php

declare(strict_types=1);

namespace Drupal\mymodule;

use Drupal\Core\Entity\EntityTypeManagerInterface;

/**
 * @todo Add class description.
 */
final class PerformEntityQuery {

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
   * @todo Add method description.
   */
  public function doSomething($nid = 1) {
    $node = $this->entityManager->getStorage('node')->load($nid);
    return $node;
  }

  public function isPremium() {
    // complex sql, api.
    return 'Premium data';
  }

  public function createArticle($title, $type) {
    $this->entityManager->getStorage('node')->create(
      [
        'type' => $type,
        'title' => $title
      ],
    )->save();
  }

}
