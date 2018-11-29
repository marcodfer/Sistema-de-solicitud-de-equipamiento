<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\SolicitudEquipamiento;

class DynamicPDFController extends Controller
{
  public function vista(){
    $data = SolicitudEquipamiento::all();
    // Send data to the view using loadView function of PDF facade
    $pdf = PDF::loadView('invoice', $data);
    // If you want to store the generated pdf to the server then you can use the store function
    $pdf->save(storage_path().'_filename.pdf');
    // Finally, you can download the file using download function
    return $pdf->download('Solicitud.pdf');
  }


}
