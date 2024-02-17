<?php

namespace jaballer\revisionslimiter;

use craft\base\Plugin;

class RevisionsLimiter extends Plugin
{
    public function init()
    {
        parent::init();

        // Register event listener
        $this->setComponents([
            'entrySaveListener' => \jaballer\revisionslimiter\listeners\EntrySaveListener::class,
        ]);
    }
}
