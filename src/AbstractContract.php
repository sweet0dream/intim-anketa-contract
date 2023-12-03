<?php

namespace Sweet0dream;

abstract class AbstractContract
{
    private function formatNum(int $number, array $suffix): string
    {
        $keys = [2, 0, 1, 1, 1, 2];
        $mod = $number % 100;
        $suffix_key = ($mod > 7 && $mod < 20) ? 2: $keys[min($mod % 10, 5)];
        return $number . ' ' . $suffix[$suffix_key];
    }

    public function getFieldEntity(
        string $key,
        string $name,
        string $type,
        bool $require,
        ?array $value,
        array|string|bool $suffix = false
    ): array
    {
        $result = [
            'key' => $key,
            'name' => $name,
            'type' => $type,
            'require' => (int)$require
        ];
        if ($suffix) {
            $result['value'] = array_map(
                function ($a) use ($suffix)
                {
                    if (is_array($suffix)) {
                        return $this->formatNum($a, $suffix);
                    }
                    return is_string($suffix) ? $a . ' ' . $suffix : null;
                }, $value);
        } elseif ($suffix === false && !is_null($value)) {
            $result['value'] = $value;
        }

        return $result;
    }
}