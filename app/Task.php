<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['content','status'];
    
    /**
     * このタスクを所有するユーザ
     */
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
