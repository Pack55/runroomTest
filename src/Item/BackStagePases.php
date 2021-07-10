<?php

namespace Runroom\GildedRose\Item;



class BackStagePases extends ItemInterface
{

    public function update()
    {
        $this->increaseQuality();

        if($this->getSellIn() < 11) {
            $this->increaseQuality();
        }

        if($this->getSellIn() < 6) {
            $this->increaseQuality();
        }

        if($this->getSellIn() <= 0) {
            $this->setQuality(0);
        }

        $this->decreaseSellIn();
    }
}
