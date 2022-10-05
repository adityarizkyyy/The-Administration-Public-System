<?php

namespace App\Models;

use App\Http\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permohonan extends Model
{
    use HasFactory, UsesUuid;

    protected $table = "permohonan";

    protected $fillable = [
        "status_progres",
        "forms"
    ];

    protected $casts = [
        'forms' => AsArrayObject::class,
    ];

    public function jenisPermohonan()
    {
        return $this->belongsTo(JenisPermohonan::class, "jenis_permohonan_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function suratPengantar()
    {
        return $this->hasOne(SuratPengantar::class, "permohonan_id");
    }

    public function suratPermohonan()
    {
        return $this->hasOne(SuratPermohonan::class, "permohonan_id");
    }

    public function form()
    {
        return $this->morphTo();
    }

    public function displayInformation()
    {
        $forms = $this->form->getAttributes();
        $result = [];
        foreach ($forms as $key => $form) {
            if (strpos($key, 'file') !== false) {
                $result['file'][$key] = $form;
            } else if (!in_array($key, ['id', 'updated_at', 'created_at'])) {
                $result['var'][$key] = $form;
            }
        }

        return $result;
    }
}
