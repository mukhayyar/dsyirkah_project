<?php

namespace App\Exports;

use App\Models\PengajuanEmas;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PengajuanEmasEx implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $pengajuan = PengajuanEmas::with('anggota','versi','rincian_pengajuan_emas')->where('status','!=','Reject')->get();
        return $pengajuan;
    }

    public function map($pengajuan): array
    {
        $items = [];
        foreach($pengajuan->rincian_pengajuan_emas as $item){
            $data = "Item Emas: $item->item\nJenis Emas: $item->jenis\nGramasi: $item->gramasi\nKeping: $item->keping\nJumlah: $item->jumlah\n";
            array_push($items, $data);
        }
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
                $pengajuan->total_gramasi." Gram",
                join("\n",$items),
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
            "Total Gramasi",
            "Rincian Emas",
            "Persetujuan",
            "Status",
            "Tgl. Pengajuan",
        ];
    }
}
