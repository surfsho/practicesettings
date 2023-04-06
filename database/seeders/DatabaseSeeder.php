<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('reminders')->insert([
            'starttime' => '11 Days',
            'type' => "whatsapp", 
        ]);

        DB::table('reminders')->insert([
            'starttime' => '1 Days',
            'type' => "sms", 
        ]);

        DB::table('reminders')->insert([
            'starttime' => '3 Days',
            'type' => "email", 
        ]);

        DB::table('reminders')->insert([
            'starttime' => '7 Hours',
            'type' => "whatsapp", 
        ]);

        DB::table('reminders')->insert([
            'starttime' => '12 Hours',
            'type' => "whatsapp", 
        ]);
    }
}
