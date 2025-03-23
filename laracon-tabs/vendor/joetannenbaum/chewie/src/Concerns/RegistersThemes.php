<?php

namespace Chewie\Concerns;

use Chewie\Theme;

trait RegistersThemes
{
    public function registerTheme(?string $renderer = null, string $theme = 'default'): void
    {
        $class = basename(str_replace('\\', '/', static::class));

        $renderer ??= Theme::$namespace . '\\' . $class . 'Renderer';

        static::$themes[$theme][static::class] = $renderer;
    }
}
