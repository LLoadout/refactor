<?php

use App\Http\Controllers\FeedController;
use App\Http\Controllers\RefactorController;
use App\Http\Factories\RefactorFactory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

    $refactors = collect(File::allFiles(app_path("Http/Refactors")))->map( fn($file) => $file->getFilename())->reject(fn($file) => in_array($file, ['Refactor.php','RefactorInterface.php']));
    $refactors = $refactors->transform(function($file){
        $className = str_replace('.php','',$file);
        $refactor = RefactorFactory::create($className);
        return (object) ['url' => $refactor->url , 'icon' => $refactor->icon, 'title' => $refactor->title ,'description' => $refactor->description, 'requires' => $refactor->requires];
    });

    return view('toc',compact('refactors'));
});

Route::get('/refactor/{refactor?}', RefactorController::class)->name('refactor');
