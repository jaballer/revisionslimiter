<?php

namespace jaballer\revisionslimiter\listeners;

use Craft;
use craft\base\Element;
use craft\elements\Entry;
use yii\base\Event;

class EntrySaveListener
{
    public function handle(Event $event)
    {
        /** @var Entry $entry */
        $entry = $event->sender;

        // Define the maximum number of revisions to keep
        $maxRevisions = 10;

        // Get the number of revisions for the entry
        $revisionCount = count($entry->getRevisions());

        // If the number of revisions exceeds the limit, delete the oldest revisions
        if ($revisionCount > $maxRevisions) {
            $revisionsToDelete = array_slice($entry->getRevisions(), 0, $revisionCount - $maxRevisions);

            foreach ($revisionsToDelete as $revision) {
                Craft::$app->elements->deleteElement($revision);
            }
        }
    }
}
