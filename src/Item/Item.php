<?php

namespace Runroom\GildedRose\Item;


class Item extends ItemInterface
{

    public function update()
    {
        if ($this->getName() != self::AGEDBRIE and $this->getName() != self::BACKSTAGEPASES) {
            if ($this->getQuality() > self::MINQUALITY) {
                if ($this->getName() != self::SULFURASHAND) {
                    $this->decreaseQuality();
                }
            }
        } else {
            if ($this->getQuality() < self::MAXQUALITY) {
                $this->setQuality($this->getQuality() + 1);
                if ($this->getName() == self::BACKSTAGEPASES) {
                    if ($this->getSellIn() < 11) {
                        if ($this->getQuality() < self::MAXQUALITY) {
                            $this->increaseQuality();
                        }
                    }
                    if ($this->getSellIn() < 6) {
                        if ($this->getQuality() < self::MAXQUALITY) {
                            $this->increaseQuality();
                        }
                    }
                }
            }
        }

        if ($this->getName() != self::SULFURASHAND) {
            $this->decreaseSellIn();
        }

        if ($this->getSellIn() < 0) {
            if ($this->getName() != self::AGEDBRIE) {
                if ($this->getName() != self::BACKSTAGEPASES) {
                    if ($this->getQuality() > self::MINQUALITY) {
                        if ($this->getName() != self::SULFURASHAND) {
                            $this->decreaseQuality();
                        }
                    }
                } else {
                    $this->setQuality(0);
                }
            } else {
                if ($this->getQuality() < self::MAXQUALITY) {
                    $this->increaseQuality();
                }
            }
        }
    }

}
