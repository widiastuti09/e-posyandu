<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});



Route::get('/login', function () {
    return view('Pengguna.login');
})->name('login');

Route::get('/login', function () {
    if (Auth::user()) {
        return redirect('/dashboard');
    }
    return view('Pengguna.login');
});






Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');
Route::get('/logout', 'LoginController@logout')->name('logout');



    Route::group(['middleware' => ['auth', 'CekLevel:admin']], function () {
    Route::get('/beranda', 'BerandaController@index');

    
    Route::get('/penimbangan', 'PenimbanganController@penimbangan')->name('penimbangan');
    Route::get('/addpenimbangan', 'PenimbanganController@addpenimbangan')->name('addpenimbangan');

    Route::get('/dashboard', 'BerandaController@dashboard')->name('dashboard');


    Route::post('/simpan-penimbangan','PenimbanganController@store')->name('simpan-penimbangan');
    Route::get('/detail-penimbangan/{id}','PenimbanganController@show')->name('detail-penimbangan');
    Route::get('/editpenimbangan/{id}','PenimbanganController@editpenimbangan')->name('editpenimbangan');
    Route::post('/updatepenimbangan/{id}','PenimbanganController@update')->name('updatepenimbangan');
    // Route::get('/deletepenimbangan/{id}','PenimbanganController@destroy')->name('deletepenimbangan');
    Route::delete('/deletepenimbangan/{id}','PenimbanganController@destroy');


    Route::get('/register', 'RegistrasibalitaController@register')->name('register');
    Route::get('/addregisterbalita', 'RegistrasibalitaController@addregisterbalita')->name('addregisterbalita');
    Route::post('/simpan-registerbalita','RegistrasibalitaController@store')->name('simpan-registerbalita');
    Route::get('/detailregister/{id}','RegistrasibalitaController@show')->name('detailregister');
    Route::get('/editregister/{id}','RegistrasibalitaController@edit')->name('editregister');
    Route::post('/updateregister/{id}','RegistrasibalitaController@update')->name('updateregister');
    // Route::get('/deleteregister/{id}','RegistrasibalitaController@destroy')->name('deleteregister');
    Route::delete('/deleteregister/{id}','RegistrasibalitaController@destroy');


    Route::get('/registeribuhamil', 'RegisterIbuHamilController@registerhamil')->name('registerhamil');
    Route::get('/addregisteribuhamil', 'RegisterIbuHamilController@create')->name('addregisterhamil');
    Route::get('/detailibuhamil/{id}', 'RegisterIbuHamilController@show')->name('detailibuhamil');
    Route::post('/simpan-registeribuhamil', 'RegisterIbuHamilController@store')->name('simpan-registeribuhamil');
    // Route::get('/deleteregisteribuhamil/{id}', 'RegisterIbuHamilController@destroy')->name('deleteregisteribuhamil');
    Route::post('/updateregisterbumil/{id}', 'RegisterIbuHamilController@update')->name('updateregisterbumil');
    Route::get('/editregisterbumil/{id}','RegisterIbuHamilController@edit')->name('editregisterbumil');
    Route::delete('/deleteregisteribuhamil/{id}', 'RegisterIbuHamilController@destroy');


    

    
    Route::get('/registerlansia', 'RegisterLansiaController@registerlansia')->name('registerlansia');
    Route::get('/addregisterlansia','RegisterLansiaController@create')->name('addregisterlansia');
    Route::get('/detailregisterlansia/{id}', 'RegisterLansiaController@show')->name('detailregisterlansia');
    Route::post('/simpan-registerlansia', 'RegisterLansiaController@store')->name('simpan-lansia');
    // Route::get('/delete-registerlansia/{id}', 'RegisterLansiaController@destroy')->name('hapus-lansia');
    Route::post('/updateregisterlansia/{id}', 'RegisterLansiaController@update')->name('update-lansia');
    Route::get('/editregisterlansia/{id}', 'RegisterLansiaController@edit')->name('edit-lansia');
    Route::delete('/delete-registerlansia/{id}', 'RegisterLansiaController@destroy');


    Route::get('/pemeriksaanlansia', 'PemeriksaanLansiaController@index')->name('pemeriksaanlansia');
    Route::get('/detailpemeriksaanlansia/{id}', 'PemeriksaanLansiaController@show')->name('detailpemeriksaanlansia');
    Route::get('/addpemeriksaanlansia', 'PemeriksaanLansiaController@create')->name('addpemeriksaanlansia');
    Route::post('/simpanpemeriksaanlansia', 'PemeriksaanLansiaController@store')->name('simpanpemeriksaanlansia');
    // Route::get('/deletepemeriksaanlansia/{id}', 'PemeriksaanLansiaController@destroy')->name('deletepemeriksaanlansia');
    Route::get('/editpemeriksaanlansia/{id}', 'PemeriksaanLansiaController@edit')->name('editpemeriksaanlansia');
    Route::post('/updatepemeriksaan/{id}', 'PemeriksaanLansiaController@update')->name('updatepemeriksaanlansia');
    Route::delete('/deletepemeriksaanlansia/{id}', 'PemeriksaanLansiaController@destroy');


    //Jadwal balita

    Route::get('/Jadwal-Balita', 'JadwalbalitaController@index')->name('jadwalpenimbangan');
    Route::get('/Add-Jadwal-Balita', 'JadwalbalitaController@create')->name('addjadwalpenimbangan');
    Route::post('/simpan-jadwal-balita','JadwalbalitaController@store')->name('simpanjadwalpenimbangan');
    // Route::get('/Hapus-jadwal-balita/{id}','JadwalbalitaController@destroy')->name('hapusjadwalpenimbangan');
    Route::get('/Detail-jadwal-balita/{id}','JadwalbalitaController@show')->name('detailjadwalpenimbangan');
    Route::get('Edit-jadwal-balita/{id}','JadwalbalitaController@edit')->name('editjadwalpenimbangan');
    Route::post('Update-jadwal-balita/{id}','JadwalbalitaController@update')->name('updatejadwalpenimbangan');
    Route::delete('/Hapus-jadwal-balita/{id}','JadwalbalitaController@destroy');


    //Jadwal bumil

    Route::get('/Jadwal-Bumil', 'JadwalbumilController@index')->name('jadwalpemeriksaan');
    Route::get('/Add-Jadwal-Bumil', 'JadwalbumilController@create')->name('addjadwalpemeriksaan');
    Route::get('/Detail-jadwal-bumil/{id}','JadwalbumilController@show')->name('detailjadwalpemeriksaan');
    Route::post('/simpan-jadwal-bumil','JadwalbumilController@store')->name('simpanjadwalpemeriksaan');
    Route::get('Edit-jadwal-bumil/{id}','JadwalbumilController@edit')->name('editjadwalpemeriksaan');
    Route::get('/Hapis-jadwal-bumil/{id}','JadwalbumilController@destroy')->name('hapusjadwalpemeriksaan');
  

    Route::post('Update-jadwal-bumil/{id}','JadwalbumilController@update')->name('updatejadwalpemeriksaan');

    //Jadwal lansia 
    
    Route::get('/Jadwal-Lansia', 'JadwallansiaController@index')->name('jadwallansia');
    Route::get('/Add-Jadwal-Lansia', 'JadwallansiaController@create')->name('addjadwallansia');
    Route::post('/simpan-jadwal','JadwallansiaController@store')->name('simpanjadwallansia');
    Route::get('/Hapus-jadwal/{id}','JadwallansiaController@destroy')->name('hapusjadwallansia');
    Route::get('/Detail-jadwal/{id}','JadwallansiaController@show')->name('detailjadwallansia');
    Route::get('Edit-jadwal/{id}','JadwallansiaController@edit')->name('editjadwallansia');
    Route::post('Update-jadwal/{id}','JadwallansiaController@update')->name('updatejadwallansia');
    

    //resti
    Route::get('/Bumil-resti', 'BumilrestiController@index')->name('bumilresti');
    Route::get('/Add-Bumil-resti', 'BumilrestiController@create')->name('addbumilresti');
    Route::post('/Simpan-Bumil-resti', 'BumilrestiController@store')->name('simpanbumilresti');
    // Route::get('/Hapus-Bumil-resti/{id}', 'BumilrestiController@destroy')->name('hapusbumilresti');
    Route::get('/Detail-Bumil-resti/{id}', 'BumilrestiController@show')->name('detailbumilresti');
    Route::get('/Edit-Bumil-resti/{id}','BumilrestiController@edit')->name('editbumilresti');
    Route::post('/Update-Bumil-resti/{id}', 'BumilrestiController@update')->name('updatebumilresti');
    Route::delete('/Hapus-Bumil-resti/{id}','BumilrestiController@destroy');
    
});

Route::group(['middleware' => ['auth', 'CekLevel:kader2,admin']], function(){

    Route::get('/beranda', 'BerandaController@index');

    Route::get('/registerlansia', 'RegisterLansiaController@registerlansia')->name('registerlansia');
    Route::get('/addregisterlansia','RegisterLansiaController@create')->name('addregisterlansia');
    Route::get('/detailregisterlansia/{id}', 'RegisterLansiaController@show')->name('detailregisterlansia');
    Route::post('/simpan-registerlansia', 'RegisterLansiaController@store')->name('simpan-lansia');
    Route::get('/delete-registerlansia/{id}', 'RegisterLansiaController@destroy')->name('hapus-lansia');
    Route::post('/updateregisterlansia/{id}', 'RegisterLansiaController@update')->name('update-lansia');
    Route::get('/editregisterlansia/{id}', 'RegisterLansiaController@edit')->name('edit-lansia');

    Route::get('/pemeriksaanlansia', 'PemeriksaanLansiaController@index')->name('pemeriksaanlansia');
    Route::get('/detailpemeriksaanlansia/{id}', 'PemeriksaanLansiaController@show')->name('detailpemeriksaanlansia');
    Route::get('/addpemeriksaanlansia', 'PemeriksaanLansiaController@create')->name('addpemeriksaanlansia');
    Route::post('/simpanpemeriksaanlansia', 'PemeriksaanLansiaController@store')->name('simpanpemeriksaanlansia');
    Route::get('/deletepemeriksaanlansia/{id}', 'PemeriksaanLansiaController@destroy')->name('deletepemeriksaanlansia');
    Route::get('/editpemeriksaanlansia/{id}', 'PemeriksaanLansiaController@edit')->name('editpemeriksaanlansia');

    //pdf
    Route::get('/cetaklansia', 'PemeriksaanLansiaController@print')->name('cetaklansia');

      //Jadwal balita

      Route::get('/Jadwal-Balita', 'JadwalbalitaController@index')->name('jadwalpenimbangan');
      Route::get('/Add-Jadwal-Balita', 'JadwalbalitaController@create')->name('addjadwalpenimbangan');
      Route::post('/simpan-jadwal-balita','JadwalbalitaController@store')->name('simpanjadwalpenimbangan');
      Route::get('/Hapus-jadwal-balita/{id}','JadwalbalitaController@destroy')->name('hapusjadwalpenimbangan');
      Route::get('/Detail-jadwal-balita/{id}','JadwalbalitaController@show')->name('detailjadwalpenimbangan');
      Route::get('Edit-jadwal-balita/{id}','JadwalbalitaController@edit')->name('editjadwalpenimbangan');
      Route::post('Update-jadwal-balita/{id}','JadwalbalitaController@update')->name('updatejadwalpenimbangan');
  
      //Jadwal bumil
  
      Route::get('/Jadwal-Bumil', 'JadwalbumilController@index')->name('jadwalpemeriksaan');
      Route::get('/Add-Jadwal-Bumil', 'JadwalbumilController@create')->name('addjadwalpemeriksaan');
      Route::get('/Detail-jadwal-bumil/{id}','JadwalbumilController@show')->name('detailjadwalpemeriksaan');
      Route::post('/simpan-jadwal-bumil','JadwalbumilController@store')->name('simpanjadwalpemeriksaan');
      Route::get('Edit-jadwal-bumil/{id}','JadwalbumilController@edit')->name('editjadwalpemeriksaan');
      Route::get('/Hapus-jadwal-bumil/{id}','JadwalbumilController@destroy')->name('hapusjadwalpemeriksaan');
      Route::post('Update-jadwal-bumil/{id}','JadwalbumilController@update')->name('updatejadwalpemeriksaan');
  
      //Jadwal lansia 
      
      Route::get('/Jadwal-Lansia', 'JadwallansiaController@index')->name('jadwallansia');
      Route::get('/Add-Jadwal-Lansia', 'JadwallansiaController@create')->name('addjadwallansia');
      Route::post('/simpan-jadwal','JadwallansiaController@store')->name('simpanjadwallansia');
      Route::get('/Hapis-jadwal/{id}','JadwallansiaController@destroy')->name('hapusjadwallansia');
      Route::get('/Detail-jadwal/{id}','JadwallansiaController@show')->name('detailjadwallansia');
      Route::get('Edit-jadwal/{id}','JadwallansiaController@edit')->name('editjadwallansia');
      Route::post('Update-jadwal/{id}','JadwallansiaController@update')->name('updatejadwallansia');
  

});


Route::group(['middleware' => ['auth']], function () {
    Route::get('/beranda', 'BerandaController@index');
   
    Route::get('/penimbangan', 'PenimbanganController@penimbangan')->name('penimbangan');
    Route::get('/addpenimbangan', 'PenimbanganController@addpenimbangan')->name('addpenimbangan');
    Route::get('/dashboard', 'BerandaController@dashboard')->name('dashboard');
    Route::post('/simpan-penimbangan','PenimbanganController@store')->name('simpan-penimbangan');
    Route::get('/detail-penimbangan/{id}','PenimbanganController@show')->name('detail-penimbangan');
    Route::get('/editpenimbangan/{id}','PenimbanganController@editpenimbangan')->name('editpenimbangan');
    Route::post('/updatepenimbangan/{id}','PenimbanganController@update')->name('updatepenimbangan');
    Route::get('/deletepenimbangan/{id}','PenimbanganController@destroy')->name('deletepenimbangan');

    //pdf
    Route::get('/cetakPenimbangan', 'PenimbanganController@print')->name('cetakpenimbangan');

    Route::get('/register', 'RegistrasibalitaController@register')->name('register');
    Route::get('/addregisterbalita', 'RegistrasibalitaController@addregisterbalita')->name('addregisterbalita');
    Route::post('/simpan-registerbalita','RegistrasibalitaController@store')->name('simpan-registerbalita');
    Route::get('/detailregister/{id}','RegistrasibalitaController@show')->name('detailregister');
    Route::get('/editregister/{id}','RegistrasibalitaController@edit')->name('editregister');
    Route::post('/updateregister/{id}','RegistrasibalitaController@update')->name('updateregister');
    Route::get('/deleteregister/{id}','RegistrasibalitaController@destroy')->name('deleteregister');

    Route::get('/registeribuhamil', 'RegisterIbuHamilController@registerhamil')->name('registerhamil');
    Route::get('/addregisteribuhamil', 'RegisterIbuHamilController@create')->name('addregisterhamil');
    Route::get('/detailibuhamil/{id}', 'RegisterIbuHamilController@show')->name('detailibuhamil');
    Route::post('/simpan-registeribuhamil', 'RegisterIbuHamilController@store')->name('simpan-registeribuhamil');
    Route::get('/deleteregisteribuhamil/{id}', 'RegisterIbuHamilController@destroy')->name('deleteregisteribuhamil');
    Route::post('/updateregisterbumil/{id}', 'RegisterIbuHamilController@update')->name('updateregisterbumil');
    Route::get('/editregisterbumil/{id}','RegisterIbuHamilController@edit')->name('editregisterbumil');

    Route::get('/pegguna', 'UserController@index')->name('pengguna.index');

    Route::get('/pegguna/tambah-petugas', 'UserController@tambahPetugas')->name('pengguna.tambah-petugas');
    Route::post('/pengguna/store-petugas', 'UserController@storePetugas')->name('pengguna.store-petugas');
    Route::get('/pengguna/{id}/edit-petugas', 'UserController@editPetugas')->name('pengguna.edit-petugas');
    Route::put('/pengguna/update-petugas/{id}', 'UserController@updatePetugas')->name('pengguna.update-petugas');
    Route::delete('/pengguna/hapus-petugas/{id}', 'UserController@hapusPetugas')->name('pengguna.hapus-petugas');
    Route::get('/pengguna/detail-petugas/{id}', 'UserController@detailPetugas')->name('pengguna.detail-petugas');

    Route::get('/pengguna/tambah-umum', 'UserController@tambahUmum')->name('pengguna.tambah-umum');
    Route::post('/pengguna/store-umum', 'UserController@storeUmum')->name('pengguna.store-umum');
    Route::get('/pengguna/{id}/edit-umum', 'UserController@editUmum')->name('pengguna.edit-umum');
    Route::put('/pengguna/update-umum/{id}', 'UserController@updateUmum')->name('pengguna.update-umum');
    Route::delete('/pengguna/hapus-umum/{id}', 'UserController@hapusUmum')->name('pengguna.hapus-umum');
    Route::get('/pengguna/detail-umum/{id}','UserController@detailUmum')->name('pengguna.detail-umum');
    

    Route::get('pemeriksaaan-ibu-hamil', 'PemeriksaanIbuHamilController@index')->name('pemeriksaanibuhamil.index');
    Route::get('pemeriksaaan-ibu-hamil/create', 'PemeriksaanIbuHamilController@create')->name('pemeriksaanibuhamil.create');
    Route::get('pemeriksaaan-ibu-hamil/{id}', 'PemeriksaanIbuHamilController@show')->name('pemeriksaanibuhamil.show');
    Route::post('pemeriksaaan-ibu-hamil/store', 'PemeriksaanIbuHamilController@store')->name('pemeriksaanibuhamil.store');
    Route::get('pemeriksaaan-ibu-hamil/{id}/edit', 'PemeriksaanIbuHamilController@edit')->name('pemeriksaanibuhamil.edit');
    Route::put('pemeriksaaan-ibu-hamil/{id}', 'PemeriksaanIbuHamilController@update')->name('pemeriksaanibuhamil.update');
    // Route::get('pemeriksaaan-ibu-hamil/delete/{id}', 'PemeriksaanIbuHamilController@destroy')->name('pemeriksaanibuhamil.destroy');
    Route::delete('pemeriksaaan-ibu-hamil/delete/{id}', 'PemeriksaanIbuHamilController@destroy');


      //pdf
      Route::get('/CetakBumil', 'PemeriksaanIbuHamilController@print')->name('cetakbumil');


      //Jadwal balita

      Route::get('/Jadwal-Balita', 'JadwalbalitaController@index')->name('jadwalpenimbangan');
      Route::get('/Add-Jadwal-Balita', 'JadwalbalitaController@create')->name('addjadwalpenimbangan');
      Route::post('/simpan-jadwal-balita','JadwalbalitaController@store')->name('simpanjadwalpenimbangan');
      Route::get('/Hapis-jadwal-balita/{id}','JadwalbalitaController@destroy')->name('hapusjadwalpenimbangan');
      Route::get('/Detail-jadwal-balita/{id}','JadwalbalitaController@show')->name('detailjadwalpenimbangan');
      Route::get('Edit-jadwal-balita/{id}','JadwalbalitaController@edit')->name('editjadwalpenimbangan');
      Route::post('Update-jadwal-balita/{id}','JadwalbalitaController@update')->name('updatejadwalpenimbangan');
  
      //Jadwal bumil
  
      Route::get('/Jadwal-Bumil', 'JadwalbumilController@index')->name('jadwalpemeriksaan');
      Route::get('/Add-Jadwal-Bumil', 'JadwalbumilController@create')->name('addjadwalpemeriksaan');
      Route::get('/Detail-jadwal-bumil/{id}','JadwalbumilController@show')->name('detailjadwalpemeriksaan');
      Route::post('/simpan-jadwal-bumil','JadwalbumilController@store')->name('simpanjadwalpemeriksaan');
      Route::get('Edit-jadwal-bumil/{id}','JadwalbumilController@edit')->name('editjadwalpemeriksaan');
    //   Route::get('/Hapus-jadwal-bumil/{id}','JadwalbumilController@destroy')->name('hapusjadwalpemeriksaan');
      Route::post('Update-jadwal-bumil/{id}','JadwalbumilController@update')->name('updatejadwalpemeriksaan');
      Route::delete('/Hapus-jadwal-bumil/{id}','JadwalbumilController@destroy');

      
      //Jadwal lansia 
      
      Route::get('/Jadwal-Lansia', 'JadwallansiaController@index')->name('jadwallansia');
      Route::get('/Add-Jadwal-Lansia', 'JadwallansiaController@create')->name('addjadwallansia');
      Route::post('/simpan-jadwal','JadwallansiaController@store')->name('simpanjadwallansia');
    //   Route::get('/Hapus-jadwal/{id}','JadwallansiaController@destroy')->name('hapusjadwallansia');
      Route::get('/Detail-jadwal/{id}','JadwallansiaController@show')->name('detailjadwallansia');
      Route::get('Edit-jadwal/{id}','JadwallansiaController@edit')->name('editjadwallansia');
      Route::post('Update-jadwal/{id}','JadwallansiaController@update')->name('updatejadwallansia');
      Route::delete('/Hapus-jadwal/{id}','JadwallansiaController@destroy');


      //resti
    Route::get('/Bumil-resti', 'BumilrestiController@index')->name('bumilresti');
    Route::get('/Add-Bumil-resti', 'BumilrestiController@create')->name('addbumilresti');
    Route::post('/Simpan-Bumil-resti', 'BumilrestiController@store')->name('simpanbumilresti');
    // Route::get('/Hapus-Bumil-resti/{id}', 'BumilrestiController@destroy')->name('hapusbumilresti');
    Route::get('/Detail-Bumil-resti/{id}', 'BumilrestiController@show')->name('detailbumilresti');
    Route::get('/Edit-Bumil-resti/{id}','BumilrestiController@edit')->name('editbumilresti');
    Route::post('/Update-Bumil-resti/{id}', 'BumilrestiController@update')->name('updatebumilresti');
    Route::delete('/Hapus-Bumil-resti/{id}','BumilrestiController@destroy');


    //pdf

    Route::get('/cetak-bumil-resti', 'BumilrestiController@print')->name('cetakbumilresti');
  

});


// Route::get('/test-firebase', 'JadwalbalitaController@sendNotification');
