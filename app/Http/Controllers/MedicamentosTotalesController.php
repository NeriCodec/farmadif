<?php

namespace App\Http\Controllers;

use App\Medicamento;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class MedicamentosTotalesController extends Controller
{
    /**
    * Determina si el usuario esta autenticado en la aplicacion.
    *
    * @return void
    */
	public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }

    public function mostrarMedicementosTotales(){
    	$medicamentosTotales = Medicamento::medicamentosTotales();
    	return view('medicamento.medicamentosTotales')->with('medicamentos', $medicamentosTotales);
    }

    public function imprimirReporte(Request $request){
        //return view('reportesPDF.reporteInventario');
        $fInicial = $request->get('fechaIni');
        $fFinal = $request->get('fechaFin');
        $fechaInicial = "";
        $fechaFinal ="";
        if ($fInicial == $fFinal) {
            $fechaInicial = $fInicial."-01";
            $fechaFinal = $fFinal."-30";
        }else{
            $fechaInicial = $fInicial."-01";
            $fechaFinal = $fFinal."-01";
        }
        $medicamentos = Medicamento::salidasMedicamentosFecha($fechaInicial,$fechaFinal);
        $vista =view('reportesPDF.reporteMedicamentoSalida')->with('medicamentos', $medicamentos);
        
        ob_start();
        $vista;
        //view('reportesPDF.reporteInventario');
        $content = ob_get_clean();
        $html2 = base_path('/vendor/libraryPDF/html2pdf/html2pdf.class.php');
        include_once($html2);

        try {
            $html2pdf = new \HTML2PDF('L', 'A4', 'es', true, 'UTF-8',5);//('P', 'Legal', 'es', true, 'UTF-8', array(25.4, 20.4, 25.4, 20.4));
            $html2pdf->pdf->SetTitle('Inventario FARMADIF');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->WriteHTML($vista);
            $html2pdf->Output('salidaMedicamento.pdf');

            ob_flush();
            ob_end_clean();
        }
        catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
        

    }


 }