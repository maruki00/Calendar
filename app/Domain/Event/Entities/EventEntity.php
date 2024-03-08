<?php

namespace App\Domain\Event\Entities;

use App\Domain\Event\ValueObject\ColorValueObject;

interface EventEntity
{
//    private int    $id
//    private string $title
//    private string $startData
//    private string $endAt
//    private string $bgColor
//    private string $borderColor
//    private int    $everyDay
//    private string $createdAt
//    private string $updatedAt
    public function getId(): int;
    public function getTitle(): string;
    public function getStartData(): string;
    public function getEndAt(): string;
    public function getBgColor(): string;
    public function getBorderColor(): string;
    public function getEveryDay(): int;
    public function getCreatedAt(): string;
    public function getUpdatedAt(): strinG;
}