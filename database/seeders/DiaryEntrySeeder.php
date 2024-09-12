<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DiaryEntry;

class DiaryEntrySeeder extends Seeder
{
    public function run()
    {
        $diaryEntries = [
            [
                'user_id' => 1,
                'date' => '2024-08-01',
                'content' => 'Had a productive day, finished a lot of tasks at work.',
                'emotions' => [
                    ['emotion_id' => 1, 'intensity' => 8], // Happy
                    ['emotion_id' => 4, 'intensity' => 7], // Excited
                ]
            ],
            [
                'user_id' => 1,
                'date' => '2024-08-02',
                'content' => 'Spent the evening with friends, really fun time.',
                'emotions' => [
                    ['emotion_id' => 1, 'intensity' => 9], // Happy
                    ['emotion_id' => 4, 'intensity' => 6], // Excited
                ]
            ],
            [
                'user_id' => 1,
                'date' => '2024-08-03',
                'content' => 'Feeling overwhelmed and a bit down after a tough day.',
                'emotions' => [
                    ['emotion_id' => 2, 'intensity' => 7], // Sad
                    ['emotion_id' => 5, 'intensity' => 6], // Anxious
                ]
            ],
            [
                'user_id' => 1,
                'date' => '2024-08-04',
                'content' => 'Had a heated argument with a colleague, feeling frustrated.',
                'emotions' => [
                    ['emotion_id' => 3, 'intensity' => 8], // Angry
                ]
            ],
            [
                'user_id' => 1,
                'date' => '2024-08-05',
                'content' => 'Went for a walk to clear my mind, feeling more at ease.',
                'emotions' => [
                    ['emotion_id' => 1, 'intensity' => 6], // Happy
                    ['emotion_id' => 2, 'intensity' => 5], // Sad
                ]
            ],
            [
                'user_id' => 1,
                'date' => '2024-08-06',
                'content' => 'Excited for the upcoming project launch, it’s going well!',
                'emotions' => [
                    ['emotion_id' => 4, 'intensity' => 9], // Excited
                ]
            ],
            [
                'user_id' => 1,
                'date' => '2024-08-07',
                'content' => 'Feeling anxious about an upcoming deadline.',
                'emotions' => [
                    ['emotion_id' => 5, 'intensity' => 8], // Anxious
                ]
            ],
            [
                'user_id' => 1,
                'date' => '2024-08-08',
                'content' => 'Had a rough day at work, feeling quite sad.',
                'emotions' => [
                    ['emotion_id' => 2, 'intensity' => 7], // Sad
                ]
            ],
            [
                'user_id' => 1,
                'date' => '2024-08-09',
                'content' => 'Productive day, but a bit of anxiety is creeping in.',
                'emotions' => [
                    ['emotion_id' => 1, 'intensity' => 7], // Happy
                    ['emotion_id' => 5, 'intensity' => 4], // Anxious
                ]
            ],
            [
                'user_id' => 1,
                'date' => '2024-08-10',
                'content' => 'Spent the day relaxing, feeling happy and content.',
                'emotions' => [
                    ['emotion_id' => 1, 'intensity' => 9], // Happy
                ]
            ],
            [
                'user_id' => 1,
                'date' => '2024-08-10',
                'content' => 'Spent the day relaxing at spa.',
                'emotions' => [
                    ['emotion_id' => 1, 'intensity' => 8], // Happy
                ]
            ],
            [
                'user_id' => 1,
                'date' => '2024-08-11',
                'content' => 'Cooked a new recipe for dinner',
                'emotions' => [
                    ['emotion_id' => 1, 'intensity' => 4], // Happy
                    ['emotion_id' => 4, 'intensity' => 8], // Excited
                ]
            ],
            [
                'user_id' => 1,
                'date' => '2024-08-11',
                'content' => 'Although I was happy cooking, the food did not turn out delicious, and my boyfriend was upset.',
                'emotions' => [
                    ['emotion_id' => 2, 'intensity' => 8], // Sad
                ]
            ],
            [
                'user_id' => 1,
                'date' => '2024-08-11',
                'content' => 'Went to bed early',
                'emotions' => [
                    ['emotion_id' => 2, 'intensity' => 8], // Sad
                ]
            ],
        ];
        
        foreach ($diaryEntries as $entry) {
            $diaryEntry = DiaryEntry::create([
                'user_id' => $entry['user_id'],
                'date' => $entry['date'],
                'content' => $entry['content'],
            ]);

            foreach ($entry['emotions'] as $emotion) {
                $diaryEntry->emotions()->attach($emotion['emotion_id'], ['intensity' => $emotion['intensity']]);
            }
        }
    }
}