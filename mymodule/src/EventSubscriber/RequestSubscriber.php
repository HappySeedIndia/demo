<?php

declare(strict_types=1);

namespace Drupal\mymodule\EventSubscriber;

use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * @todo Add description for this subscriber.
 */
final class RequestSubscriber implements EventSubscriberInterface {

  protected $logger;

  /**
   * Constructs a RequestSubscriber object.
   */
  public function __construct(
    LoggerChannelFactoryInterface $factory,
  ) {
    $this->logger = $factory;
  }
  /**
   * Kernel request event handler.
   */
  public function onKernelRequest(RequestEvent $event): void {
    // Logs a notice to "my_module" channel.
    $this->logger->get('mymodule')->notice('This is a notice');
    //  Types of log.
    // $this->logger->get('mymodule')->error($message);
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents(): array {
    return [
      KernelEvents::REQUEST => ['onKernelRequest'],
    ];
  }

}
