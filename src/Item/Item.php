<?php

namespace Runroom\GildedRose\Item;


class Item extends ItemInterface
{

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
