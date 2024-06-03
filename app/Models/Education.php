<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations'; // Asegúrate de que esto coincida con el nombre de la tabla

    protected $fillable = ['user_id', 'education'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
