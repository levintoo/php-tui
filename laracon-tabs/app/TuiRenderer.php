<?php

namespace App;

use Chewie\Concerns\Aligns;
use Chewie\Concerns\DrawsHotkeys;
use Chewie\Output\Lines;
use Illuminate\Support\Collection;
use Laravel\Prompts\Themes\Default\Renderer;

class TuiRenderer extends Renderer
{
    use Aligns;

    use DrawsHotkeys;

    protected int $width;
    protected int $height;
    protected $leftColumnWidth;

    public function __invoke(Tui $prompt): string
    {
        $this->width = $prompt->terminal()->cols() - 2;
        $this->height = $prompt->terminal()->lines() - 4;

        $speakers = $this->getSpeakerLines($prompt);

        $detail = $this->getDetailLines($prompt);

        Lines::fromColumns([$speakers, $detail])
            ->spacing(4)
            ->lines()
            ->each($this->line(...));

//        $speakers->each($this->line(...));

//        $message = wordwrap((string) $prompt->message, $this->width, true);
//
//        collect(explode(PHP_EOL, $message))
//            ->slice(-$this->height)
//            ->each($this->line(...));

        $this->pinToBottom($this->height, function () {
            $this->newLine();

            $this->hotkey('↑ ↓','Select Speaker');
            $this->hotkey('t','Open twitter');

            $this->centerHorizontally($this->hotkeys(), $this->width)->each($this->line(...));
        });

        return $this;
    }

    private function getSpeakerLines(Tui $prompt) : Collection
    {
        $speakerNames = $prompt->speakers->pluck('name');

        $longest = $speakerNames->map(fn($name) => mb_strwidth($name))->max() + 2;

        $this->leftColumnWidth = $longest;

        return $speakerNames
            ->map(fn($name) => mb_str_pad(' ' . $name . ' ', $longest))
            ->map(function ($name, int $index) use ($prompt) {
            if($prompt->selectedSpeaker === $index) {
                return $this->bgBlue($this->blue($name));
            }

            return $name;
        });
    }

    private function getDetailLines(Tui $prompt) : Collection
    {
        $currentSpeaker = $prompt->speakers[$prompt->selectedSpeaker];

        return collect([
            $this->bold($currentSpeaker['name']),
            $this->dim($currentSpeaker['job']),
            $this->bold($this->underline($currentSpeaker['twitter'])),
            '',
            $this->dim('Lives in ' . $currentSpeaker['hometown'] . ' and loves ' . $currentSpeaker['pet']),
        ]);
//            ->concat(explode(
//            PHP_EOL,
//            wordwrap(
//                (string) $currentSpeaker['bio'],
//                $this->width - $this->leftColumnWidth - 4,
//                true
//            )
//        ));
    }
}
