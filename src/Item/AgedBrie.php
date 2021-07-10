<?php

namespace Runroom\GildedRose\Item;


class AgedBrie extends ItemInterface
{

    public function update()
    {
        if ($this->getQuality() < self::MAXQUALITY) {
            $this->increaseQuality();
        }

        $this->decreaseSellIn();

        if ($this->getQuality() >= self::MAXQUALITY) {
            $this->setQuality(self::MAXQUALITY);
        }

        if ($this->getSellIn() < 0) {
            $this->increaseQuality();
        }
    }

}
