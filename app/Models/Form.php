<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\TypeEnum;
use Illuminate\Validation\Rules\Enum;

class Form extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'fields', 'type'];

    protected $casts = [
        'fields' => 'array', // Menyimpan field dalam format JSON
        'type' => TypeEnum::class,
    ];
}
?>