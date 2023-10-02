<?php

namespace App\Http\Controllers;

use App\Models\Evaluador;
use App\Models\LO_biologo;
use App\Models\LO_categoria;
use App\Models\LO_tecnico_cirujano;
use App\Models\LO_tecnico_medico;
use App\Models\ME_categoria;
use App\Models\TE_laboratorio;
use App\Models\TE_licenciado_psicologia;
use App\Models\TE_medico_auditor;
use App\Models\TE_medico_especialista;
use App\Models\TE_medico_ocupacional;
use App\Models\TE_odontologia;
use App\Models\Tipo_Especialista;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Expectation;

class EvaluadorController extends Controller
{
   public function index_tipo_especialista(){


$eval = Evaluador::orderBy('id', 'desc')->take(1)->get();
        $cuantos=count($eval);

        if($cuantos==0){
            $id_sigui = 1;
        }else{
            $id_sigui = $eval[0]->id + 1;
        }

        $tipos = Tipo_Especialista::all();
        $categorias_me = ME_categoria::all();
        $categorias_lo=LO_categoria::all();

        return view('Form_especialista',['tipos' => $tipos,'categorias_me' => $categorias_me,'categorias_lo' => $categorias_lo])->with('id_sigui',$id_sigui);
    }

     


    public function create_evaluador(Request $request)
    {

    try {
        
        $evaluador = new Evaluador();

        // Asignar los valores de los campos del modelo a partir de la solicitud
       
       if ($request->hasFile('imagen_firma')) {
        $imagenFirma = $request->file('imagen_firma');
        $nombreImagen = time() . '.' . $imagenFirma->getClientOriginalExtension();
        // Define la ruta completa donde se almacenará la imagen
        $rutaImagen = public_path('img/firmas') . '/' . $nombreImagen;
        // Mueve la imagen al destino
        $imagenFirma->move(public_path('img/firmas'), $nombreImagen);
        $evaluador->imagen_firma =  $nombreImagen;
    }

           
        $evaluador->apellidos = $request->apellidos;
        $evaluador->nombres = $request->nombres;
        $evaluador->direccion =$request->direccion;
        $evaluador->telefono = $request->telefono;
        $evaluador->email = $request->email;
        $evaluador->pos_firma = $request->pos_firma;

        $evaluador->Tipo_Especialista_id = $request->Tipo_Especialista_id;

        if( $request->estado_registro!=null){
        $evaluador->estado_registro = $request->estado_registro;
        }
        else{
            $evaluador->estado_registro = "I";
        }

        if($request->Tipo_Especialista_id=="1"){
            $te_medico_ocupacional=new TE_medico_ocupacional();

                $te_medico_ocupacional->MO_RNM = $request->MO_RNM;
                $te_medico_ocupacional->MO_CMP = $request->MO_CMP;
                $te_medico_ocupacional->MO_RNE = $request->MO_RNE;
                $te_medico_ocupacional->Evaluador_id = $request->id_evaluador;

                
                $evaluador->save();
                $te_medico_ocupacional->save();

                return response()->json(["resp" => "Evaluador medico_Ocupacional creado correctamente"], 200);
        }
        if($request->Tipo_Especialista_id=="2"){
            $lo_medico_auditor=new TE_medico_auditor();

                $lo_medico_auditor->MA_RNA = $request->MA_RNA;
                $lo_medico_auditor->MA_CMP = $request->MA_CMP;
                $lo_medico_auditor->MA_RNM = $request->MA_RNM;
                $lo_medico_auditor->MA_RNE = $request->MA_RNE;
                $lo_medico_auditor->Evaluador_id = $request->id_evaluador;

               
                $evaluador->save();
                 $lo_medico_auditor->save();

                return response()->json(["resp" => "Evaluador medico_auditor creado correctamente"], 200);
        }
        if($request->Tipo_Especialista_id=="3"){
            $me_especialista=new TE_medico_especialista();

                $me_especialista->ME_RNE = $request->ME_RNE;
                $me_especialista->ME_CMP = $request->ME_CMP;
                $me_especialista->Evaluador_id =$request->id_evaluador;
                $me_especialista->me_categoria_id =$request->categorias_me;
                
                    
                $evaluador->save();
                $me_especialista->save();

                return response()->json(["resp" => "Evaluador medico_especialista creado correctamente"], 200);
        }
        if($request->Tipo_Especialista_id=="4"){

                $te_odontologia=new TE_odontologia();
                $te_odontologia->OD_COP =$request->OD_COP;
                $te_odontologia->Evaluador_id = $request->id_evaluador;

                
                $evaluador->save();
                $te_odontologia->save();

                return response()->json(["resp" => "Evaluador medico_odontologia creado correctamente"], 200);
        }
        if($request->Tipo_Especialista_id=="5"){

                $te_psicologia=new TE_licenciado_psicologia();
                $te_psicologia->PS_CPsP = $request->PS_CPsP;
                $te_psicologia->Evaluador_id = $request->id_evaluador;


                $evaluador->save();
                $te_psicologia->save();

             return response()->json(["resp" => "Evaluador licenciado_Psicologia creado correctamente"], 200);
        }
        if($request->Tipo_Especialista_id=="6"){

                $labolatorio = new TE_laboratorio();
                $labolatorio->lo_categoria_id = $request->categorias_lo;

                $evaluador->save();
                $labolatorio->save();

            if($request->categorias_lo==1){

                    $lo_biologo = new LO_biologo();
                    $lo_biologo->lo_CBP = $request->lo_CBP;
                    $lo_biologo->lo_categoria_id = $request->categorias_lo;
                    $lo_biologo->Evaluador_id = $request->id_evaluador;

                    $lo_biologo->save();
            }
            if($request->categorias_lo==2){
                 $lo_tecnico_medico = new LO_tecnico_medico();
                 $lo_tecnico_medico->lo_CMP = $request->tm_lo_CMP;
                 $lo_tecnico_medico->lo_categoria_id = $request->categorias_lo;
                 $lo_tecnico_medico->Evaluador_id = $request->id_evaluador;

                    $lo_tecnico_medico->save();
            }
            if($request->categorias_lo==3){
                 $lo_tecnico_cirujano = new LO_tecnico_cirujano();
                 $lo_tecnico_cirujano->lo_CMP = $request->tc_lo_CMP;$lo_tecnico_cirujano->lo_RNE = $request->lo_RNE;
                 $lo_tecnico_cirujano->Evaluador_id = $request->id_evaluador;
                 $lo_tecnico_cirujano->lo_categoria_id = $request->categorias_lo;

                $lo_tecnico_cirujano->save();
            }


                
                

             return response()->json(["resp" => "Evaluador medico_laboratorio creado correctamente"], 200);
        }

        

      

        

        
    } catch (Exception $e) {
        
        return response()->json(["resp" => "error", "error" => "Error al crear evaluador: " . $e->getMessage()], 400);
    }
}
}
