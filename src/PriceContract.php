<?php

namespace Sweet0dream;

class PriceContract {

    private string $type;

    public function __construct(
        string $type
    ) {
        $this->type = $type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;
        return $this;
    }

    public function getData(): ?array
    {
        if ($this->type == 'ind') {
            $result = [
                'express' => ['name' => 'Экспресс', 'type' => 'text'],
                'onehour' => ['name' => 'Один час', 'type' => 'text', 'require' => 1],
                'twohour' => ['name' => 'Два часа', 'type' => 'text'],
                'night' => ['name' => 'Ночь', 'type' => 'text']
            ];
        }

        if ($this->type == 'sal') {
            $result = [
                'onehour' => ['name' => 'Один час', 'type' => 'text', 'require' => 1],
                'night' => ['name' => 'Ночь', 'type' => 'text']
            ];
        }

        if ($this->type == 'man') {
            $result = [
                'express' => ['name' => 'Экспресс', 'type' => 'text'],
                'onehour' => ['name' => 'Один час', 'type' => 'text', 'require' => 1],
                'twohour' => ['name' => 'Два часа', 'type' => 'text'],
                'night' => ['name' => 'Ночь', 'type' => 'text']
            ];
        }

        if ($this->type == 'tsl') {
            $result = [
                'express' => ['name' => 'Экспресс', 'type' => 'text'],
                'onehour' => ['name' => 'Один час', 'type' => 'text', 'require' => 1],
                'twohour' => ['name' => 'Два часа', 'type' => 'text'],
                'night' => ['name' => 'Ночь', 'type' => 'text']
            ];
        }

        return $result ?? null;
    }
}