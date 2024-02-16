<?php

namespace Sweet0dream;

class InfoContract extends AbstractContract {

    const NAME = [
        'key' => 'name',
        'name' => 'Имя/Псевдоним'
    ];

    const YEAR = [
        'key' => 'year',
        'name' => 'Возраст',
        'value' => [
            'start' => 18,
            'end' => 60
        ],
        'suffix' => ['год', 'года', 'лет']
    ];

    const HEIGHT = [
        'key' => 'height',
        'name' => 'Рост',
        'value' => [
            'start' => 120,
            'end' => 210
        ],
        'suffix' => 'см.'
    ];

    const WEIGHT = [
        'key' => 'weight',
        'name' => 'Вес',
        'value' => [
            'start' => 30,
            'end' => 200
        ],
        'suffix' => 'кг.'
    ];

    const CHEST = [
        'key' => 'chest',
        'name' => 'Грудь',
        'value' => ['Менее 1-го', '1-ый размер', '2-ой размер', '3-ий размер', '4-ый размер', '5-ый размер', '6-ой размер', 'Более 6-го']
    ];

    const HAIR = [
        'key' => 'hair',
        'name' => 'Волосы',
        'value' => ['Блондинка', 'Брюнетка', 'Шатенка', 'Рыжая', 'Русая', 'Лысая']
    ];

    const DICK = [
        'key' => 'dick',
        'name' => 'Член',
        'value' => [
            'start' => 10,
            'end' => 30
        ],
        'suffix' => 'см.'
    ];

    const BODY = [
        'key' => 'body',
        'name' => 'Телосложение',
        'value' => ['Худощавое', 'Обычное', 'Спортивное', 'Плотное']
    ];

    const SERV = [
        'key' => 'serv',
        'name' => 'Услуги',
        'value' => ['Для женщин', 'Для мужчин', 'Для всех']
    ];

    const ROLE = [
        'key' => 'role',
        'name' => 'Роль',
        'value' => ['Активный', 'Пассивный', 'Универсал']
    ];

    const INFO = [
        IntimAnketaContract::TYPE_IND => [
            self::NAME,
            self::YEAR,
            self::HEIGHT,
            self::WEIGHT,
            self::CHEST,
            self::HAIR
        ],
        IntimAnketaContract::TYPE_SAL => [
            self::NAME
        ],
        IntimAnketaContract::TYPE_MAN => [
            self::NAME,
            self::YEAR,
            self::HEIGHT,
            self::WEIGHT,
            self::DICK,
            self::BODY,
            self::SERV,
            self::ROLE
        ],
        IntimAnketaContract::TYPE_TSL => [
            self::NAME,
            self::YEAR,
            self::HEIGHT,
            self::WEIGHT,
            self::CHEST,
            self::DICK,
            self::ROLE,
            self::HAIR
        ],
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
                if(isset($infoField['value'])) {
                    $value = $infoField['value'];
                    if (isset($infoField['suffix'])) {
                        $value = range($value['start'], $value['end']);
                    }
                }
                $result[$infoField['key']] = $this->getFieldEntity(
                    $infoField['key'],
                    $infoField['name'],
                    isset($value) ? 'select' : 'text',
                    1,
                    $value ?? null,
                    $infoField['suffix'] ?? false
                );
            }
        }
        return $result ?? null;
    }

}