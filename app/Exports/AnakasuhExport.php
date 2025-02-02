<?php

namespace App\Exports;

use App\Models\Anak_Asuh;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

// use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\WithHeadings;
// use Maatwebsite\Excel\Events\AfterSheet;
// use Maatwebsite\Excel\Concerns\WithEvents;
// use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AnakasuhExport  implements FromView
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }
    public function view(): View
    {
        $data = $this->data;
        view()->share('data',$data);
        return view('exports.dataanakasuh-pertanggal-excel', $data);
        // return view('exports.dataanakasuh-excel', [
        //     'data' => Anak_Asuh::all()
        // ]);
    }
}

// class AnakasuhExport implements FromCollection,WithHeadings
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
    
//     public function collection()
//     {
//         return Anak_Asuh::select('Nama', 'JenisKelamin', 'TempatLahir','TanggalLahir','Agama',
//                                 'Jenjang', 'Kelas', 'NamaAyah','NamaIbu',
//                                 'AlamatOrtu', 'NIK', 'NoKK', 'NoAkta',
//                                 'Status', 'NoSekolah', 'NISN','ScanKISBPJS',
//                                 'ScanKIP', 'ScanKMS', 'ScanKIAKTP','GolDarah')
//                                 ->get();

        
//     }
//     public function headings(): array{
//         return ["Nama", "Jenis Kelamin", "Tempat ", "Tanggal Lahir", "Agama", 
//                 "Pendidikan", "Kelas", "Nama Ayah", "Nama Ibu", 
//                 "Alamat Awal", "NIK", "No KK", "No Akta Kelahiran",
//                 "Ket Masuk KPA", "No Sekolah", "NISN", "KIS/BPJS",
//                 "KIP", "KMS", "KIA/KTP", "Gol Darah"];
//     }
// }

