<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'title' => 'buatkan codingan html',
            'description' => 'silahkan kerjakan tugasnya',
            'due_date' => '2024-06-02 00:00:00',
            'submission_type' => 'online_text',
        ]);
    }
}
