<?php

namespace Sweet0dream;

class PriceContract extends AbstractContract {

    const EXPRESS = ['express', 'Экспресс'];
    const ONEHOUR = ['onehour', 'Один час'];
    const TWOHOUR = ['twohour', 'Два часа'];
    const NIGHT = ['night', 'Ночь'];

    const REQUIRE = [
        self::ONEHOUR
    ];

    const PRICE = [
        self::EXPRESS,
        self::ONEHOUR,
        self::TWOHOUR,
        self::NIGHT
    ];

    const EXCLUDE_FIELD = [
        'sal' => [
            self::EXPRESS,
            self::TWOHOUR
        ]
    ];

    private string $type;

    public function __construct(
        string $type
    ) {
        $this->type = $type;
    }

    public function getData(): ?array
    {
        $result = [];
        foreach (self::PRICE as $priceValue) {
            /*if (self::EXCLUDE_FIELD[$this->type] && in_array($priceValue, self::EXCLUDE_FIELD[$this->type])) {
                continue;
            }*/
            $result[$priceValue[0]] = $this->getFieldEntity(
                $priceValue[0],
                $priceValue[1],
                'text',
                in_array($priceValue, self::REQUIRE),
                null
            );
        }

        return $result ?? null;
    }
}