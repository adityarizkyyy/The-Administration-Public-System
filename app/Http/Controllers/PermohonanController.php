<?php

namespace App\Http\Controllers;

use App\Models\FormKjp;
use App\Models\FormSktm;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use App\Models\FormUsahaMikro;
use App\Models\JenisPermohonan;
use Illuminate\Validation\Rule;
use App\Models\FormPenerbitanKk;
use App\Models\FormPindahDatang;
use App\Models\FormPindahKeluar;
use App\Models\FormPenerbitanKtp;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PermohonanController extends Controller
{
    public function index()
    {
        return view('permohonan', [
            "title" => "Permohonan"
        ]);
    }

    public function syarat($need)
    {
        switch ($need) {
            case 'ktp':
                return view('persy-perm-ktp', [
                    "title" => "Permohonan Penerbitan KTP",
                    "jenis" => JenisPermohonan::where('kode_permohonan', 'ktp')->first()
                ]);
                break;
            case 'kk':
                return view('persy-perm-kk', [
                    "title" => "Permohonan Penerbitan KK",
                    "jenis" => JenisPermohonan::where('kode_permohonan', 'kk')->first()
                ]);
                break;
            case 'sktm':
                return view('persy-perm-sktm', [
                    "title" => "Permohonan Pengajuan SKTM",
                    "jenis" => JenisPermohonan::where('kode_permohonan', 'sktm')->first()
                ]);
                break;
            case 'kjp':
                return view('persy-perm-kjp', [
                    "title" => "Permohonan Pengajuan KJP",
                    "jenis" => JenisPermohonan::where('kode_permohonan', 'kjp')->first()
                ]);
                break;
            case 'pd':
                return view('persy-perm-pd', [
                    "title" => "Permohonan Pindah Datang",
                    "jenis" => JenisPermohonan::where('kode_permohonan', 'pd')->first()
                ]);
                break;
            case 'um':
                return view('persy-perm-um', [
                    "title" => "Permohonan Pengajuan Usaha Mikro",
                    "jenis" => JenisPermohonan::where('kode_permohonan', 'um')->first()
                ]);
                break;
            case 'pk':
                return view('persy-perm-pk', [
                    "title" => "Permohonan Pindah Keluar",
                    "jenis" => JenisPermohonan::where('kode_permohonan', 'pk')->first()
                ]);
                break;

            default:
                return back();
                break;
        }
    }

    public function savingFile($request)
    {
        $paths = [];
        $files = $request->all();
        $files = array_filter($files, function ($key) {
            return strpos($key, 'file') !== false;
        }, ARRAY_FILTER_USE_KEY);

        foreach ($files as $key => $value) {
            if ($request->hasFile($key)) {
                if (is_array($value)) {
                    $path = [];
                    foreach ($request->file($key) as $idFile => $file) {
                        $name = auth()->user()->id . '_' . $key . '_' . $idFile . '_' . time() . '.' . $file->extension();
                        $path[$idFile] = auth()->user()->id . '/' . $key . '/' . $name;
                        if (!Storage::disk('local')->exists(auth()->user()->id . '/' . $key . '/' . $name)) {
                            Storage::disk('local')->put(auth()->user()->id . '/' . $key . '/' . $name, $file->get());
                        }
                    }
                    $paths[$key] = $path;
                } else {
                    $file = $request->file($key);
                    $name = auth()->user()->id . '_' . $key . '_' . time() . '.' . $request->file($key)->extension();
                    $paths[$key] = auth()->user()->id . '/' . $key . '/' . $name;
                    if (!Storage::disk('local')->exists(auth()->user()->id . '/' . $key . '/' . $name)) {
                        Storage::disk('local')->put(auth()->user()->id . '/' . $key . '/' . $name, $file->get());
                    }
                }
            }
        }

        return $paths;
    }

    public function permohonan($want)
    {
        switch ($want) {
            case 'ktp':
                return view('perm-ktp', [
                    "title" => "Permohonan Penerbitan KTP"
                ]);
                break;
            case 'kk':
                return view('perm-kk', [
                    "title" => "Permohonan Penerbitan KK"
                ]);
                break;
            case 'sktm':
                return view('perm-sktm', [
                    "title" => "Permohonan Pengajuan SKTM"
                ]);
                break;
            case 'kjp':
                return view('perm-kjp', [
                    "title" => "Permohonan Pengajuan KJP"
                ]);
                break;
            case 'pd':
                return view('perm-pd', [
                    "title" => "Permohonan Pindah Datang"
                ]);
                break;
            case 'um':
                return view('perm-um', [
                    "title" => "Permohonan Pengajuan Usaha Mikro"
                ]);
                break;
            case 'pk':
                return view('perm-pk', [
                    "title" => "Permohonan Pindah Keluar"
                ]);
                break;

            default:
                return back();
                break;
        }
    }

    public function create(Request $request, $form)
    {
        $createdForm = null;
        switch ($form) {
            case 'ktp':
                $createdForm = new FormPenerbitanKtp();
                break;
            case 'kk':
                $createdForm = new FormPenerbitanKk();
                break;
            case 'sktm':
                $createdForm = new FormSktm();
                break;
            case 'kjp':
                $createdForm = new FormKjp();
                break;
            case 'pd':
                $createdForm = new FormPindahDatang();
                break;
            case 'um':
                $createdForm = new FormUsahaMikro();
                break;
            case 'pk':
                $createdForm = new FormPindahKeluar();
                break;
            default:
                return back();
                break;
        }
        $request->validate($createdForm->rules);
        $validator = Validator::make($request->all(), 

        $createdForm->rules
    , 
        $createdForm->messages
    );
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $paths = $this->savingFile($request);
        $form_merge = array_merge($request->all(), $paths);
        $newForms = $createdForm->create($form_merge);

        $jenisPermohonan = JenisPermohonan::where('kode_permohonan', $form)->first();
        $permohonan = new Permohonan();
        $permohonan->form()->associate($newForms)
            ->user()->associate(auth()->user())
            ->jenisPermohonan()->associate($jenisPermohonan);
        $permohonan->save();
        return redirect()->route('riwayat')->with('success', 'Permohonan berhasil dibuat');
    }

    public function riwayat()
    {
        $riwayat = Permohonan::where('user_id', auth()->user()->id)->get();
        return view('riwayat', [
            "title" => "Riwayat",
            "riwayat" => $riwayat
        ]);
    }
}
