<?php

declare(strict_types=1);

namespace ClickedTran\GiftCode\forms\api;

use Override;
use pocketmine\player\Player;
use venndev\vformoopapi\results\VResultString;
use ClickedTran\GiftCode\utils\ConfigUtil;

final class ProcessMessage extends VResultString
{

    public function __construct(
        string                  $nestedString,
        private readonly ?Player $player = null
    )
    {
        parent::__construct($nestedString);
    }

    #[Override] public function getResult(): string
    {
        return ConfigUtil::getNested(
            message: $this->getInput(),
            replaces: [
                "{player}" => $this->getPlayer()?->getName() ?? "Unknown"
            ]
        );
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

}