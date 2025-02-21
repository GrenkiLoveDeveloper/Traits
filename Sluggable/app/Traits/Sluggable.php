<?php

namespace App\Traits;

trait Sluggable
{
    /**
     * Автоматически вызывается при загрузке модели
     *
     * @return void
     */
    public static function bootSluggable()
    {
        static::saving(function ($model) {
            $settings = $model->sluggable(); // Получаем настройки из модели
            $model->slug = $model->generateSlug($model->{$settings['source']});
        });
    }

    /**
     * Абстрактный метод требует, чтобы каждая модель указывала, из какого поля делать slug
     *
     * @return array
     */
    abstract public function sluggable(): array;

    /**
     * Метод генерации slug (удаляет спецсимволы, заменяет пробелы на "-")
     *
     * @param [string] $string
     * @return string
     */
    public function generateSlug(string $string)
    {
        return strtolower(preg_replace(
            ['/[^\w\s]+/', '/\s+/'],
            ['', '-'],
            $string
        ));
    }
}
