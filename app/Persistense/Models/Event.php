<?php

namespace App\Persistense\Models;

use App\Domain\Event\Entities\EventEntity;
use Illuminate\Database\Eloquent\Model;

class Event extends Model implements EventEntity
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


//id
//title
//start_data
//end_ate
//bg_color
//border_color
//every_day
//created_at
//updated_at

    public $fillable = [];

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getStartData(): string
    {
        return $this->start_date;
    }

    public function getEndAt(): string
    {
        return $this->end_ate;
    }

    public function getBgColor(): string
    {
        return $this->bg_color;
    }

    public function getBorderColor(): string
    {
        return $this->border_color;
    }

    public function getEveryDay(): int
    {
        return $this->every_day;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }
}