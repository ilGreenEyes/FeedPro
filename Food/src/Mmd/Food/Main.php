<?php

declare(strict_types=1);

namespace Mmd\Food;

use pocketmine\command\CommandSender;
use pocketmine\network\mcpe\protocol\LabTablePacket;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\command\Command;
class Main extends PluginBase implements Listener{
    public function onEnable(): void{
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
        if (!$sender instanceof Player) return false;
        if (!$sender->hasPermission("food.use")){
            $sender->sendMessage(TextFormat::DARK_RED . "you don't have Permission!");
            return false;
        }
        $sender->setFood(20);
        $sender->setSaturation(20);
        $sender->sendMessage(TextFormat::GREEN . "Food full!");
        return false;
    }
}
