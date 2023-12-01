<?php

namespace Sweet0dream;
use Sweet0dream\InfoContract;
use Sweet0dream\ServiceContract;
use Sweet0dream\PriceContract;

class IntimAnketaContract {

    private const FIELD_DOP = [
        'text' => ['name' => 'Дополнительно о себе', 'type' => 'textarea', 'require' => 1]
    ];
    
    public function getField(string $key): array
    {
        return [
            'info' => (new InfoContract($key))->getData(),
            'service' => (new ServiceContract())->getData(),
            'price' => (new PriceContract($key))->getData(),
            'dop' => self::FIELD_DOP
        ];
    }

}