<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExporterController extends Controller
{
  public function __construct(){
    set_time_limit(0);
    ini_set('max_execution_time', 3000);
    ini_set('memory_limit', '256M');
  }

  public function index(){
    return view('exporter.form');
  }

  public function export(){
    $this-> validate(request(),[
      'exportable' => 'required|in:' . implode(',', ['User', 'Product'])
    ],[
      'exportable.in' => 'The model is not available.'
    ]);

    $model = request('exportable');
    $exportable = 'App\\Exports\\' . $model;
    \App\Export::create([
      'model' => $exportable,
      'created_at' => \Carbon\Carbon::now()
    ]);

    return \Maatwebsite\Excel\Facades\Excel::download(new $exportable, $model . '.xlsx');
  }
}
