<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use DateTime;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contents = Storage::get("players.csv");
        $csvStrings = explode("\n", $contents);
        for ($i = 1; $i < count($csvStrings); $i++) {
            $props = str_getcsv($csvStrings[$i], ";");
            \App\Models\Player::create([
                "nickname" => trim($props[0]),
                "email" => trim($props[1]),
                "registered" => strtotime(DateTime::createFromFormat("d.m.Y G:i", trim($props[2]))->format("Y-m-d H:i:s")),
                "status" => trim($props[3]) === "On",
            ]);
        }
    }
}
