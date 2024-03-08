<?php

namespace App\Domain\Event\UseCases\AddEvent\Request;

class AddEventRequestModel
{
    public function __construct(private readonly array $attributes)
    {}

    public function getId(): int
    {
        return $this->attributes['id'] ?? 0;
    }

    public function getTitle(): string
    {
        return $this->attributes['title'];
    }

    public function getStartData(): string
    {
        return $this->attributes['start_data'];
    }

    public function getEndAt(): string
    {
        return $this->attributes['end_ate'];
    }

    public function getBgColor(): string
    {
        return $this->attributes['bg_color'];
    }

    public function getBorderColor(): string
    {
        return $this->attributes['border_color'];
    }

    public function getEveryDay(): int
    {
        return $this->attributes['every_day'];
    }

    public function getCreatedAt(): string
    {
        return date('Y-m-d H:i:s');
    }

    public function getUpdatedAt(): string
    {
        return date('Y-m-d H:i:s');
    }


}