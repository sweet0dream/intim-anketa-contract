<?php

namespace Sweet0dream;
use Sweet0dream\AbstractContract;
use Sweet0dream\ServiceContract;
use Sweet0dream\PriceContract;

class IntimAnketaContract {

    const TYPE = [
        'ind',
        'sal',
        'man',
        'tsl'
    ];

    private string $type;

    public function __construct(
        string $type
    )
    {
        $this->type = $type;
    }

    private const FIELD_DOP = [
        'text' => ['name' => 'Дополнительно о себе', 'type' => 'textarea', 'require' => 1]
    ];
    
    public function getField(): ?array
    {
        return in_array($this->type, self::TYPE) ? [
            'info' => (new InfoContract($this->type))->getData(),
            'service' => (new ServiceContract())->getData(),
            'price' => (new PriceContract($this->type))->getData(),
            'dop' => self::FIELD_DOP
        ] : null;
    }

}