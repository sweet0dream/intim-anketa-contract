<?php

declare(strict_types=1);

namespace Sweet0dream\Enum\Meta;

enum SingularMetaEnum: string
{
    case ind = 'Индивидуалка';
    case sal = 'Салон';
    case man = 'Мужчина по вызову';
    case tsl = 'Транссексуалка';
    case mas = 'Эромассаж';
}