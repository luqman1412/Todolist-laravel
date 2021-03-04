<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class todolist extends Model
{
    //
    protected $table = 'todolists';
    protected $fillable = ['name', 'label_id'];

    public function label()
    {
        return $this->belongsTo(Labels::class,'label_id');
    }
}
