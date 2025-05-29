<?php

namespace Sweet0dream;

use Sweet0dream\Enum\Info\BodyInfoEnum;
use Sweet0dream\Enum\Info\ChestInfoEnum;
use Sweet0dream\Enum\Info\DickInfoEnum;
use Sweet0dream\Enum\Info\HairInfoEnum;
use Sweet0dream\Enum\Info\HeightInfoEnum;
use Sweet0dream\Enum\Info\IntimInfoEnum;
use Sweet0dream\Enum\Info\RoleInfoEnum;
use Sweet0dream\Enum\Info\ServInfoEnum;
use Sweet0dream\Enum\Info\WeightInfoEnum;
use Sweet0dream\Enum\Info\YearInfoEnum;

class InfoContract extends AbstractContract {
    const YEAR = [
        'key' => 'year',
        'name' => 'Возраст',
        'value' => YearInfoEnum::class
    ];

    const HEIGHT = [
        'key' => 'height',
        'name' => 'Рост',
        'value' => HeightInfoEnum::class
    ];

    const WEIGHT = [
        'key' => 'weight',
        'name' => 'Вес',
        'value' => WeightInfoEnum::class
    ];

    const CHEST = [
        'key' => 'chest',
        'name' => 'Грудь',
        'value' => ChestInfoEnum::class
    ];

    const HAIR = [
        'key' => 'hair',
        'name' => 'Волосы',
        'value' => HairInfoEnum::class
    ];

    const DICK = [
        'key' => 'dick',
        'name' => 'Член',
        'value' => DickInfoEnum::class
    ];

    const BODY = [
        'key' => 'body',
        'name' => 'Телосложение',
        'value' => BodyInfoEnum::class
    ];

    const SERV = [
        'key' => 'serv',
        'name' => 'Услуги',
        'value' => ServInfoEnum::class
    ];

    const ROLE = [
        'key' => 'role',
        'name' => 'Роль',
        'value' => RoleInfoEnum::class
    ];

    const INTIM = [
        'key' => 'intim',
        'name' => 'Интим',
        'value' => IntimInfoEnum::class
    ];

    const INFO = [
        IntimAnketaContract::TYPE_IND => [
            self::YEAR,
            self::HEIGHT,
            self::WEIGHT,
            self::CHEST,
            self::HAIR
        ],
        IntimAnketaContract::TYPE_SAL => [
        ],
        IntimAnketaContract::TYPE_MAN => [
            self::YEAR,
            self::HEIGHT,
            self::WEIGHT,
            self::DICK,
            self::BODY,
            self::SERV,
            self::ROLE
        ],
        IntimAnketaContract::TYPE_TSL => [
            self::YEAR,
            self::HEIGHT,
            self::WEIGHT,
            self::CHEST,
            self::DICK,
            self::ROLE,
            self::HAIR
        ],
        IntimAnketaContract::TYPE_MAS => [
            self::YEAR,
            self::HEIGHT,
            self::WEIGHT,
            self::SERV,
            self::INTIM
        ]
    ];

    private string $type;

    public function __construct(
        string $type
    )
    {
        $this->type = $type;
    }

    public function getData(): ?array
    {
        if (isset(self::INFO[$this->type])) {
            foreach (self::INFO[$this->type] as $infoField) {
                $result[$infoField['key']] = $this->getFieldEntity(
                    key: $infoField['key'],
                    name: $infoField['name'],
                    type: 'select',
                    require: 1,
                    value: array_map(fn($v) => $v->value, $infoField['value']::cases())
                );
            }
        }
        return $result ?? null;
    }
}