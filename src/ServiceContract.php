<?php

namespace Sweet0dream;

class ServiceContract {
    private const SERVICE_SEX = [
        'name' => 'Секс',
        'value' => [
            'sk' => 'классический',
            'sa' => 'анальный',
            'sg' => 'групповой',
            'sl' => 'лейсбийский'
        ]
    ];

    private const SERVICE_MIN = [
        'name' => 'Минет',
        'value' => [
            'mp' => 'в презервативе',
            'mb' => 'без презерватива',
            'mg' => 'глубокий',
            'ma' => 'в авто'
        ]
    ];

    private const SERVICE_OKO = [
        'name' => 'Окончание',
        'value' => [
            'og' => 'на грудь',
            'ol' => 'на лицо',
            'or' => 'в рот',
            'op' => 'в попу'
        ]
    ];

    private const SERVICE_MAS = [
        'name' => 'Массаж',
        'value' => [
            'mk' => 'классический',
            'mp' => 'профессиональный',
            'me' => 'эротический',
            'mu' => 'урологический'
        ]
    ];

    private const SERVICE_SAD = [
        'name' => 'БДСМ',
        'value' => [
            'sp' => 'порка',
            'ss' => 'страпон',
            'sr' => 'госпожа/рабыня',
            'st' => 'трамплинг'
        ]
    ];

    private const SERVICE_ZRE = [
        'name' => 'Зрелища',
        'value' => [
            'zl' => 'легкое лесби',
            'zo' => 'откровенное лесби',
            'zs' => 'стриптиз',
            'zi' => 'игрушки'
        ]
    ];

    private const SERVICE_ORA = [
        'name' => 'Оральные',
        'value' => [
            'ok' => 'кунилингус',
            'oa' => 'анилингус',
            'op' => 'поза 69',
            'of' => 'футлизинг'
        ]
    ];

    private const SERVICE_IZV = [
        'name' => 'Извращения',
        'value' => [
            'iz' => 'золотой дождь',
            'ik' => 'копро',
            'if' => 'фистинг',
            'ia' => 'фистинг анал'
        ]
    ];

    private const SERVICE_PRO = [
        'name' => 'Прочее',
        'value' => [
            'pe' => 'эскорт',
            'ps' => 'с семейной парой',
            'pf' => 'фото съемка',
            'pv' => 'видео съемка'
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

    public function getData(): array
    {
        return self::SERVICE;
    }
}