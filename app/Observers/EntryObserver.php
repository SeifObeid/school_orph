<?php

namespace App\Observers;

use App\Models\Entry;

class EntryObserver
{
  /**
     * Handle the Entries "deleting" event.
     *
     * @param  \App\Entry  $Entry
     * @return void
     */
    public function deleting(Entry $entry)
    {
        $entry->productsEntries()->delete();
    }
}
