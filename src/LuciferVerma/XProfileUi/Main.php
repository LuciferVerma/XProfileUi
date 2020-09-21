<?php

namespace LuciferVerma\CustomUi;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;

use pocketmine\item\Item;

use pocketmine\event\Listener;
use pocketmine\event\server\ServerCommandEvent;

use pocketmine\utils\TextFormat;

class main extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getLogger()->info("XProfileUi Enabled");
    }
    
    public function onDisable(){
        $this->getLogger()->info("XProfileUi Disabled");
    }
    
    public function onCommand(CommandSender $sender, Command $cmd, String $label, Array $args) : bool{
        
        switch($cmd->getName()){
            case "pinfo":
                if($sender instanceof Player){
                    $this->form($sender);
                } 
            break;   
        }
        return true;    
    }
    
    public function form($player){
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createCustomForm(function (Player $player, array $data = null){
            
            if($data === null){
                return true;
            }
            
            $this->getServer()->dispatchcommand($player, "profile " . $data[1]);
            
        });
        $form->setTitle("§l§bRaynty Official§r");
        $form->addLabel("How Can We Help You?");
        $form->addInput("player Name" , "Enter Player Name Herr");
		$form->sendToPlayer($player);
		return $form;
    }
    
    
    
    
    
    
    
    
    
    
    
}
 