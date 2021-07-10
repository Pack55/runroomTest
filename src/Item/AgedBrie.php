<?php

namespace Runroom\GildedRose\Item;


class AgedBrie extends ItemInterface
{
    public function update()
    {
        $this->increaseQuality();
        $this->decreaseSellIn();

        if($this->getSellIn() <= 0) {
            $this->increaseQuality();
        }

        if($this->getQuality() > self::MAXQUALITY) {
            $this->setQuality(self::MAXQUALITY);
        }
    }
}
