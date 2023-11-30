<?php

namespace Sweet0dream;

class IntimAnketaContract {

    function formatNum($number, $suffix): string
    {
        $keys = [2, 0, 1, 1, 1, 2];
        $mod = $number % 100;
        $suffix_key = ($mod > 7 && $mod < 20) ? 2: $keys[min($mod % 10, 5)];
        return $number . ' ' . $suffix[$suffix_key];
    }
    
    public function getField($key): false|array
    {
        $result['service'] = [
            'sex' => [
                'name' => 'Секс',
                'value' => [
                    'sk' => 'классический',
                    'sa' => 'анальный',
                    'sg' => 'групповой'
                ]
            ],
            'min' => [
                'name' => 'Минет',
                'value' => [
                    'mp' => 'в презервативе',
                    'mb' => 'без презерватива',
                    'mg' => 'глубокий'
                ]
            ],
            'oko' => [
                'name' => 'Окончание',
                'value' => [
                    'og' => 'на грудь',
                    'ol' => 'на лицо',
                    'or' => 'в рот'
                ]
            ],
            'mas' => [
                'name' => 'Массаж',
                'value' => [
                    'mk' => 'классический',
                    'me' => 'эротический',
                    'mu' => 'урологический'
                ]
            ],
            'sad' => [
                'name' => 'БДСМ',
                'value' => [
                    'sp' => 'порка',
                    'ss' => 'страпон',
                    'sr' => 'госпожа/рабыня'
                ]
            ],
            'zre' => [
                'name' => 'Зрелища',
                'value' => [
                    'zl' => 'лесби шоу',
                    'zs' => 'стриптиз',
                    'zi' => 'игрушки'
                ]
            ],
            'ora' => [
                'name' => 'Оральные',
                'value' => [
                    'ok' => 'кунилингус',
                    'oa' => 'анилингус',
                    'op' => 'поза 69'
                ]
            ],
            'izv' => [
                'name' => 'Извращения',
                'value' => [
                    'iz' => 'золотой дождь',
                    'ik' => 'копро',
                    'if' => 'фистинг'
                ]
            ],
            'pro' => [
                'name' => 'Прочее',
                'value' => [
                    'pe' => 'эскорт',
                    'ps' => 'с семейной парой',
                    'pv' => 'фото/видео съемка'
                ]
            ]
        ];

        if ($key == 'ind') {
            $result = [
                'info' => [
                    'name' => ['name' => 'Имя/Псевдоним', 'type' => 'text', 'require' => 1],
                    'year' => ['name' => 'Возраст', 'type' => 'select', 'require' => 1, 'value' => array_map(function($a){return $this->formatNum($a, ['год', 'года', 'лет']);}, range(18,60))],
                    'height' => ['name' => 'Рост', 'type' => 'select', 'require' => 1, 'value' => array_map(function($a){return $a.' см';}, range(120,210))],
                    'weight' => ['name' => 'Вес', 'type' => 'select', 'require' => 1, 'value' => array_map(function($a){return $a.' кг';}, range(30,200))],
                    'chest' => ['name' => 'Грудь', 'type' => 'select', 'require' => 1, 'value' => ['Менее 1-го', '1-ый размер', '2-ой размер', '3-ий размер', '4-ый размер', '5-ый размер', '6-ой размер', 'Более 6-го']],
                    'hair' => ['name' => 'Волосы', 'type' => 'select', 'require' => 1, 'value' => ['Блондинка', 'Брюнетка', 'Шатенка', 'Рыжая', 'Лысая']]
                ],
                'price' => [
                    'express' => ['name' => 'Экспресс', 'type' => 'text'],
                    'onehour' => ['name' => 'Один час', 'type' => 'text', 'require' => 1],
                    'twohour' => ['name' => 'Два часа', 'type' => 'text'],
                    'night' => ['name' => 'Ночь', 'type' => 'text']
                ],
                'dop' => [
                    'text' => ['name' => 'Дополнительно о себе', 'type' => 'textarea', 'require' => 1]
                ]
            ];
        }

        if ($key == 'sal') {
            $result = [
                'info' => [
                    'name' => ['name' => 'Название салона', 'type' => 'text', 'require' => 1],
                ],
                'price' => [
                    'onehour' => ['name' => 'Один час', 'type' => 'text', 'require' => 1],
                    'night' => ['name' => 'Ночь', 'type' => 'text']
                ],
                'dop' => [
                    'text' => ['name' => 'Дополнительно о салоне', 'type' => 'textarea', 'require' => 1]
                ]
            ];
        }

        if ($key == 'man') {
            $result = [
                'info' => [
                    'name' => ['name' => 'Имя/Псевдоним', 'type' => 'text', 'require' => 1],
                    'year' => ['name' => 'Возраст', 'type' => 'select', 'require' => 1, 'value' => array_map(function($a){return $this->formatNum($a, ['год', 'года', 'лет']);}, range(18,60))],
                    'height' => ['name' => 'Рост', 'type' => 'select', 'require' => 1, 'value' => array_map(function($a){return $a.' см';}, range(120,210))],
                    'weight' => ['name' => 'Вес', 'type' => 'select', 'require' => 1, 'value' => array_map(function($a){return $a.' кг';}, range(30,200))],
                    'dick' => ['name' => 'Член', 'type' => 'select', 'require' => 1, 'value' => array_map(function($a){return $a.' см';}, range(10,30))],
                    'body' => ['name' => 'Тело', 'type' => 'select', 'require' => 1, 'value' => ['Худощавое', 'Обычное', 'Спортивное', 'Плотное']],
                    'serv' => ['name' => 'Услуги', 'type' => 'select', 'require' => 1, 'value' => ['Для женщин', 'Для мужчин', 'Для всех']],
                    'role' => ['name' => 'Роль', 'type' => 'select', 'require' => 1, 'value' => ['Активный', 'Пассивный', 'Универсал']]
                ],
                'price' => [
                    'express' => ['name' => 'Экспресс', 'type' => 'text'],
                    'onehour' => ['name' => 'Один час', 'type' => 'text', 'require' => 1],
                    'twohour' => ['name' => 'Два часа', 'type' => 'text'],
                    'night' => ['name' => 'Ночь', 'type' => 'text']
                ],
                'dop' => [
                    'text' => ['name' => 'Дополнительно о себе', 'type' => 'textarea', 'require' => 1]
                ]
            ];
        }

        if ($key == 'tsl') {
            $result = [
                'info' => [
                    'name' => ['name' => 'Имя/Псевдоним', 'type' => 'text', 'require' => 1],
                    'year' => ['name' => 'Возраст', 'type' => 'select', 'require' => 1, 'value' => array_map(function($a){return $this->formatNum($a, ['год', 'года', 'лет']);}, range(18,60))],
                    'height' => ['name' => 'Рост', 'type' => 'select', 'require' => 1, 'value' => array_map(function($a){return $a.' см';}, range(120,210))],
                    'weight' => ['name' => 'Вес', 'type' => 'select', 'require' => 1, 'value' => array_map(function($a){return $a.' кг';}, range(30,200))],
                    'chest' => ['name' => 'Грудь', 'type' => 'select', 'require' => 1, 'value' => ['Менее 1-го', '1-ый размер', '2-ой размер', '3-ий размер', '4-ый размер', '5-ый размер', '6-ой размер', 'Более 6-го']],
                    'dick' => ['name' => 'Член', 'type' => 'select', 'require' => 1, 'value' => array_map(function($a){return $a.' см';}, range(10,30))],
                    'role' => ['name' => 'Роль', 'type' => 'select', 'require' => 1, 'value' => ['Активный', 'Пассивный', 'Универсал']],
                    'hair' => ['name' => 'Волосы', 'type' => 'select', 'require' => 1, 'value' => ['Блондинка', 'Брюнетка', 'Шатенка', 'Рыжая', 'Лысая']]
                ],
                'price' => [
                    'express' => ['name' => 'Экспресс', 'type' => 'text'],
                    'onehour' => ['name' => 'Один час', 'type' => 'text', 'require' => 1],
                    'twohour' => ['name' => 'Два часа', 'type' => 'text'],
                    'night' => ['name' => 'Ночь', 'type' => 'text']
                ],
                'dop' => [
                    'text' => ['name' => 'Дополнительно о себе', 'type' => 'textarea', 'require' => 1]
                ]
            ];
        }
        return false;
    }

}