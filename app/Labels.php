<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Labels extends Model
{
    //
    protected $table = 'label';
    protected $fillable = [ 'label_name'];

    public function todolist(){
        return $this->hasMany(todolist::class);
    }
}
