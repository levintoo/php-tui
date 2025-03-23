<?php

namespace App;

use App\Traits\HasSpeakers;
use Chewie\Concerns\CreatesAnAltScreen;
use Chewie\Concerns\RegistersRenderers;
use Chewie\Input\KeyPressListener;
use Illuminate\Support\Collection;
use Laravel\Prompts\Prompt;

class Tui extends Prompt
{
    use RegistersRenderers;
    use HasSpeakers;
    use CreatesAnAltScreen;


    public collection $speakers;
    public int $selectedSpeaker = 0;

    public function __construct()
    {
        $this->registerRenderer(TuiRenderer::class);

        $this->createAltScreen();

        $this->speakers = $this->loadSpeakers();

        KeyPressListener::for($this)
            ->onDown(
                fn() => $this->selectedSpeaker = min(
                    $this->selectedSpeaker + 1,
                    $this->speakers->count() - 1,
                )
            )
            ->onUp(
                fn() => $this->selectedSpeaker = max(
                    $this->selectedSpeaker - 1,
                    0
                )
            )
            ->on('t', fn() => exec(
                'open ' . $this->speakers[$this->selectedSpeaker]['twitter'],
            ))
//            ->wildcard(fn($key) => $this->message .= $key)
//            ->on(Key::BACKSPACE, fn() => $this->message = substr($this->message, 0, -1))
//            ->on(Key::ENTER, fn() => $this->message = '')
            ->listen();
    }

    public function value(): mixed
    {
        return null;
    }
}