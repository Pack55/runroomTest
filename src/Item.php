<?php

namespace Runroom\GildedRose;

class Item {

    private $name;
    private $sell_in;
    private $quality;

    const MAXQUALITY = 50;
    const MINQUALITY = 0;
    const AGEDBRIE = "Aged Brie";
    const BACKSTAGEPASES = "Backstage passes to a TAFKAL80ETC concert";
    const SULFURASHAND = "Sulfuras, Hand of Ragnaros";

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
        if ($this->getName() != self::AGEDBRIE and $this->getName() != self::BACKSTAGEPASES) {
            if ($this->getQuality() > self::MINQUALITY) {
                if ($this->getName() != self::SULFURASHAND) {
                    $this->setQuality($this->getQuality() - 1);
                }
            }
        } else {
            if ($this->getQuality() < self::MAXQUALITY) {
                $this->setQuality($this->getQuality() + 1);
                if ($this->getName() == self::BACKSTAGEPASES) {
                    if ($this->getSellIn() < 11) {
                        if ($this->getQuality() < self::MAXQUALITY) {
                            $this->setQuality($this->getQuality() + 1);
                        }
                    }
                    if ($this->getSellIn() < 6) {
                        if ($this->getQuality() < self::MAXQUALITY) {
                            $this->setQuality($this->getQuality() + 1);
                        }
                    }
                }
            }
        }

        if ($this->getName() != self::SULFURASHAND) {
            $this->setSellIn($this->getSellIn() - 1);
        }

        if ($this->getSellIn() < 0) {
            if ($this->getName() != self::AGEDBRIE) {
                if ($this->getName() != self::BACKSTAGEPASES) {
                    if ($this->getQuality() > self::MINQUALITY) {
                        if ($this->getName() != self::SULFURASHAND) {
                            $this->setQuality($this->getQuality() - 1);
                        }
                    }
                } else {
                    $this->setQuality($this->getQuality() - $this->getQuality());
                }
            } else {
                if ($this->getQuality() < self::MAXQUALITY) {
                    $this->setQuality($this->getQuality() + 1);
                }
            }
        }
    }

}
