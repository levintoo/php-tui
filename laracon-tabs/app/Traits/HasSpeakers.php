<?php

namespace App\Traits;

use Illuminate\Support\Collection;

trait HasSpeakers
{
    public function loadSpeakers() : Collection
    {
        return collect([
            [
                'name' => 'Taylor Otwell',
                'job' => 'Creator of Laravel',
                'twitter' => 'https://twitter.com/taylorotwell',
                'pet' => 'Golden Retriever',
                'hometown' => 'Little Rock, Arkansas',
            ],
            [
                'name' => 'Adam Wathan',
                'job' => 'Creator of Tailwind CSS',
                'twitter' => 'https://twitter.com/adamwathan',
                'pet' => 'Bengal Cat',
                'hometown' => 'Toronto, Canada',
            ],
            [
                'name' => 'Aaron Francis',
                'job' => 'Co-founder, Try Hard Studios',
                'twitter' => 'https://twitter.com/aarondfrancis',
                'pet' => 'Parrot',
                'hometown' => 'Austin, Texas',
            ],
            [
                'name' => 'The Primeagen',
                'job' => 'CEO @ TheStartup™',
                'twitter' => 'https://twitter.com/theprimeagen',
                'pet' => 'Siberian Husky',
                'hometown' => 'San Francisco, California',
            ],
            [
                'name' => 'Caleb Porzio',
                'job' => 'Creator of Livewire & Alpine.js',
                'twitter' => 'https://twitter.com/calebporzio',
                'pet' => 'Bearded Dragon',
                'hometown' => 'Buffalo, New York',
            ],
            [
                'name' => 'Nuno Maduro',
                'job' => 'Laravel Team, Creator of Pest',
                'twitter' => 'https://twitter.com/enunomaduro',
                'pet' => 'Persian Cat',
                'hometown' => 'Lisbon, Portugal',
            ],
            [
                'name' => 'Jess Archer',
                'job' => 'Laravel Team',
                'twitter' => 'https://twitter.com/jessarchercodes',
                'pet' => 'Rabbit',
                'hometown' => 'Melbourne, Australia',
            ],
            [
                'name' => 'Joe Tannenbaum',
                'job' => 'Laravel Team',
                'twitter' => 'https://twitter.com/joetannenbaum',
                'pet' => 'Tortoise',
                'hometown' => 'Chicago, Illinois',
            ],
            [
                'name' => 'Luke Downing',
                'job' => 'Instructor at Laracasts',
                'twitter' => 'https://twitter.com/lukedowning19',
                'pet' => 'Scottish Fold Cat',
                'hometown' => 'Manchester, UK',
            ],
            [
                'name' => 'Philo Hermans',
                'job' => 'Fullstack Software Developer',
                'twitter' => 'https://twitter.com/Philo01',
                'pet' => 'Pug',
                'hometown' => 'Amsterdam, Netherlands',
            ],
            [
                'name' => 'Freek Van der Herten',
                'job' => 'PHP Developer, Spatie',
                'twitter' => 'https://twitter.com/freekmurze',
                'pet' => 'Cockatiel',
                'hometown' => 'Antwerp, Belgium',
            ],
        ]);
    }
}
