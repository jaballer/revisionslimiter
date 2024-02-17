<?php
namespace jaballer\revisionslimiter;

use Craft;
use craft\base\Plugin;
use jaballer\revisionslimiter\listeners\EntrySaveListener;

class RevisionsLimiter extends Plugin
{
    public function init()
    {
        parent::init();

        // Register event listener
        Craft::$app->getEventManager()->on(
            \craft\services\Elements::class,
            \craft\services\Elements::EVENT_BEFORE_SAVE_ELEMENT,
            [EntrySaveListener::class, 'handleBeforeSaveElement']
        );
    }
}
