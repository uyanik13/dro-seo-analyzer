<?php

use DRO\SeoAnalyzer\Seo;
use Illuminate\Http\Request;
use DRO\SeoAnalyzer\Models\Analyzer;
use Illuminate\Support\Facades\Route;
use DRO\SeoAnalyzer\Http\Controllers\DroSeoAnalyzerController;

Route::post('website-analyzer',[DroSeoAnalyzerController::class, 'index'])->name('dro.seo-analyzer');
Route::get('all-analyzations',[DroSeoAnalyzerController::class, 'getAllAnalyzations'])->name('dro.all-analyzations');
Route::get('analyze/{id}',[DroSeoAnalyzerController::class, 'fetchAnalyze'])->name('dro.analyze');
Route::get('email-template',function(){
      $data = Analyzer::where('id',1)->first();
    return view ('dro::seo-analyzer-mail',[
        'seoInfo' => json_decode($data->seo_info,true),
    ]);
});

