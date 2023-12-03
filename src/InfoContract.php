<?php

namespace Sweet0dream;

class InfoContract extends AbstractContract {

    private string $type;

    public function __construct(
        string $type
    )
    {
        $this->type = $type;
    }

    private function formatNum(int $number, array $suffix): string
    {
        $keys = [2, 0, 1, 1, 1, 2];
        $mod = $number % 100;
        $suffix_key = ($mod > 7 && $mod < 20) ? 2: $keys[min($mod % 10, 5)];
        return $number . ' ' . $suffix[$suffix_key];
    }

    public function getData(): ?array
    {
        if ($this->type == 'ind') {
            $result = [
                'name' => $this->getField(
                    'name',
                    'Имя/Псевдоним',
                    'text',
                    true,
                    null
                ),
                'year' => $this->getField(
                    'year',
                    'Возраст',
                    'select',
                    true,
                    range(18,60),
                    ['год', 'года', 'лет']
                ),
                'height' => $this->getField(
                    'height',
                    'Рост',
                    'select',
                    true,
                    range(120,210),
                    'см.'
                ),
                'weight' => $this->getField(
                    'weight',
                    'Вес',
                    'select',
                    true,
                    range(30,200),
                    'кг.'
                ),
                'chest' => $this->getField(
                    'chest',
                    'Грудь',
                    'select',
                    true,
                    ['Менее 1-го', '1-ый размер', '2-ой размер', '3-ий размер', '4-ый размер', '5-ый размер', '6-ой размер', 'Более 6-го']
                ),
                'hair' => $this->getField(
                    'hair',
                    'Волосы',
                    'select',
                    true,
                    ['Блондинка', 'Брюнетка', 'Шатенка', 'Рыжая', 'Лысая']
                ),
            ];
        }

        if ($this->type == 'sal') {
            $result = [
                'name' => ['name' => 'Название салона', 'type' => 'text', 'require' => 1],
            ];
        }

        if ($this->type == 'man') {
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

        if ($this->type == 'tsl') {
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

}