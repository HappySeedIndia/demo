<?php

declare(strict_types=1);

use DrupalRector\Set\Drupal10SetList;
use DrupalRector\Set\Drupal8SetList;
use DrupalRector\Set\Drupal9SetList;
use Rector\Config\RectorConfig;
use DrupalRector\Drupal10\Rector\Deprecation\AnnotationToAttributeRector;
use DrupalRector\Drupal10\Rector\ValueObject\AnnotationToAttributeConfiguration;

return static function (RectorConfig $rectorConfig): void {
    // Adjust the set lists to be more granular to your Drupal requirements.
    // @todo find out how to only load the relevant rector rules.
    //   Should we try and load \Drupal::VERSION and check?
    //   new possible option with ComposerTriggeredSet
    //   https://github.com/rectorphp/rector-src/blob/b5a5739b7d7dde621053adff113449860ed5331f/src/Set/ValueObject/ComposerTriggeredSet.php
    $rectorConfig->sets([
        Drupal10SetList::DRUPAL_10,
    ]);

    if (class_exists('DrupalFinder\DrupalFinderComposerRuntime')) {
        $drupalFinder = new DrupalFinder\DrupalFinderComposerRuntime();
    } else {
        $drupalFinder = new DrupalFinder\DrupalFinder();
        $drupalFinder->locateRoot(__DIR__);
    }
    $drupalRoot = $drupalFinder->getDrupalRoot();
    $rectorConfig->autoloadPaths([
        $drupalRoot . '/core',
        $drupalRoot . '/modules',
        $drupalRoot . '/profiles',
        $drupalRoot . '/themes'
    ]);

    $rectorConfig->skip(['*/upgrade_status/tests/modules/*']);
    $rectorConfig->fileExtensions(['php', 'module', 'theme', 'install', 'profile', 'inc', 'engine']);
    $rectorConfig->importNames(true, false);
    $rectorConfig->importShortClasses(false);

    // Custom configs
    $annotations = [
      'Block' => 'Drupal\\Core\\Block\\Attribute\\Block',
      'Form' => 'Drupal\\Core\\Form\\Attribute\\Form',
      'EntityType' => 'Drupal\\Core\\Entity\\Attribute\\EntityType',
      'ContentEntityType' => 'Drupal\\Core\\Entity\\Attribute\\ContentEntityType',
      'ConfigEntityType' => 'Drupal\\Core\\Entity\\Attribute\\ConfigEntityType',
      'Menu' => 'Drupal\\Core\\Menu\\Attribute\\Menu',
      'FieldFormatter' => 'Drupal\\Core\\Field\\Attribute\\FieldFormatter',
      'FieldWidget' => 'Drupal\\Core\\Field\\Attribute\\FieldWidget',
      'FieldType' => 'Drupal\\Core\\Field\\Attribute\\FieldType',
      'ViewBuilder' => 'Drupal\\Core\\Render\\Attribute\\ViewBuilder',
      'FormElement' => 'Drupal\\Core\\Render\\Attribute\\FormElement',
      'Plugin' => 'Drupal\\Component\\Plugin\\Attribute\\Plugin',
      'Condition' => 'Drupal\\Core\\Condition\\Attribute\\Condition',
      'ContextDefinition' => 'Drupal\\Core\\Plugin\\Context\\Attribute\\ContextDefinition',
      'HelpSection' => 'Drupal\\help\\Attribute\\HelpSection',
      'ViewsFilter' => 'Drupal\\views\\Attribute\\ViewsFilter',
      'TimeZoneFormHelper' => 'Drupal\\Core\\Datetime\\TimeZoneFormHelper',
       'WatchdogExceptionRector' => 'DrupalRector\\Drupal10\\Rector\\Deprecation\\WatchdogExceptionRector'
    ];

    $configuration = [];
    foreach ($annotations as $annotation => $attributeClass) {
      $configuration[] = new \DrupalRector\Drupal10\Rector\ValueObject\AnnotationToAttributeConfiguration(
        '10.0.0',
        '10.0.0',
        $annotation,
        $attributeClass,
      );
    }

    $rectorConfig->ruleWithConfiguration(
      \DrupalRector\Drupal10\Rector\Deprecation\AnnotationToAttributeRector::class,
      $configuration,
    );
};
