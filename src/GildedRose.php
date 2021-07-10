<?php

namespace Runroom\GildedRose;

class GildedRose {

    private $items;

    function __construct($items) {
        $this->items = $items;
    }

    function updateItems() {
        foreach ($this->items as $item) {
            $item->update();
        }
    }
}
