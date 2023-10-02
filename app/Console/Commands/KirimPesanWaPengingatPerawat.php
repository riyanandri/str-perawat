<?php

namespace App\Console\Commands;

use App\Models\Dokumen;
use App\Services\WhacenterService;
use Illuminate\Console\Command;

class KirimPesanWaPengingatPerawat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pengingat:dokumen-perawat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pesan terjadwal untuk mengingatkan dokumen perawat yang akan habis masa berlakunya';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dokumen = Dokumen::with('pegawai')->where('status', 'diterima')->get();
        foreach ($dokumen as $dok) {
            
            $deadline = $dok->berlaku_sd->subMonth(6)->format('Y-m-d');
            if ($deadline <= now()->format('Y-m-d') && $dok->pegawai->user->whatsapp != null) {
                $wa = new WhacenterService();
                $pesan = "Halo, " . $dok->pegawai->user->nama . "!\n"."Dokumen SIPP anda dengan nomor " . $dok->no_dokumen . " akan habis masa berlakunya pada hari " . $dok->berlaku_sd . ". Segera perpanjang dokumen SIPP anda kembali.\n"."Terima kasih.";
                $wa->line($pesan)->to($dok->pegawai->user->whatsapp)->send();
            }
        }

        $this->info('Pesan WA pengingat berhasil dikirim');
    }
}
