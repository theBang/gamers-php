<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Player extends Model
{
    use HasFactory;
    use HasUuids;

    public $timestamps = false;

    protected $primaryKey = "uuid";
    protected $fillable = [
        "nickname",
        "email",
        "registered",
        "status"
    ];

    protected $hidden = [
        "uuid"
    ];
}
