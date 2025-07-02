<?php

namespace App\Models;

use App\Observers\TodoObserver;
use Illuminate\Database\Eloquent\Model;

#[ObserverBy([TodoObserver::class])]
class Todo extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];
}
