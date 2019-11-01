<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //

    protected $fillable = [
        'title', 'description', 'value', 'expiry', 'user_id'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
