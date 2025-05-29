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
        IntimAnketaContract::TYPE_SAL => [
            self::EXPRESS,
            self::TWOHOUR
        ],
        IntimAnketaContract::TYPE_MAS => [
            self::TWOHOUR,
            self::NIGHT
        ],

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
            if (isset(self::EXCLUDE_FIELD[$this->type]) && in_array($priceValue, self::EXCLUDE_FIELD[$this->type])) {
                continue;
            }
            $result[$priceValue[0]] = $this->getFieldEntity(
                key: $priceValue[0],
                name: $priceValue[1],
                type: 'text',
                require: in_array($priceValue, self::REQUIRE)
            );
        }

        return $result ?? null;
    }
}