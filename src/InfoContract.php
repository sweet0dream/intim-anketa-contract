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

    public function getData(): ?array
    {
        if ($this->type == 'ind') {
            $result = [
                'name' => $this->getFieldEntity(
                    'name',
                    'Имя/Псевдоним',
                    'text',
                    true,
                    null
                ),
                'year' => $this->getFieldEntity(
                    'year',
                    'Возраст',
                    'select',
                    true,
                    range(18,60),
                    ['год', 'года', 'лет']
                ),
                'height' => $this->getFieldEntity(
                    'height',
                    'Рост',
                    'select',
                    true,
                    range(120,210),
                    'см.'
                ),
                'weight' => $this->getFieldEntity(
                    'weight',
                    'Вес',
                    'select',
                    true,
                    range(30,200),
                    'кг.'
                ),
                'chest' => $this->getFieldEntity(
                    'chest',
                    'Грудь',
                    'select',
                    true,
                    ['Менее 1-го', '1-ый размер', '2-ой размер', '3-ий размер', '4-ый размер', '5-ый размер', '6-ой размер', 'Более 6-го']
                ),
                'hair' => $this->getFieldEntity(
                    'hair',
                    'Волосы',
                    'select',
                    true,
                    ['Блондинка', 'Брюнетка', 'Шатенка', 'Рыжая', 'Лысая']
                )
            ];
        }

        if ($this->type == 'sal') {
            $result = [
                'name' => $this->getFieldEntity(
                    'name',
                    'Название салона',
                    'text',
                    true,
                    null
                )
            ];
        }

        if ($this->type == 'man') {
            $result = [
                'name' => $this->getFieldEntity(
                    'name',
                    'Имя/Псевдоним',
                    'text',
                    true,
                    null
                ),
                'year' => $this->getFieldEntity(
                    'year',
                    'Возраст',
                    'select',
                    true,
                    range(18,60),
                    ['год', 'года', 'лет']
                ),
                'height' => $this->getFieldEntity(
                    'height',
                    'Рост',
                    'select',
                    true,
                    range(120,210),
                    'см.'
                ),
                'weight' => $this->getFieldEntity(
                    'weight',
                    'Вес',
                    'select',
                    true,
                    range(30,200),
                    'кг.'
                ),
                'dick' => $this->getFieldEntity(
                    'dick',
                    'Член',
                    'select',
                    true,
                    range(10,30),
                    'см.'
                ),
                'body' => $this->getFieldEntity(
                    'body',
                    'Член',
                    'select',
                    true,
                    ['Худощавое', 'Обычное', 'Спортивное', 'Плотное']
                ),
                'serv' => $this->getFieldEntity(
                    'serv',
                    'Услуги',
                    'select',
                    true,
                    ['Для женщин', 'Для мужчин', 'Для всех']
                ),
                'role' => $this->getFieldEntity(
                    'role',
                    'Роль',
                    'select',
                    true,
                    ['Активный', 'Пассивный', 'Универсал']
                )
            ];
        }

        if ($this->type == 'tsl') {
            $result = [
                'name' => $this->getFieldEntity(
                    'name',
                    'Имя/Псевдоним',
                    'text',
                    true,
                    null
                ),
                'year' => $this->getFieldEntity(
                    'year',
                    'Возраст',
                    'select',
                    true,
                    range(18,60),
                    ['год', 'года', 'лет']
                ),
                'height' => $this->getFieldEntity(
                    'height',
                    'Рост',
                    'select',
                    true,
                    range(120,210),
                    'см.'
                ),
                'weight' => $this->getFieldEntity(
                    'weight',
                    'Вес',
                    'select',
                    true,
                    range(30,200),
                    'кг.'
                ),
                'chest' => $this->getFieldEntity(
                    'chest',
                    'Грудь',
                    'select',
                    true,
                    ['Менее 1-го', '1-ый размер', '2-ой размер', '3-ий размер', '4-ый размер', '5-ый размер', '6-ой размер', 'Более 6-го']
                ),
                'dick' => $this->getFieldEntity(
                    'dick',
                    'Член',
                    'select',
                    true,
                    range(10,30),
                    'см.'
                ),
                'role' => $this->getFieldEntity(
                    'role',
                    'Роль',
                    'select',
                    true,
                    ['Активный', 'Пассивный', 'Универсал']
                ),
                'hair' => $this->getFieldEntity(
                    'hair',
                    'Волосы',
                    'select',
                    true,
                    ['Блондинка', 'Брюнетка', 'Шатенка', 'Рыжая', 'Лысая']
                )
            ];
        }

        return $result ?? null;
    }

}