<?php

namespace Runroom\GildedRose;

class Item {

    private $name;
    private $sell_in;
    private $quality;

    function __construct($name, $sell_in, $quality) {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function __toString() {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getQuality()
    {
        return $this->quality;
    }

    public function setQuality($quality)
    {
        $this->quality = $quality;
    }

    public function getSellIn()
    {
        return $this->sell_in;
    }

    public function setSellIn($sell_in)
    {
        $this->sell_in = $sell_in;
    }

    public function update()
    {
        if ($this->getName() != 'Aged Brie' and $this->getName() != 'Backstage passes to a TAFKAL80ETC concert') {
            if ($this->getQuality() > 0) {
                if ($this->getName() != 'Sulfuras, Hand of Ragnaros') {
                    $this->setQuality($this->getQuality() - 1);
                }
            }
        } else {
            if ($this->getQuality() < 50) {
                $this->setQuality($this->getQuality() + 1);
                if ($this->getName() == 'Backstage passes to a TAFKAL80ETC concert') {
                    if ($this->getSellIn() < 11) {
                        if ($this->getQuality() < 50) {
                            $this->setQuality($this->getQuality() + 1);
                        }
                    }
                    if ($this->getSellIn() < 6) {
                        if ($this->getQuality() < 50) {
                            $this->setQuality($this->getQuality() + 1);
                        }
                    }
                }
            }
        }

        if ($this->getName() != 'Sulfuras, Hand of Ragnaros') {
            $this->setSellIn($this->getSellIn() - 1);
        }

        if ($this->getSellIn() < 0) {
            if ($this->getName() != 'Aged Brie') {
                if ($this->getName() != 'Backstage passes to a TAFKAL80ETC concert') {
                    if ($this->getQuality() > 0) {
                        if ($this->getName() != 'Sulfuras, Hand of Ragnaros') {
                            $this->setQuality($this->getQuality() - 1);
                        }
                    }
                } else {
                    $this->setQuality($this->getQuality() - $this->getQuality());
                }
            } else {
                if ($this->getQuality() < 50) {
                    $this->setQuality($this->getQuality() + 1);
                }
            }
        }
    }

}
