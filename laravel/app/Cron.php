<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cron extends Model
{
    protected $fillable = [
        'tweet_id',
        'reservation_at',
        'tweet_complate_flg'
    ];

    public $timestamps = false;

    public function cronStore(array $data)
    {
        $this->fill($data)->save();
    }
}
