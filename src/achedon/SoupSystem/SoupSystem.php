<?php

namespace achedon\SoupSystem;

use achedon\SoupSystem\Events\PlayerEvents;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginOwned;

class SoupSystem extends PluginBase implements PluginOwned{

    private static SoupSystem $instance;

    protected function onEnable(): void{
        @mkdir($this->getDataFolder());
        self::$instance = $this;
        $this->getServer()->getPluginManager()->registerEvents(new PlayerEvents(), $this);
        $this->saveResource("config.yml");
    }

    protected function onDisable(): void{
        $this->saveResource("config.yml");
    }

    /** @return static */
    public static function getInstance(): self{
        return self::$instance;
    }

    public function getOwningPlugin(): Plugin
    {
        return SoupSystem::getInstance();
    }
}