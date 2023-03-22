<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Database\Seeders\PlayerSeeder;
use Illuminate\Support\Facades\Artisan;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Artisan::call("migrate:refresh");

        $seeder = new PlayerSeeder();
        $seeder->run();

        return Player::where('status', true)->orderBy('registered')->get();
    }
}
