<?php

namespace App\Exports;

use App\Models\PengajuanRupiah;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PengajuanRupiahEx implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $pengajuan = PengajuanRupiah::with('anggota','versi')->where('status','!=','Reject')->get();
        return $pengajuan;
    }

    public function map($pengajuan): array
    {
        return [
            [
                $pengajuan->anggota->nama_lengkap,
                $pengajuan->anggota->nomor_ba,
                $pengajuan->no_pengajuan,
                $pengajuan->referensi,
                $pengajuan->pilihan_program,
                $pengajuan->jenis_syirkah,
                $pengajuan->versi->versi,
                $pengajuan->kode_usaha,
                $pengajuan->nisbah,
                $pengajuan->perpanjangan,
                $pengajuan->jangka_waktu." Bulan",
                $pengajuan->alokasi_nisbah,
                "Rp. ".number_format($pengajuan->nominal,0,",","."),
                $pengajuan->persetujuan,
                $pengajuan->status,
                Date::dateTimeToExcel($pengajuan->created_at),
            ],
        ];
    }

    public function headings(): array
    {
        return [
            "Nama Lengkap",
            "Nomor BA",
            "No Pengajuan",
            "Referensi",
            "Pilihan Program",
            "Jenis Syirkah",
            "Versi Syirkah",
            "Kode Usaha",
            "Nisbah",
            "Perpanjangan",
            "Jangka Waktu",
            "Alokasi Nisbah",
            "Nominal",
            "Persetujuan",
            "Status",
            "Tgl. Pengajuan",
        ];
    }
}
