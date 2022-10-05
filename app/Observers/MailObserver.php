<?php

namespace App\Observers;

use App\Mail\NotificationMail;
use App\Models\Permohonan;
use Illuminate\Support\Facades\Mail;

class MailObserver
{
    /**
     * Handle the Permohonan "created" event.
     *
     * @param  \App\Models\Permohonan  $permohonan
     * @return void
     */
    public function created(Permohonan $permohonan)
    {
    }

    /**
     * Handle the Permohonan "updated" event.
     *
     * @param  \App\Models\Permohonan  $permohonan
     * @return void
     */
    public function updated(Permohonan $permohonan)
    {
        if ($permohonan->status_progres === 'Validasi Pertama Berhasil') {
            $detail1 = [
                "greeting" => "Selamat!",
                "message" => "Validasi pertama dengan kode permohonan:" . $permohonan->kode_permohonan . " berhasil, permohonan sedang diteruskan ke RW.",
            ];
            Mail::to($permohonan->user->email)->send(new NotificationMail($detail1));
        } else if ($permohonan->status_progres === 'Validasi Pertama Gagal') {
            $detail2 = [
                "greeting" => "Maaf!",
                "message" => "Validasi pertama dengan kode permohonan:" . $permohonan->kode_permohonan . " ditolak. Permohonan telah ditolak oleh RT, Silahkan cek kelengkapan berkas anda atau pastikan anda mengisi form dengan benar.",
            ];
            Mail::to($permohonan->user->email)->send(new NotificationMail($detail2));
        } else if ($permohonan->status_progres === 'SP Telah Disetujui') {
            $detail3 = [
                "greeting" => "Selamat!",
                "message" => "Surat Permohonan dengan kode permohonan:" . $permohonan->kode_permohonan . " telah disetujui, silahkan login ke sistem untuk melakukan download.",
            ];
            Mail::to($permohonan->user->email)->send(new NotificationMail($detail3));
        } else if ($permohonan->status_progres === 'Validasi Akhir Gagal') {
            $detail3 = [
                "greeting" => "Maaf!",
                "message" => "Permintaan Persetujuan Permohonan dengan kode permohonan:" . $permohonan->kode_permohonan . " ditolak oleh RW, silahkan hubungi pihak RT setempat untuk mengecek apakah telah mengirimkan surat keterangan dengan benar. Atau anda bisa melakukan pengajuan permohonan kembali.",
            ];
            Mail::to($permohonan->user->email)->send(new NotificationMail($detail3));
        }
    }

    /**
     * Handle the Permohonan "deleted" event.
     *
     * @param  \App\Models\Permohonan  $permohonan
     * @return void
     */
    public function deleted(Permohonan $permohonan)
    {
        //
    }

    /**
     * Handle the Permohonan "restored" event.
     *
     * @param  \App\Models\Permohonan  $permohonan
     * @return void
     */
    public function restored(Permohonan $permohonan)
    {
        //
    }

    /**
     * Handle the Permohonan "force deleted" event.
     *
     * @param  \App\Models\Permohonan  $permohonan
     * @return void
     */
    public function forceDeleted(Permohonan $permohonan)
    {
        //
    }
}
