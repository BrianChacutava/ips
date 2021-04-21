<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Cliente;
use App\Models\Cotacao;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Auth;
use Barryvdh\Snappy\Facades\SnappyPdf;
use App\Models\EmpresaHasDadosBancario;

class pdfController extends Controller
{
    //
    public function gerapdf(Cotacao $cotacoes){
        // dd('pdf');

        
$snappy = App::make('snappy.pdf');


$empresa = Auth::user()->funcionario->departamentos()->first()->empresa;
$dadosBancariosHas = EmpresaHasDadosBancario::where('empresa_id', $empresa->id)->get();

$cotacao = Cotacao::find($cotacoes->id);
$cliente = Cliente::find($cotacao->cliente->id);

return SnappyPdf::loadView('pdf',  compact('cotacao', 'empresa', 'dadosBancariosHas'))->setPaper('a4')->inline('teste.pdf');
// return SnappyPdf::loadView('pdf')->inline('test.pdf');

// return new Response(
//     $snappy->getOutputFromHtml($html),
//     200,
//     array(
//         'Content-Type'          => 'application/pdf',
//         'Content-Disposition'   => 'attachment; filename="file.pdf"'
//     )
// );

        // $pdf = PDF::loaddView('pdf', compact('cotacao'));
        // return $pdf->setPaper('a4')->stream('TodasCotacoes');
    }
}
