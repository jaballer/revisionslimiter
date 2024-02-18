<?php
namespace jaballer\revisionslimiter\listeners;

use Craft;
use craft\events\ElementEvent;
use craft\models\Entry;
use yii\base\Event;

class EntrySaveListener
{
    public static function handleBeforeSaveElement(ElementEvent $event)
    {
        $element = $event->element;
        
        // Check if the element is an Entry
        if ($element instanceof Entry) {
            // Get the current number of revisions for the entry
            $revisionsCount = Craft::$app->getEntryRevisions()->getCountByEntryId($element->id);

            // If the number of revisions is greater than or equal to 10, delete the oldest revisions
            if ($revisionsCount >= 10) {
                $revisionsToDelete = $revisionsCount - 9; // Keep the latest 10 revisions
                Craft::$app->getEntryRevisions()->deleteDraftsByEntryId($element->id, $revisionsToDelete);
            }
        }
    }
}
