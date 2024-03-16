<?php

namespace App\Persistense\Repositories;


use App\Domain\Event\Contracts\IEventRepository;
use App\Persistense\Models\Event;
use Exception;
use PDO;

class EventRepository implements IEventRepository
{
    public final function create(array $attributes):mixed
    {
        try{
            // $sql = 'INSERT INTO events ';
            // $cnx = new PDO('mysql:host=127.0.0.1;dbname=calander_api;', 'calander_api', 'user');
            // $columns = array_keys($attributes);
            // $sql .= '('. implode(', ', array_map(fn($item)=> "'$item'", $columns)). ')';
            // $sql .= ' VALUES ('. implode(', ', array_fill(0, count($columns), '?')) .' )';
            // dd($sql, array_values($attributes));
            // $stmt = $cnx->prepare($sql);
            // return $stmt->execute(array_values($attributes));
            // return Event::create($attributes);
            return [];
        }catch(Exception $er){
            dd($er->getMessage());
        }
        
    }
}