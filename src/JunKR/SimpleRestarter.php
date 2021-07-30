<?php

namespace JunKR;

use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\ClosureTask;

class SimpleRestarter extends PluginBase{

    /**
     * 재부팅 주기.
     * 단위 : MINUTE (분)
     */
    private const RESTART_DELAY = 60;

    public function onEnable(){
        $this->getScheduler()->scheduleDelayedTask(new ClosureTask(function() : void{
            foreach($this->getServer()->getOnlinePlayers() as $player){
                $player->kick("§a§l[재부팅]\n§r§f서버가 재부팅 됩니다. 약 10초후 접속해주세요.", false);
            }
            $this->getServer()->shutdown();
        }), 120 * self::RESTART_DELAY);
    }

}