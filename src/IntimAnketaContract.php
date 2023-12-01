<?php

namespace Sweet0dream;

class IntimAnketaContract {

    private const SERVICE_SEX = [
        'name' => 'Секс',
        'value' => [
            'sk' => 'классический',
            'sa' => 'анальный',
            'sg' => 'групповой'
        ]
    ];

    private const SERVICE_MIN = [
        'name' => 'Минет',
        'value' => [
            'mp' => 'в презервативе',
            'mb' => 'без презерватива',
            'mg' => 'глубокий'
        ]
    ];

    private const SERVICE_OKO = [
        'name' => 'Окончание',
        'value' => [
            'og' => 'на грудь',
            'ol' => 'на лицо',
            'or' => 'в рот'
        ]
    ];

    private const SERVICE_MAS = [
        'name' => 'Массаж',
        'value' => [
            'mk' => 'классический',
            'me' => 'эротический',
            'mu' => 'урологический'
        ]
    ];

    private const SERVICE_SAD = [
        'name' => 'БДСМ',
        'value' => [
            'sp' => 'порка',
            'ss' => 'страпон',
            'sr' => 'госпожа/рабыня'
        ]
    ];

    private const SERVICE_ZRE = [
        'name' => 'Зрелища',
        'value' => [
            'zl' => 'лесби шоу',
            'zs' => 'стриптиз',
            'zi' => 'игрушки'
        ]
    ];

    private const SERVICE_ORA = [
        'name' => 'Оральные',
        'value' => [
            'ok' => 'кунилингус',
            'oa' => 'анилингус',
            'op' => 'поза 69'
        ]
    ];

    private const SERVICE_IZV = [
        'name' => 'Извращения',
        'value' => [
            'iz' => 'золотой дождь',
            'ik' => 'копро',
            'if' => 'фистинг'
        ]
    ];

    private const SERVICE_PRO = [
        'name' => 'Прочее',
        'value' => [
            'pe' => 'эскорт',
            'ps' => 'с семейной парой',
            'pv' => 'фото/видео съемка'
        ]
    ];

    private const SERVICE = [
        'sex' => self::SERVICE_SEX,
        'min' => self::SERVICE_MIN,
        'oko' => self::SERVICE_OKO,
        'mas' => self::SERVICE_MAS,
        'sad' => self::SERVICE_SAD,
        'zre' => self::SERVICE_ZRE,
        'ora' => self::SERVICE_ORA,
        'izv' => self::SERVICE_IZV,
        'pro' => self::SERVICE_PRO
    ];

    function formatNum($number, $suffix): string
    {
        $keys = [2, 0, 1, 1, 1, 2];
        $mod = $number % 100;
        $suffix_key = ($mod > 7 && $mod < 20) ? 2: $keys[min($mod % 10, 5)];
        return $number . ' ' . $suffix[$suffix_key];
    }
    
    public function getField(string $key): array
    {
        return [
            'info' => $this->getInfo($key),
            'service' => self::SERVICE,
            'price' => $this->getPrice($key),
            'dop' => [
                'text' => ['name' => 'Дополнительно о себе', 'type' => 'textarea', 'require' => 1]
            ]
        ];
    }

    private function getInfo(string $key): ?array
    {
        if ($key == 'ind') {
            $result = [
                'name' => ['name' => 'Имя/Псевдоним', 'type' => 'text', 'require' => 1],
                'year' => ['name' => 'Возраст', 'type' => 'select', 'require' => 1, 'value' => array_map(function($a){return $this->formatNum($a, ['год', 'года', 'лет']);}, range(18,60))],
                'height' => ['name' => 'Рост', 'type' => 'select', 'require' => 1, 'value' => array_map(function($a){return $a.' см';}, range(120,210))],
                'weight' => ['name' => 'Вес', 'type' => 'select', 'require' => 1, 'value' => array_map(function($a){return $a.' кг';}, range(30,200))],
                'chest' => ['name' => 'Грудь', 'type' => 'select', 'require' => 1, 'value' => ['Менее 1-го', '1-ый размер', '2-ой размер', '3-ий размер', '4-ый размер', '5-ый размер', '6-ой размер', 'Более 6-го']],
                'hair' => ['name' => 'Волосы', 'type' => 'select', 'require' => 1, 'value' => ['Блондинка', 'Брюнетка', 'Шатенка', 'Рыжая', 'Лысая']]
            ];
        }

        if ($key == 'sal') {
            $result = [
                'name' => ['name' => 'Название салона', 'type' => 'text', 'require' => 1],
            ];
        }

        if ($key == 'man') {
            $result = [
                'name' => ['name' => 'Имя/Псевдоним', 'type' => 'text', 'require' => 1],
                'year' => ['name' => 'Возраст', 'type' => 'select', 'require' => 1, 'value' => array_map(function($a){return $this->formatNum($a, ['год', 'года', 'лет']);}, range(18,60))],
                'height' => ['name' => 'Рост', 'type' => 'select', 'require' => 1, 'value' => array_map(function($a){return $a.' см';}, range(120,210))],
                'weight' => ['name' => 'Вес', 'type' => 'select', 'require' => 1, 'value' => array_map(function($a){return $a.' кг';}, range(30,200))],
                'dick' => ['name' => 'Член', 'type' => 'select', 'require' => 1, 'value' => array_map(function($a){return $a.' см';}, range(10,30))],
                'body' => ['name' => 'Тело', 'type' => 'select', 'require' => 1, 'value' => ['Худощавое', 'Обычное', 'Спортивное', 'Плотное']],
                'serv' => ['name' => 'Услуги', 'type' => 'select', 'require' => 1, 'value' => ['Для женщин', 'Для мужчин', 'Для всех']],
                'role' => ['name' => 'Роль', 'type' => 'select', 'require' => 1, 'value' => ['Активный', 'Пассивный', 'Универсал']]
            ];
        }

        if ($key == 'tsl') {
            $result = [
                'name' => ['name' => 'Имя/Псевдоним', 'type' => 'text', 'require' => 1],
                'year' => ['name' => 'Возраст', 'type' => 'select', 'require' => 1, 'value' => array_map(function($a){return $this->formatNum($a, ['год', 'года', 'лет']);}, range(18,60))],
                'height' => ['name' => 'Рост', 'type' => 'select', 'require' => 1, 'value' => array_map(function($a){return $a.' см';}, range(120,210))],
                'weight' => ['name' => 'Вес', 'type' => 'select', 'require' => 1, 'value' => array_map(function($a){return $a.' кг';}, range(30,200))],
                'chest' => ['name' => 'Грудь', 'type' => 'select', 'require' => 1, 'value' => ['Менее 1-го', '1-ый размер', '2-ой размер', '3-ий размер', '4-ый размер', '5-ый размер', '6-ой размер', 'Более 6-го']],
                'dick' => ['name' => 'Член', 'type' => 'select', 'require' => 1, 'value' => array_map(function($a){return $a.' см';}, range(10,30))],
                'role' => ['name' => 'Роль', 'type' => 'select', 'require' => 1, 'value' => ['Активный', 'Пассивный', 'Универсал']],
                'hair' => ['name' => 'Волосы', 'type' => 'select', 'require' => 1, 'value' => ['Блондинка', 'Брюнетка', 'Шатенка', 'Рыжая', 'Лысая']]
            ];
        }

        return $result ?? null;
    }

    private function getPrice(string $key): ?array
    {
        if ($key == 'ind') {
            $result = [
                'express' => ['name' => 'Экспресс', 'type' => 'text'],
                'onehour' => ['name' => 'Один час', 'type' => 'text', 'require' => 1],
                'twohour' => ['name' => 'Два часа', 'type' => 'text'],
                'night' => ['name' => 'Ночь', 'type' => 'text']
            ];
        }

        if ($key == 'sal') {
            $result = [
                'onehour' => ['name' => 'Один час', 'type' => 'text', 'require' => 1],
                'night' => ['name' => 'Ночь', 'type' => 'text']
            ];
        }

        if ($key == 'man') {
            $result = [
                'express' => ['name' => 'Экспресс', 'type' => 'text'],
                'onehour' => ['name' => 'Один час', 'type' => 'text', 'require' => 1],
                'twohour' => ['name' => 'Два часа', 'type' => 'text'],
                'night' => ['name' => 'Ночь', 'type' => 'text']
            ];
        }

        if ($key == 'tsl') {
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