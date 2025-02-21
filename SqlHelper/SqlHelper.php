<?php

namespace App\Traits;

trait SqlHelper
{
    /**
     * Преобразование массива для вставки в sql запрос.
     *
     * @param array $columns список колонок
     * @param array $values список значений
     * @param array $any список значений, которые будут добавлены ко всем
     * @return array
     */
    public static function arrayToSql(array $columns, array $values, array $any = []): array
    {
        $newArray = [];

        foreach ($values as $index => $value) {
            foreach ($columns as $key => $column) {
                if ($key == 0) {
                    $newArray[$index] = [];
                }
                $newArray[$index][$column] = $value[$key];
            }
            $newArray[$index] = array_merge($newArray[$index], $any);
        }

        return $newArray;
    }
}
