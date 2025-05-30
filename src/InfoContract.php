<?php

declare(strict_types=1);

namespace Sweet0dream;

use Sweet0dream\Enum\TypeEnum;
use Sweet0dream\Enum\Info\{AparInfoEnum,
    BodyInfoEnum,
    ChestInfoEnum,
    DickInfoEnum,
    HairInfoEnum,
    HeightInfoEnum,
    IntimInfoEnum,
    RoleInfoEnum,
    ServInfoEnum,
    WeightInfoEnum,
    YearInfoEnum};

class InfoContract extends AbstractContract
{
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

    const APAR = [
        'key' => 'apar',
        'name' => 'Прием клиентов',
        'value' => AparInfoEnum::class
    ];

    const INFO_IND = [
        self::YEAR,
        self::HEIGHT,
        self::WEIGHT,
        self::CHEST,
        self::HAIR
    ];
    const INFO_SAL = [
        self::APAR
    ];
    const INFO_MAN = [
        self::YEAR,
        self::HEIGHT,
        self::WEIGHT,
        self::DICK,
        self::BODY,
        self::SERV,
        self::ROLE
    ];
    const INFO_TSL = [
        self::YEAR,
        self::HEIGHT,
        self::WEIGHT,
        self::CHEST,
        self::DICK,
        self::ROLE,
        self::HAIR
    ];
    const INFO_MAS = [
        self::YEAR,
        self::HEIGHT,
        self::WEIGHT,
        self::SERV,
        self::INTIM
    ];

    public function __construct(
        private readonly TypeEnum $type,
    ) {
    }

    public function getData(): ?array
    {
        $infoFields = match ($this->type) {
            TypeEnum::ind => self::INFO_IND,
            TypeEnum::sal => self::INFO_SAL,
            TypeEnum::man => self::INFO_MAN,
            TypeEnum::tsl => self::INFO_TSL,
            TypeEnum::mas => self::INFO_MAS,
        };

        foreach ($infoFields as $infoField) {
            $result[$infoField['key']] = $this->getFieldEntity(
                name: $infoField['name'],
                require: true,
                value: array_column($infoField['value']::cases(), 'value'),
            );
        }

        return $result ?? null;
    }
}