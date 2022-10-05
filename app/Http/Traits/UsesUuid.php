<?php

namespace App\Http\Traits;

use Illuminate\Support\Str;

trait UsesUuid
{
    protected static function bootUsesUuid()
    {
        static::creating(function ($model) {
            $id = $model->max('id') + 1;

            $code = 'P' . Str::padLeft(Str::upper($model->jenisPermohonan->kode_permohonan), 4, "A") . now()->format('dmy') . sprintf('%04d', $id) . chr(rand(ord('A'), ord('Z')));
            $model->kode_permohonan = $code;
        });
    }

    public function getKeyType()
    {
        return 'string';
    }
}
