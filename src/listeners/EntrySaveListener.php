<?php
namespace jaballer\revisionslimiter\listeners;

use Craft;
use craft\events\ElementEvent;
use yii\base\Event;

class EntrySaveListener
{
    public static function handleBeforeSaveElement(ElementEvent $event)
    {
        // Your logic to limit revisions goes here
        // For example, you can check the number of existing revisions and delete old ones if the limit is reached
    }
}
