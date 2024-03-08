<?php

namespace Core\Requests;

use Core\Helpers\Json;
use Core\Validation\Validator;

abstract class FormRequest extends Validator implements IRequest
{
    protected array $data           = [];
    protected array $validatedData  = [];
    protected array $validators     = [];
    protected array $messages       = [];
    protected array $errors         = [];
    
    public function __construct()
    {
          $this->data = Json::decode(file_get_contents('php://input')) ?? [];
          if(!static::authorized() ?? false){
              die("Not Athorized!");
          }
          $this->validators = static::validate();
          $this->messages   = static::messages();
    }

    public final function validated():array
    {
        return $this->data;
    }

    public function only(array $keys):array
    {
        $filtered = array_filter($this->validatedData, function ($key, $item) use ($keys){
            return in_array($key, $keys);
        });
    }

    public abstract function authorized():bool;
    public abstract function validate():array;
    public abstract function messages():array;
}