<?php

namespace App\Exports;

use App\Models\PengajuanEmas;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class AktifEmasEx implements FromCollection,WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $pengajuan = PengajuanEmas::with('anggota','versi','perpanjangan_emas','rincian_pengajuan_emas')->where('status','=','Approved')->get();
        return $pengajuan;
    }

    public function map($pengajuan): array
    {
        $perpanjangan_detail = [];
        foreach($pengajuan->perpanjangan_emas as $item){
            $data = "Jatuh Tempo Sebelumnya  $item->jatuh_tempo_sebelumnya\nTgl Akad Baru: $item->tgl_akad_baru\n Jangka Waktu: $item->jangka_waktu Bulan\n Jatuh Tempo Mendatang: $item->jatuh_tempo_akan_datang\n";
            array_push($perpanjangan_detail, $data);
        }
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
                join("\n",$items),
                $pengajuan->persetujuan,
                $pengajuan->status,
                Date::dateTimeToExcel($pengajuan->created_at),
                join("\n",$perpanjangan_detail),
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
            "Perpanjangan Detail",
        ];
    }
}
