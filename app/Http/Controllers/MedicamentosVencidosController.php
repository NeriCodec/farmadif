<?php

namespace App\Http\Controllers;
use App\Medicamento;


class MedicamentosVencidosController extends Controller
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

    public function mostrarMedicementosVencidos(){
    	$medicamentosVencidos = Medicamento::medicamentosVencidos();
    	return view('medicamento.medicamentoVencido')->with('medicamentos', $medicamentosVencidos);
    }

    public function imprimirReporte(){
        //return view('reportesPDF.reporteInventario');
        $medicamentos = Medicamento::medicamentosVencidos();
        $vista =view('reportesPDF.reporteMedicamentosVencidos')->with('medicamentos', $medicamentos);
        
        ob_start();
        $vista;
        //view('reportesPDF.reporteInventario');
        $content = ob_get_clean();
        $html2 = base_path('/vendor/libraryPDF/html2pdf/html2pdf.class.php');
        include_once($html2);

        try {
            $html2pdf = new \HTML2PDF('P', 'A4', 'es', true, 'UTF-8',5);//('P', 'Legal', 'es', true, 'UTF-8', array(25.4, 20.4, 25.4, 20.4));
            $html2pdf->pdf->SetTitle('Inventario FARMADIF');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->WriteHTML($vista);
            $html2pdf->Output('medicamentosVencidos.pdf');

            ob_flush();
            ob_end_clean();
        }
        catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
        

    }

 }