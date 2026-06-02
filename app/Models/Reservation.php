<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    // 保存を許可する項目（ホワイトリスト）
    protected $fillable = [
        'spot_id',
        'date',
        'email',
        'pax',
        'message',
    ];

    // スポットとの連携（1つの予約は、1つのスポットに属する）
    public function spot()
    {
        return $this->belongsTo(Spot::class);
    }
}