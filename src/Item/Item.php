<?php

namespace Runroom\GildedRose\Item;


class Item extends ItemInterface
{
    public function update()
    {
        $this->decreaseQuality();
        $this->decreaseSellIn();

        if($this->getSellIn()< 0) {
            $this->decreaseQuality();
        }

        if($this->getQuality() <= 0) {
            $this->setQuality(0);
        }
    }
}
