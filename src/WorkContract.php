<?php

declare(strict_types=1);

namespace Sweet0dream;

use Sweet0dream\Enum\Work\TimeWorkEnum;

class WorkContract extends AbstractContract
{
    const TIME_FROM = [
        'key' => 'time_from',
        'name' => 'От',
        'value' => TimeWorkEnum::class
    ];

    const TIME_TO = [
        'key' => 'time_to',
        'name' => 'До',
        'value' => TimeWorkEnum::class
    ];

    const TIME_DATA = [
        self::TIME_FROM,
        self::TIME_TO
    ];

    public function getData(): ?array
    {
        foreach (self::TIME_DATA as $infoField) {
            $result[$infoField['key']] = $this->getFieldEntity(
                name: $infoField['name'],
                value: array_column($infoField['value']::cases(), 'value'),
            );
        }

        return $result ?? null;
    }
}