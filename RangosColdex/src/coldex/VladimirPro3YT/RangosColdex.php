<?php

declare(strict_types=1);

namespace coldex\VladimirPro3YT;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\form\Form;
use pocketmine\form\SimpleForm;

class RangosColdex extends PluginBase {

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool{
        if(strtolower($cmd->getName()) === "rangos"){
            if($sender instanceof Player){
                if($sender->hasPermission("coldex.rangos")){
                    $this->openRangosForm($sender);
                    return true;
                }else{
                    $sender->sendMessage(TextFormat::RED . "No tienes permiso para usar este comando.");
                    return true;
                }
            }else{
                $sender->sendMessage(TextFormat::RED . "Este comando solo se puede usar en el juego.");
                return true;
            }
        }
        return false;
    }

    public function openRangosForm(Player $player): void{
        $form = new SimpleForm(function(Player $player, $data){
            if($data !== null){
                // Hacer algo con la selección del jugador (opcional)
            }
        });
        $form->setTitle("Rangos");
        $form->setContent("Aquí puedes ver los diferentes rangos disponibles:");
        $form->addButton("Rango 1");
        $form->addButton("Rango 2");
        $form->addButton("Rango 3");
        $form->addButton("Rango 4");
        $form->addButton("Rango 5");
        $form->addButton("Rango 6");
        $form->addButton("Rango 7");
        $form->addButton("Rango 8");
        $form->addButton("Rango 9");
        $form->addButton("Rango 10");
        $form->addButton("Salir");
        $player->sendForm($form);
    }
}