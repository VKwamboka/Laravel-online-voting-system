<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pollVoters extends Model
{
    use HasFactory;
    protected $fillable = ['voterId', 'poll_id'];
}
