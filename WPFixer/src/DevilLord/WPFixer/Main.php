<?php
namespace DevilLord\WPFixer;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;

class Main extends PluginBase implements Listener {
  public function onEnable() {
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->saveDefaultConfig();
  }
  public function onJoin(PlayerJoinEvent $event) {
    if($this->getConfig()->get("enableCommand") == "true"){
      $player = $event->getPlayer();
      foreach($this->getConfig()->get("Command") as $command){
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(), str_replace("{player}", $player->getName(), $command));	
      }
    }
  }
}
?>
