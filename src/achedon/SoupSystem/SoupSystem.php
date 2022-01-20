<?php

namespace achedon\SoupSystem;

use achedon\SoupSystem\Events\PlayerEvents;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginOwned;

class SoupSystem extends PluginBase implements PluginOwned{

    protected function onEnable(): void{
        $this->getServer()->getPluginManager()->registerEvents(new PlayerEvents(), $this);
    }

    public function getOwningPlugin(): Plugin{
        return $this;
    }
}