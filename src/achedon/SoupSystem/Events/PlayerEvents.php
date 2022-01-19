<?php

namespace achedon\SoupSystem\Events;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\VanillaItems;
use pocketmine\player\GameMode;

class PlayerEvents implements Listener{

    public function onInteract(PlayerInteractEvent $event){

        $player = $event->getPlayer();
        $item = $event->getItem();
        if($item->getId() == VanillaItems::BEETROOT_SOUP()->getId()){
            if($player->getGamemode() === GameMode::SURVIVAL() || $player->getGamemode() === GameMode::ADVENTURE()){
                if($player->getHealth() == 20){
                    $player->sendMessage("Your life is complete");
                }else{
                        $player->setHealth($player->getHealth() + 3);
                        $player->sendMessage("You have been treated");
                        $player->getInventory()->removeItem($player->getInventory()->getItemInHand());
                }
            }else{
                $player->sendMessage("Please be in survival gamemode to use this soup");
            }
        }
    }
}