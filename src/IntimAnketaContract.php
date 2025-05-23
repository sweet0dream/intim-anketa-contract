<?php

namespace Sweet0dream;
use Sweet0dream\AbstractContract;
use Sweet0dream\ServiceContract;
use Sweet0dream\PriceContract;

class IntimAnketaContract {

    const TYPE_IND = 'ind';
    const TYPE_SAL = 'sal';
    const TYPE_MAN = 'man';
    const TYPE_TSL = 'tsl';
    const TYPE_MAS = 'mas';

    const TYPE = [
        self::TYPE_IND,
        self::TYPE_SAL,
        self::TYPE_MAN,
        self::TYPE_TSL,
        self::TYPE_MAS,
    ];

    const META = [
        ['Индивидуалка', 'Индивидуалки'],
        ['Салон', 'Салоны'],
        ['Мужчина по вызову', 'Мужской эскорт'],
        ['Транссексуалка', 'Трансы'],
        ['Эромассаж', 'Эротический массаж']
    ];

    private const FIELD_DOP = [
        'text' => ['name' => 'Дополнительно о себе', 'type' => 'textarea', 'require' => 1]
    ];

    private string $type;

    public function __construct(
        string $type
    )
    {
        $this->type = $type;
    }

    public function getField(): ?array
    {
        return in_array($this->type, self::TYPE) ? [
            'info' => (new InfoContract($this->type))->getData(),
            'service' => (new ServiceContract($this->type))->getData(),
            'price' => (new PriceContract($this->type))->getData(),
            'dop' => self::FIELD_DOP
        ] : null;
    }

    public function toJson(): false|string
    {
        return json_encode($this->getField(), JSON_NUMERIC_CHECK|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }

    public function getSingularMeta(): array
    {
        return array_combine(self::TYPE, array_map(fn($meta) => $meta[0], self::META));
    }

    public function getPluralMeta(): array
    {
        return array_combine(self::TYPE, array_map(fn($meta) => $meta[1], self::META));
    }

    public function getSingularTypeName(): string
    {
        return $this->getSingularMeta()[$this->type];
    }

    public function getPluralTypeName(): string
    {
        return $this->getPluralMeta()[$this->type];
    }

}