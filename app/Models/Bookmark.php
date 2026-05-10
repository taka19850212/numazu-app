<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    // ★この1行が必要です！抜けていませんか？
    protected $fillable = ['user_id', 'spot_id'];
}
