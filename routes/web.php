<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnakAsuhController;
use App\Http\Controllers\LoginController;
use App\Models\Anak_Asuh;
use App\Models\User;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // $dataanak = Anak_Asuh::latest()->get();
    // $data = Anak_Asuh::latest()->orderBy('TanggalLahir','desc')->paginate(8);
    $today=now();
    $data = Anak_Asuh::whereMonth('TanggalLahir',$today->month)->paginate(8);
    $dataanak = Anak_Asuh::orderBy('TanggalMasuk','desc')->take(5)->get();
    $jumlahanak = Anak_Asuh::count();
    $jumlahaktif = Anak_Asuh::where('id_kategori','1')->count();
    $jumlahkeluar = Anak_Asuh::where('id_kategori','2')->count();
    $pekerja = User::where('role','operator')->count();
    // chart pie
    $jumlahanaklaki = Anak_Asuh::where('jeniskelamin','laki-laki')->count();
    $jumlahanakperempuan = Anak_Asuh::where('jeniskelamin','perempuan')->count();
    // chart donut
    $statusy = Anak_Asuh::where('Status','Yatim')->count();
    $statusp = Anak_Asuh::where('Status','Piatu')->count();
    $statusyp = Anak_Asuh::where('Status','Yatim Piatu')->count();
    $statusd = Anak_Asuh::where('Status','Dhuafa')->count();
    // area chart anak aktif
    $months = [];
    
    $anakaktif = Anak_Asuh::select('id','TanggalMasuk')->orderBy('TanggalMasuk','ASC')->where('id_kategori','1')->get()->groupBy(function($anakaktif) {
        return Carbon::parse($anakaktif->TanggalMasuk)->format('M Y'); // grouping by months
    });
    $monthaktif = [];
    foreach ($anakaktif as $month => $values) {
        $months[] = $month;
        $monthaktif[] = count($values);
    }
    // area chart anak keluar
    $months2 = [];
    $anakkeluar = Anak_Asuh::select('id','TanggalKeluar')->orderBy('TanggalKeluar','ASC')->where('id_kategori','2')->get()->groupBy(function($anakkeluar) {
        return Carbon::parse($anakkeluar->TanggalKeluar)->format('M Y'); // grouping by months
    });
    // dd($anakkeluar);
    $monthkeluar = [];
    foreach ($anakkeluar as $month2 => $values2) {
        $months2[] = $month2;
        $monthkeluar[] = count($values2);
    }

    return view('welcome', compact(
        'data',
        'dataanak',
        'jumlahanak',
        'jumlahaktif',
        'jumlahkeluar',
        'pekerja',
        // chart pie
        'jumlahanaklaki',
        'jumlahanakperempuan',
        // chart donut
        'statusy',
        'statusp',
        'statusyp',
        'statusd',
        // area chart 
        'anakaktif',
        'months',
        'months2',
        'monthaktif',
        'anakkeluar',
        'monthkeluar',
    ));
})->middleware('auth');

Route::group(['middleware'=>['auth','hakakses:admin']],function(){
    Route::get('/datauser', [App\Http\Controllers\LoginController::class, 'datauser'])->name('datauser');
    // Route::post('/ubahrole/{id}', [App\Http\Controllers\LoginController::class, 'ubahrole'])->name('ubahrole');
    Route::get('/register',[LoginController::class, 'register'])->name('register');
    Route::post('/registeruser',[LoginController::class, 'registeruser'])->name('registeruser');
    // delete
    Route::get('/deletedatauser/{id}',[LoginController::class, 'deletedatauser'])->name('deletedatauser')->middleware('auth');
});

Route::group(['middleware'=>['auth','hakakses:admin,operator,Kepala UPT']],function(){
    Route::get('/anakasuh',[AnakAsuhController::class, 'index'])->name('anakasuh')->middleware('auth');
    // profile dan update profile
    Route::get('/profil', [App\Http\Controllers\LoginController::class, 'profil'])->name('profil');
    Route::post('/updateprofil', [App\Http\Controllers\LoginController::class, 'updateprofil'])->name('updateprofil');
    Route::get('/detailanak/{id}',[AnakAsuhController::class, 'detailanak'])->name('detailanak')->middleware('auth');
    // export pdf
    Route::get('/exportpdf',[AnakAsuhController::class, 'exportpdf'])->name('exportpdf')->middleware('auth');
    Route::get('/cetak-pertanggal',[AnakAsuhController::class, 'cetakTanggal'])->name('cetak-pertanggal')->middleware('auth');
    Route::get('/cetak-anak-pertanggal/{type}/{cetak}/{tglAwal}/{tglAkhir}',[AnakAsuhController::class, 'cetakAnakTanggal'])->name('cetak-anak-pertanggal')->middleware('auth');
    // export excel
    Route::get('/exportexcel',[AnakAsuhController::class, 'exportexcel'])->name('exportexcel')->middleware('auth');
});

Route::group(['middleware'=>['auth','hakakses:operator,admin']],function(){
    Route::get('/tambahanak',[AnakAsuhController::class, 'tambahanak'])->name('tambahanak')->middleware('auth');
    Route::post('/insertdata',[AnakAsuhController::class, 'insertdata'])->name('insertdata');
    // tampilan edit
    Route::get('/tampilkandata/{id}',[AnakAsuhController::class, 'tampilkandata'])->name('tampilkandata')->middleware('auth');
    Route::post('/updatedata/{id}',[AnakAsuhController::class, 'updatedata'])->name('updatedata');
    // Edit Aktif dan Keluar
    Route::post('/updatekategori/{id}',[AnakAsuhController::class, 'updatekategori'])->name('updatekategori');
    // delete
    Route::get('/deletedata/{id}',[AnakAsuhController::class, 'deletedata'])->name('deletedata')->middleware('auth');
});

// download kk
// Route::get('/downloadkk/{id}',[AnakAsuhController::class, 'downloadkk'])->name('downloadkk');

// login register
Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::post('/loginproses',[LoginController::class, 'loginproses'])->name('loginproses');

Route::get('/logout',[LoginController::class, 'logout'])->name('logout');




