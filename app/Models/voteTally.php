<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voteTally extends Model
{
    use HasFactory;

    protected $fillable = ['position', 'voter_id','candidate_id','election_id'];
}
