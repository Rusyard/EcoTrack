<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

/**
 * Dipakai LaporanController (foto laporan dari masyarakat) dan
 * TugasController (foto bukti pengangkutan dari petugas), supaya logic
 * signed-upload ke Cloudinary cuma ada di satu tempat.
 */
trait UnggahFotoKeCloudinary
{
    /**
     * Upload foto ke Cloudinary lewat signed upload (API secret dipakai
     * di server, tidak pernah dikirim ke browser), lalu kembalikan URL
     * publiknya buat disimpan di kolom foto_url / foto_sesudah.
     *
     * @param  string  $fieldErrorKey  Nama field di pesan error validasi
     *                                 (mis. "foto" atau "foto_sesudah").
     */
    private function unggahFotoKeCloudinary(UploadedFile $file, string $folder, string $fieldErrorKey = 'foto'): string
    {
        $cloudName = config('services.cloudinary.cloud_name');
        $apiKey = config('services.cloudinary.api_key');
        $apiSecret = config('services.cloudinary.api_secret');

        if (! $cloudName || ! $apiKey || ! $apiSecret) {
            throw ValidationException::withMessages([
                $fieldErrorKey => 'Upload foto belum dikonfigurasi di server (CLOUDINARY_* belum diisi di .env).',
            ]);
        }

        $timestamp = time();

        // Signature Cloudinary: semua parameter SELAIN file, api_key, dan
        // signature, diurutkan alfabetis sebagai key=value&key=value,
        // ditempel api_secret di akhir, lalu di-SHA1.
        $stringUntukDitandatangani = "folder={$folder}&timestamp={$timestamp}{$apiSecret}";
        $signature = sha1($stringUntukDitandatangani);

        $response = Http::attach('file', fopen($file->getRealPath(), 'r'), $file->getClientOriginalName())
            ->post("https://api.cloudinary.com/v1_1/{$cloudName}/image/upload", [
                'api_key'   => $apiKey,
                'timestamp' => $timestamp,
                'folder'    => $folder,
                'signature' => $signature,
            ]);

        if ($response->failed()) {
            report(new \RuntimeException('Upload Cloudinary gagal: '.$response->body()));

            throw ValidationException::withMessages([
                $fieldErrorKey => 'Gagal mengunggah foto, silakan coba lagi.',
            ]);
        }

        return $response->json('secure_url');
    }
}