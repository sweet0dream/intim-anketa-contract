<?php

namespace Sweet0dream;
use Sweet0dream\InfoContract;
use Sweet0dream\ServiceContract;
use Sweet0dream\PriceContract;

class IntimAnketaContract {

    private InfoContract $info;
    private ServiceContract $service;
    private PriceContract $price;

    private function __construct(
        InfoContract $info,
        ServiceContract $service,
        PriceContract $price
    )
    {
        $this->info = $info;
        $this->service = $service;
        $this->price = $price;
    }
    
    public function getField(string $key): array
    {
        return [
            'info' => $this->info->setType($key)->getData(),
            'service' => $this->service->getData(),
            'price' => $this->price->setType($key)->getData(),
            'dop' => [
                'text' => ['name' => 'Дополнительно о себе', 'type' => 'textarea', 'require' => 1]
            ]
        ];
    }

}