<?php

namespace App\Domain\Event\Entities;

use App\Domain\Event\ValueObject\ColorValueObject;

interface EventEntity
{
    public function getTitle(): string;
    public function getStart(): string;
    public function getEnd(): string;
    public function getAllDay(): bool;
    public function getBackgroundColor(): ColorValueObject;
    public function getBorderColor(): ColorValueObject;
}