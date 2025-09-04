<?php

namespace Drupal\mymodule\Plugin\QueueWorker;

use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Queue\QueueWorkerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Processes items from the process queue.
 *
 * @QueueWorker(
 *   id = "webform_operation_log_delete_queue_process",
 *   title = @Translation("Delete Webform Operation Log Queue Worker"),
 *   cron = {"time" = 60}
 * )
 */
class QueueWorkerDeprecatedAnnotation extends QueueWorkerBase implements ContainerFactoryPluginInterface {

  /**
   * Constructs a new WebformOperationLogQueueWorker object.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   The container object.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, ContainerInterface $container) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->container = $container;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container,
    );
  }

  /**
   * {@inheritdoc}
   */
  public function processItem($data) {
  
    // @todo: add code
  }

}
