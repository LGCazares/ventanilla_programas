<?php

use App\Http\Controllers\{ExamplesController,MetaController,StaticsController};
use App\Http\Controllers\AdipServices\{StorageController,SessionService};
use App\Http\Controllers\Examples\BasicAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas arquetipo
|--------------------------------------------------------------------------
|
| Las rutas establecidas en este archivo son utilizadas por el arquetipo
|
*/

Route::group(['prefix' => 'service', 'namespace'=>'AdipServices'], function() {    
    Route::get('/session/getSession', [SessionService::class,'getSession'])->name('getSession');
    
    Route::get('/storage/public/{uuid}', [StorageController::class,'showPublicFileByUuid'])->name('publicFileByUuid');
    Route::get('/storage/getFile/{uuid}',[StorageController::class,'downloadFileByUuid'])->name('downloadFileByUuid');
    Route::get('/storage/viewFile/{uuid}',[StorageController::class,'showFileByUuid'])->name('showFileByUuid');
    Route::post('/storage/upload/', [StorageController::class,'uploadFile'])->name('uploadFile');
});


/*
|--------------------------------------------------------------------------
| Rutas perfil de usuario
|--------------------------------------------------------------------------
|
| Las rutas establecidas en este bloque son para el perfil de usuario
|
*/

Route::get('/force-logi', function () { return view('home');})->middleware('auth')->name('force-logi');

Route::group(['prefix' => 'user-profile', /*'namespace'=>'AdipServices'*/], function() {    
    Route::get('/', function () { trigger_error('Not implemented yet'); })->name('engine.user-profile');
});




/*
|--------------------------------------------------------------------------
| Statics
|--------------------------------------------------------------------------
|
| Rutas con información estática pero que se genera con valores obtenidos de la app
|
*/
Route::get('/js/static.js', [StaticsController::class,'getStaticsJS'])->name('statics.js');




/*
|--------------------------------------------------------------------------
| Metasss
|--------------------------------------------------------------------------
|
| Rutas con archivos para SEO y accesos directos webapp moviles
|
*/
Route::get('/robots.txt', [MetaController::class,'getRobotsFile'])->name('robots_txt');
Route::get('/humans.txt', [MetaController::class,'getHumansFile'])->name('humans_txt');
Route::get('/.well-known/security.txt', [MetaController::class,'getSecurityFile'])->name('security_txt');
Route::get('/manifest.webmanifest', [MetaController::class,'getWebmanifestFile'])->name('manifest.webmanifest');
Route::get('/IEconfig.xml', [MetaController::class,'getIEconfigFile'])->name('IEconfig.xml');



/*
|--------------------------------------------------------------------------
| Ejemplos
|--------------------------------------------------------------------------
|
| Rutas con ejemplos. Se pueden comentar o eliminar
|
*/

Route::group(['prefix' => 'examples'], function() { 
    Route::get('/upload-files.php', function () { return view('examples.uploadfilesform'); })->middleware('auth')->name('examples.uploadfilesform');
    Route::post('/upload-filesB.php', [ExamplesController::class,'uploadFile'])->name('examples.uploadfiles');

    Route::get('/hello-basic-auth', [BasicAuthController::class,'index'])->name('examples.basicauth');

});