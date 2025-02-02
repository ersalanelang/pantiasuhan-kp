<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anak_Asuh;
use PDF;
use Response;
use Dompdf\Dompdf;

use App\Exports\AnakasuhExport;
use App\Exports\AnakasuhExportAll;

use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;


class AnakAsuhController extends Controller
{
    // view data anak
    public function index(Request $request){
        if($request->has('search')){    
            $data = Anak_Asuh::where('Nama','LIKE','%' .$request->search.'%')
            ->orWhere('JenisKelamin','LIKE','%' .$request->search.'%')
            ->orWhere('Status','LIKE','%' .$request->search.'%')
            ->orWhere('TanggalLahir','LIKE','%' .$request->search.'%')
            ->orWhere('TanggalMasuk','LIKE','%' .$request->search.'%')
            ->orWhere('TempatLahir','LIKE','%' .$request->search.'%')
            ->orWhere(fn($query)
                =>$query->whereHas('kategoris',fn($query2)
                =>$query2->where('Kategori','LIKE','%'.$request->search.'%'))
            )
            ->paginate(10);
            Session::put('halaman_url',request()->fullurl());
        }else{
            // $data = Anak_Asuh::paginate(5);
            $data = Anak_Asuh::latest()->where('id_kategori','1')->paginate(10); 
            Session::put('halaman_url',request()->fullurl());
        }
        return view('dataanakasuh', compact('data'));
    }

    // insert data anak
    public function tambahanak(){
        return view('tambahanak');
    }

    // insert databse
    public function insertdata(Request $request){
        $this->validate($request,[
            // Identitas Anak
            'Nama' => 'required|regex:/^[\pL\s\-]+$/u|min:5|max:30',
            'JenisKelamin' => 'required',
            'TempatLahir' => 'required|max:40',
            'Asal' => 'required|max:20',
            'TanggalLahir' => 'required',
            'Agama' => 'required',
            'Goldarah' => 'required',
            // Pendidikan
            'NamaSekolah' => 'required|max:40',
            // 'Kelas' => 'required',
            // 'KelasPutus' => 'required',
            'NoSekolah' => 'required|max:15',
            // Informasi Tentang Keluarga
            'NamaAyah'=> 'min:4|max:30',
            'NIKAyah' => 'max:16',
            'NamaIbu'=> 'min:4|max:30',
            'NIKIbu' => 'max:16',
            'AlamatOrtu'=> 'required|min:7|max:150',
            'NoOrtu' => 'required|max:13',
            // Data Anak
            'Status' => 'required',
            'TanggalMasuk' => 'required',
            // 'TanggalKeluar' => 'nullable',
            'NIK' => 'max:16',
            'NoKK' => 'max:16',
            'NISN' => 'max:10',
            'NoAkta' => 'max:25',
            // kontak
            'Penanggungjawab'=> 'min:4|max:30',
            'Tinggal' => 'required',
            'NoKontak' => 'required|max:13',
            // Upload Data
            'Foto' => 'required|file|max:512',
            'ScanKK' => 'file|max:512',
            'ScanAkta' => 'file|max:512',
            'ScanKISBPJS' => 'file|max:512',
            'ScanKIP' => 'file|max:512',
            'ScanKMS' => 'file|max:512',
            'ScanKIAKTP' => 'file|max:512',
            'ScanIjazahSD' => 'file|max:512',
            'ScanIjazahSMP' => 'file|max:512',
            'ScanIjazahSMA' => 'file|max:512',
            'ScanFileSosial' => 'file|max:512',
        ]);
        $data= Anak_Asuh::create($request->all()); // manggil model buat di request
        if($request->hasFile('Foto')){
            $file= $request->file('Foto');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images/foto/'), $filename);
            $data['Foto']= $filename;
            $data->save();
        }
        if($request->hasFile('ScanKK')){  
            $file1= $request->file('ScanKK');
            $filename1= date('YmdHi').$file1->getClientOriginalName();
            $file1-> move(public_path('images/kk/'), $filename1);
            $data['ScanKK']= $filename1;
            $data->save();
        }
        if($request->hasFile('ScanAkta')){
            $file2= $request->file('ScanAkta');
            $filename2= date('YmdHi').$file2->getClientOriginalName();
            $file2-> move(public_path('images/aktalahir/'), $filename2);
            $data['ScanAkta']= $filename2;
            $data->save();
        }
        if($request->hasFile('ScanKISBPJS')){
            $file3= $request->file('ScanKISBPJS');
            $filename3= date('YmdHi').$file3->getClientOriginalName();
            $file3-> move(public_path('images/kisbpjs/'), $filename3);
            $data['ScanKISBPJS']= $filename3;
            $data->save();
        }
        if($request->hasFile('ScanKIP')){
            $file4= $request->file('ScanKIP');
            $filename4= date('YmdHi').$file4->getClientOriginalName();
            $file4-> move(public_path('images/kip/'), $filename4);
            $data['ScanKIP']= $filename4;
            $data->save();
        }
        if($request->hasFile('ScanKMS')){
            $file5= $request->file('ScanKMS');
            $filename5= date('YmdHi').$file5->getClientOriginalName();
            $file5-> move(public_path('images/kms/'), $filename5);
            $data['ScanKMS']= $filename5;
            $data->save();
        }
        if($request->hasFile('ScanKIAKTP')){
            $file6= $request->file('ScanKIAKTP');
            $filename6= date('YmdHi').$file6->getClientOriginalName();
            $file6-> move(public_path('images/kiaktp/'), $filename6);
            $data['ScanKIAKTP']= $filename6;
            $data->save();
        }
        if($request->hasFile('ScanIjazahSD')){
            $file7= $request->file('ScanIjazahSD');
            $filename7= date('YmdHi').$file7->getClientOriginalName();
            $file7-> move(public_path('images/ijazahSD/'), $filename7);
            $data['ScanIjazahSD']= $filename7;
            $data->save();
        }
        if($request->hasFile('ScanIjazahSMP')){
            $file8= $request->file('ScanIjazahSMP');
            $filename8= date('YmdHi').$file8->getClientOriginalName();
            $file8-> move(public_path('images/ijazahSMP/'), $filename8);
            $data['ScanIjazahSMP']= $filename8;
            $data->save();
        }
        if($request->hasFile('ScanIjazahSMA')){
            $file9= $request->file('ScanIjazahSMA');
            $filename9= date('YmdHi').$file9->getClientOriginalName();
            $file9-> move(public_path('images/ijazahSMA/'), $filename9);
            $data['ScanIjazahSMA']= $filename9;
            $data->save();
        }
        
        if($request->hasFile('ScanFileSosial')){
            $file10= $request->file('ScanFileSosial');
            $filename10= date('YmdHi').$file10->getClientOriginalName();
            $file10-> move(public_path('images/filesosial/'), $filename10);
            $data['ScanFileSosial']= $filename10;
            $data->save();
        }

        $sd = array('I','II' , 'III' , 'IV' ,'V', 'VI');
        $smp = array('VII','VIII','IX');
        $sma = array('XI','X','XII');
        
        if(in_array($data->Kelas,$sd)) {
            $data->Jenjang = 'SD';
            $data->save();
        }elseif(in_array($data->Kelas,$smp)){
            $data->Jenjang = 'SMP';
            $data->save();
        }elseif(in_array($data->Kelas,$sma)){
            $data->Jenjang = 'SMA';
            $data->save();
        }else{
            $data->Jenjang = '-';
            $data->save();
        }
        return redirect()->route('anakasuh')->with('success','Data Berhasil Ditambahkan');
    }

    public function tampilkandata($id){
        $data = Anak_Asuh::find($id);
        // dd($data0);
        return view('tambahanakEdit', compact('data'));
    }

    public function updatedata(Request $request, $id){
        $this->validate($request,[
            // Identitas Anak
            'Nama' => 'required|regex:/^[\pL\s\-]+$/u|min:5|max:30',
            'JenisKelamin' => 'required',
            'TempatLahir' => 'required|max:40',
            'TanggalLahir' => 'required',
            'Asal' => 'required|max:20',
            'Agama' => 'required',
            'Goldarah' => 'required',
            // Pendidikan
            'NamaSekolah' => 'required|max:40',
            // 'Kelas' => 'required',
            // 'KelasPutus' => 'required',
            'NoSekolah' => 'required|max:15',
            // Informasi Tentang Keluarga
            // 'NamaAyah'=> 'regex:/^[\pL\s\-]+$/u|min:5|max:30',
            'NamaAyah'=> 'min:4|max:30',
            'NIKAyah' => 'max:16',
            'NamaIbu'=> 'min:4|max:30|regex:/^[\pL\s\-]+$/u',
            'NIKIbu' => 'max:16',
            'AlamatOrtu'=> 'required|min:7|max:150',
            'NoOrtu' => 'required|max:13',
            // Data Anak
            'Status' => 'required',
            'TanggalMasuk' => 'required',
            // 'TanggalKeluar' => 'nullable',
            'NIK' => 'max:16',
            'NoKK' => 'max:16',
            'NISN' => 'max:10',
            'NoAkta' => 'max:25',
            // kontak
            'Penanggungjawab'=> 'min:4|max:30',
            'Tinggal' => 'required',
            'NoKontak' => 'required|max:13',
            // Upload Data
            'Foto' => 'file|max:512',
            'ScanKK' => 'file|max:512',
            'ScanAkta' => 'file|max:512',
            'ScanKISBPJS' => 'file|max:512',
            'ScanKIP' => 'file|max:512',
            'ScanKMS' => 'file|max:512',
            'ScanKIAKTP' => 'file|max:512',
            'ScanIjazahSD' => 'file|max:512',
            'ScanIjazahSMP' => 'file|max:512',
            'ScanIjazahSMA' => 'file|max:512',
            'ScanFileSosial' => 'file|max:512',
        ]);
        $data = Anak_Asuh::find($id);
        
        if($request->hasfile('Foto')){
            $foto_path = "/images/foto/".$data->Foto;
            $path = str_replace("\\",'/',public_path());  
            if($data->Foto != null && $data->Foto != ""){
                unlink($path.$foto_path);
            }  
            $file= $request->file('Foto');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images/foto/'), $filename);
            // $data['Foto']= $filename;
            $data->update(['Foto'=>$filename]);
        }
        if($request->hasfile('ScanKK')){
            $kk_path = "/images/kk/".$data->ScanKK;
            $path = str_replace("\\",'/',public_path());  
            if($data->ScanKK != null && $data->ScanKK != ""){
                unlink($path.$kk_path);
            }
            $file1= $request->file('ScanKK');
            $filename1= date('YmdHi').$file1->getClientOriginalName();
            $file1-> move(public_path('images/kk/'), $filename1);
            // $data['KK']= $filename3; 
            $data->update(['ScanKK'=>$filename1]);  
        }
        if($request->hasfile('ScanAkta')){
            $akta_path = "/images/aktalahir/".$data->ScanAkta;
            $path = str_replace("\\",'/',public_path());   
            if($data->ScanAkta != null && $data->ScanAkta != ""){
                unlink($path.$akta_path);
            }
            $file2= $request->file('ScanAkta');
            $filename2= date('YmdHi').$file2->getClientOriginalName();
            $file2-> move(public_path('images/aktalahir/'), $filename2);
            // $data['KK']= $filename3; 
            $data->update(['ScanAkta'=>$filename2]);
        }
        if($request->hasfile('ScanKISBPJS')){
            $kisbpjs_path = "/images/kisbpjs/".$data->ScanKISBPJS;
            $path = str_replace("\\",'/',public_path());  
            if($data->ScanKISBPJS != null && $data->ScanKISBPJS != ""){
                unlink($path.$kisbpjs_path);
            }
            $file3= $request->file('ScanKISBPJS');
            $filename3= date('YmdHi').$file3->getClientOriginalName();
            $file3-> move(public_path('images/kisbpjs/'), $filename3);
            // $data['KK']= $filename3; 
            $data->update(['ScanKISBPJS'=>$filename3]);
      
        }
        if($request->hasfile('ScanKIP')){
            $kip_path = "/images/kip/".$data->ScanKIP;
            $path = str_replace("\\",'/',public_path());  
            if($data->ScanKIP != null && $data->ScanKIP != ""){
                unlink($path.$kip_path);
            }
            $file4= $request->file('ScanKIP');
            $filename4= date('YmdHi').$file4->getClientOriginalName();
            $file4-> move(public_path('images/kip/'), $filename4);
            // $data['ScanKIP']= $filename4; 
            $data->update(['ScanKIP'=>$filename4]);
                
        }
        if($request->hasfile('ScanKMS')){
            $kms_path = "/images/kms/".$data->ScanKMS;
            $path = str_replace("\\",'/',public_path());  
            if($data->ScanKMS != null && $data->ScanKMS != ""){
                unlink($path.$kms_path);
            }
            $file5= $request->file('ScanKMS');
            $filename5= date('YmdHi').$file5->getClientOriginalName();
            $file5-> move(public_path('images/kms/'), $filename5);
            // $data['ScanKMS']= $filename5;
            $data->update(['ScanKMS'=>$filename5]);
                 
        }
        if($request->hasfile('ScanKIAKTP')){
            $kiaktp_path = "/images/kiaktp/".$data->ScanKIAKTP;
            $path = str_replace("\\",'/',public_path());    
            if($data->ScanKIAKTP != null && $data->ScanKIAKTP != ""){
                unlink($path.$kiaktp_path);
            }
            $file6= $request->file('ScanKIAKTP');
            $filename6= date('YmdHi').$file6->getClientOriginalName();
            $file6-> move(public_path('images/kiaktp/'), $filename6);
            // $data['ScanKIAKTP']= $filename6;
            $data->update(['ScanKIAKTP'=>$filename6]);   
        }
        if($request->hasfile('ScanIjazahSD')){
            $ijazahsd_path = "/images/ijazahSD/".$data->ScanIjazahSD;
            $path = str_replace("\\",'/',public_path());    
            if($data->ScanIjazahSD != null && $data->ScanIjazahSD != ""){
                unlink($path.$ijazahsd_path);
            }
            $file7= $request->file('ScanIjazahSD');
            $filename7= date('YmdHi').$file7->getClientOriginalName();
            $file7-> move(public_path('images/ijazahSD/'), $filename7);
            // $data['ScanIjazahSD']= $filename;
            $data->update(['ScanIjazahSD'=>$filename7]);   
        }
        if($request->hasfile('ScanIjazahSMP')){
            $ijazahsmp_path = "/images/ijazahSMP/".$data->ScanIjazahSMP;
            $path = str_replace("\\",'/',public_path());    
            if($data->ScanIjazahSMP != null && $data->ScanIjazahSMP != ""){
                unlink($path.$ijazahsmp_path);
            }
            $file8= $request->file('ScanIjazahSMP');
            $filename8= date('YmdHi').$file8->getClientOriginalName();
            $file8-> move(public_path('images/ijazahSMP/'), $filename8);
            // $data['ScanIjazahSMP']= $filename6;
            $data->update(['ScanIjazahSMP'=>$filename8]);   
        }
        if($request->hasfile('ScanIjazahSMA')){
            $ijazahsma_path = "/images/ijazahSMA/".$data->ScanIjazahSMA;
            $path = str_replace("\\",'/',public_path());    
            if($data->ScanIjazahSMA != null && $data->ScanIjazahSMA != ""){
                unlink($path.$ijazahsma_path);
            }
            $file9= $request->file('ScanIjazahSMA');
            $filename9= date('YmdHi').$file9->getClientOriginalName();
            $file9-> move(public_path('images/ijazahSMA/'), $filename9);
            // $data['ScanIjazahSMA']= $filename6;
            $data->update(['ScanIjazahSMA'=>$filename9]);   
        }
        if($request->hasfile('ScanFileSosial')){
            $filesosial_path = "/images/filesosial/".$data->ScanFileSosial;
            $path = str_replace("\\",'/',public_path());    
            if($data->ScanFileSosial != null && $data->ScanFileSosial != ""){
                unlink($path.$filesosial_path);
            }
            $file10= $request->file('ScanFileSosial');
            $filename10= date('YmdHi').$file10->getClientOriginalName();
            $file10-> move(public_path('images/filesosial/'), $filename10);
            // $data['ScanFileSosial']= $filename6;
            $data->update(['ScanFileSosial'=>$filename10]);   
        }
        $sd = array('I','II' , 'III' , 'IV' ,'V', 'VI');
        $smp = array('VII','VIII','IX');
        $sma = array('XI','X','XII');

        if(in_array($request->Kelas,$sd)) {
            $data->Jenjang = 'SD';
        }elseif(in_array($request->Kelas,$smp)){
            $data->Jenjang = 'SMP';
        }elseif(in_array($request->Kelas,$sma)){
            $data->Jenjang = 'SMA';
        }else{
            $data->Jenjang = '-';
        }
        $data->update($request->except(['Foto','ScanKK','ScanAkta','ScanKISBPJS','ScanKIP','ScanKMS','ScanKIAKTP','ScanIjazahSD','ScanIjazahSMP','ScanIjazahSMA','ScanFileSosial']));

        if(session('halaman_url')){
            return redirect(session('halaman_url'))->with('success','Data Berhasil diupdate');
        }else{
            return redirect()->route('anakasuh')->with('failed','Data tidak Berhasil diupdate');
        }
    }

    public function deletedata($id){
        $data = Anak_Asuh::find($id);

        $foto_path = "/images/foto/".$data->Foto;
        $kk_path = "/images/kk/".$data->ScanKK;
        $akta_path = "/images/aktalahir/".$data->ScanAkta;
        $kisbpjs_path = "/images/kisbpjs/".$data->ScanKISBPJS;
        $kip_path = "/images/kip/".$data->ScanKIP;
        $kms_path = "/images/kms/".$data->ScanKMS;
        $kiaktp_path = "/images/kiaktp/".$data->ScanKIAKTP;
        $ijazahsd_path = "/images/ijazahSD/".$data->ScanIjazahSD;
        $ijazahsmp_path = "/images/ijazahSMP/".$data->ScanIjazahSMP;
        $ijazahsma_path = "/images/ijazahSMA/".$data->ScanIjazahSMA;
        $filesosial_path = "/images/filesosial/".$data->ScanFileSosial;
        $path = str_replace("\\",'/',public_path());

        if($data->Foto != null && $data->Foto != ""){
            unlink($path.$foto_path);
        }
        if($data->ScanKK != null && $data->ScanKK != ""){
            unlink($path.$kk_path);
        }
        if($data->ScanAkta != null && $data->ScanAkta != ""){
            unlink($path.$akta_path);
        }
        if($data->ScanKISBPJS != null && $data->ScanKISBPJS != ""){
            unlink($path.$kisbpjs_path);
        }
        if($data->ScanKIP != null && $data->ScanKIP != ""){
            unlink($path.$kip_path);
        }
        if($data->ScanKMS != null && $data->ScanKMS != ""){
            unlink($path.$kms_path);
        }
        if($data->ScanKIAKTP != null && $data->ScanKIAKTP != ""){
            unlink($path.$kiaktp_path);
        }
        if($data->ScanIjazahSD != null && $data->ScanIjazahSD != ""){
            unlink($path.$ijazahsd_path);
        }
        if($data->ScanIjazahSMP != null && $data->ScanIjazahSMP != ""){
            unlink($path.$ijazahsmp_path);
        }
        if($data->ScanIjazahSMA != null && $data->ScanIjazahSMA != ""){
            unlink($path.$ijazahsma_path);
        }
        if($data->ScanFileSosial != null && $data->ScanFileSosial != ""){
            unlink($path.$filesosial_path);
        }

        $data->delete();

        if(session('halaman_url')){
            return redirect(session('halaman_url'))->with('success','Data Berhasil didelete');
        }else{
            return redirect()->route('anakasuh')->with('failed','Data tidak Berhasil ddelete');
        }
    }

    public function exportexcel(){
        $data = Anak_Asuh::all();
        view()->share('data',$data);

        return Excel::download(new AnakasuhExportAll($data),'Data-Anak-Asuh-Semua.xlsx');
    }

    public function exportpdf(){
        $data = Anak_Asuh::all(); 
        header('Content-type: application/pdf');
        view()->share('data',$data);
        $pdf = PDF::loadview('exports.dataanakasuh-pdf')->setPaper('a4', 'landscape');;
        return $pdf-> stream('Data-Anak-Asuh.pdf',array('Attachment'=>false));
        
    }

    public function cetakTanggal(){
        return view('cetak-pertanggal');
    }

    public function cetakAnakTanggal($type, $cetak, $tglAwal, $tglAkhir){
        view()->share('tglAwal', $tglAwal);
        view()->share('tglAkhir', $tglAkhir);
        view()->share('cetak', $cetak);
        if($type == "PDF"){
            if($cetak == "Tanggal Lahir"){
                $data = Anak_Asuh::whereBetween('TanggalLahir',[$tglAwal, $tglAkhir])->get();
    
                view()->share('data',$data);
                $pdf = PDF::loadview('exports.dataanakasuh-pertanggal-pdf')->setPaper('a4', 'landscape');
                return $pdf->stream('Data-Anak-Asuh-PerTanggal.pdf');
            }
            elseif($cetak == "Tanggal Masuk"){
                $data = Anak_Asuh::whereBetween('TanggalMasuk',[$tglAwal, $tglAkhir])->get();
                
                view()->share('data',$data);
                $pdf = PDF::loadview('exports.dataanakasuh-pertanggal-pdf')->setPaper('a4', 'landscape');
                return $pdf-> stream('Data-Anak-Asuh-PerTanggal.pdf');
            }
            elseif($cetak == "Tanggal Keluar"){
                $data = Anak_Asuh::whereBetween('TanggalKeluar',[$tglAwal, $tglAkhir])->get();
                
                view()->share('data',$data);
                $pdf = PDF::loadview('exports.dataanakasuh-pertanggal-pdf')->setPaper('a4', 'landscape');
                return $pdf-> stream('Data-Anak-Asuh-PerTanggal.pdf');
            }
        }elseif($type == "EXCEL"){
            if($cetak == "Tanggal Lahir"){
                $data = Anak_Asuh::whereBetween('TanggalLahir',[$tglAwal, $tglAkhir])->get();
                view()->share('data',$data);

                return Excel::download(new AnakasuhExport($data),'Data-Anak-Asuh.xlsx');
            }
            elseif($cetak == "Tanggal Masuk"){
                $data = Anak_Asuh::whereBetween('TanggalMasuk',[$tglAwal, $tglAkhir])->get();
                view()->share('data',$data);

                return Excel::download(new AnakasuhExport($data),'Data-Anak-Asuh.xlsx');
            }
            elseif($cetak == "Tanggal Keluar"){
                $data = Anak_Asuh::whereBetween('TanggalKeluar',[$tglAwal, $tglAkhir])->get();
                view()->share('data',$data);

                return Excel::download(new AnakasuhExport($data),'Data-Anak-Asuh.xlsx');
            }
        }
        
    }

    public function detailanak($id){
        $data = Anak_Asuh::find($id);
        // dd($data0);
        return view('detailanak', compact('data'));
    }

    public function updatekategori(Request $request, $id){
        $data = Anak_Asuh::find($id);

        if($data) {
            $data->id_kategori = '2';
            $data->TanggalKeluar = date('Y-m-d');
            $data->save();
        }
        if(session('halaman_url')){
            return redirect(session('halaman_url'))->with('success','Data Anak Telah Keluar');
        }else{
            return redirect()->route('anakasuh')->with('failed','Data tidak Berhasil diupdate');
        }

    }
}
