<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $table = "events";
    protected $primaryKey = "id";

    public $timestamps = false;
    protected $fillable = [
        'name', 'description', 'date'
    ];


    public function users(): BelongsToMany
    {
        return $this->belongsToMany (User::class, 'events_has_users', 'event_id', 'user_id');
    }
}
