<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormResponse extends Model
{
    use HasFactory;
    protected $fillable = ['form_id', 'answers'];

    protected $casts = [
        'answers' => 'array',
    ];

    public function form(){
        return $this->belongsTo(Form::class);
    }
}
