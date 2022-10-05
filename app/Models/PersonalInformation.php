<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    use HasFactory;

    protected $table = 'personal_information';

    protected $fillable = [
        'user_id',
        'nama',
        'jk',
        'agama',
        'noktp',
        'tempatlahir',
        'tgllahir',
        'status',
        'pekerjaan',
        'wilayahrt',
        'nohp'
    ];

    protected $casts = [
        'tgllahir' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
