<?php

namespace TStark\Fly;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
// Player
use pocketmine\player\Player;

// Class
class Main extends PluginBase implements Listener{

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {
        if ($cmd->getName() === "fly") {
            if (!$sender instanceof Player) {
                $sender->sendMessage("This command can only be used in-game.");
                return false;
            }
            if (!isset($args[0])) {
                $sender->sendMessage("Usage: /fly <on/off>");
                return false;
            }
            switch (strtolower($args[0])) {
                case "on":
                    $sender->setAllowFlight(true);
                    $sender->sendMessage("§aFly mode enabled");
                    $sender->sendTitle("§aON");
                    break;
                case "off":
                    $sender->setAllowFlight(false);
                    $sender->setFlying(false);
                    $sender->sendMessage("§cFly mode disabled");
                    $sender->sendTitle("§cOFF");
                    break;
                default:
                    $sender->sendMessage("Usage: /fly <on/off>");
                    return false;
            }
        }
        return true;
    }
}