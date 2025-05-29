<?php

declare(strict_types=1);

namespace Sweet0dream\Enum\Info;

enum ServInfoEnum: string
{
    case Woman = 'Для женщин';
    case Man = 'Для мужчин';
    case All = 'Для всех';
}