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
                $labolatorio->Evaluador_id = $request->id_evaluador;

                $evaluador->save();
                $labolatorio->save();

            if($request->categorias_lo==1){

                    $lo_biologo = new LO_biologo();
                    $lo_biologo->lo_CBP = $request->lo_CBP;
                    $lo_biologo->lo_categoria_id = $request->categorias_lo;
                    
                    $lo_biologo->save();
            }
            if($request->categorias_lo==2){
                 $lo_tecnico_medico = new LO_tecnico_medico();
                 $lo_tecnico_medico->lo_CMP = $request->tm_lo_CMP;
                 $lo_tecnico_medico->lo_categoria_id = $request->categorias_lo;
                 ;

                    $lo_tecnico_medico->save();
            }
            if($request->categorias_lo==3){
                 $lo_tecnico_cirujano = new LO_tecnico_cirujano();
                 $lo_tecnico_cirujano->lo_CMP = $request->tc_lo_CMP;$lo_tecnico_cirujano->lo_RNE = $request->lo_RNE;
                 
                 $lo_tecnico_cirujano->lo_categoria_id = $request->categorias_lo;

                $lo_tecnico_cirujano->save();
            }


                
                

             return response()->json(["resp" => "Evaluador medico_laboratorio creado correctamente"], 200);
        }

        

      

        

        
    } catch (Exception $e) {
        
        return response()->json(["resp" => "error", "error" => "Error al crear evaluador: " . $e->getMessage()], 400);
    }




    
}

    public function editar_evaluador($id)
    {


        $datos = Evaluador::find($id)->where('evaluador.estado_registro', '!=', 'I')->where('evaluador.id', '=', $id)->get();

        if ($datos) {


            $tipo= Evaluador::select('evaluador.Tipo_Especialista_id')->where('evaluador.id','=',$id)->value('evaluador.Tipo_Especialista_id');


            if ($tipo == 1) {

                $data1 = TE_medico_ocupacional::join('evaluador', 'evaluador.id', '=', 'TE_medico_ocupacional.Evaluador_id')
                 ->where('evaluador.id', '=', $id)
                ->select(
                    'TE_medico_ocupacional.MO_RNM',
                     'TE_medico_ocupacional.MO_CMP',
                      'TE_medico_ocupacional.MO_RNE')
                ->get();
                return [$data1,$datos];

            }
            if ($tipo == 2) {
                $data2 = TE_medico_auditor::join('evaluador', 'evaluador.id', '=', 'TE_medico_auditor.Evaluador_id')->where('evaluador.id', '=', $id)
                ->select(
                    'TE_medico_auditor.MA_RNA',
                    'TE_medico_auditor.MA_CMP',
                    'TE_medico_auditor.MA_RNM', 
                    'TE_medico_auditor.MA_RNE')->get();

                return [$data2,$datos];

            }
            if ($tipo == 3) {

                $data3 = TE_medico_especialista::join('evaluador', 'evaluador.id', '=', 'TE_medico_especialista.Evaluador_id')
                ->join('ME_categoria', 'ME_categoria.id', '=', 'TE_medico_especialista.me_categoria_id')
                ->where('TE_medico_especialista.Evaluador_id', '=', $id)
                ->select('ME_categoria.nombre', 'TE_medico_especialista.ME_RNE', 'TE_medico_especialista.ME_CMP')
                ->get();

                return [$data3,$datos];

                

            }
            if ($tipo == 4) {
                $data4=TE_odontologia::join('evaluador','evaluador.id','=', 'TE_odontologia.id')->where('TE_odontologia.Evaluador_id','=',$id)->select('TE_odontologia.OD_COP')->get();

                 return [$data4,$datos];

            }
            if ($tipo == 5) {
                $data5=TE_licenciado_psicologia::join('evaluador','evaluador.id','=', 'TE_licenciado_psicologia.id')->where('TE_licenciado_psicologia.Evaluador_id','=',$id)->select('TE_licenciado_psicologia.PS_CPsP')->get();

                 return [$data5,$datos];
            }
            if ($tipo == 6) {

                $lo_cat = TE_laboratorio::select('TE_laboratorio.lo_categoria_id')->where('TE_laboratorio.Evaluador_id', '=', $id)->value('TE_laboratorio.lo_categoria_id');

                if($lo_cat==1){

                    $bio_data=LO_biologo::join('LO_categoria','LO_categoria.id','=','LO_biologo.lo_categoria_id')->join('TE_laboratorio','TE_laboratorio.lo_categoria_id','=','LO_biologo.lo_categoria_id')->where('TE_laboratorio.Evaluador_id', '=', $id)->select('LO_biologo.lo_CBP','LO_categoria.nombre')->get();
                   return [$bio_data,$datos];


                }
                 if($lo_cat==2){
                    $tec_med_data=LO_tecnico_medico::join('LO_categoria','LO_categoria.id','=','LO_tecnico_medico.lo_categoria_id')->join('TE_laboratorio','TE_laboratorio.lo_categoria_id','=','LO_tecnico_medico.lo_categoria_id')->where('TE_laboratorio.Evaluador_id', '=', $id)->select('LO_tecnico_medico.lo_CMP','LO_categoria.nombre')->get();

                   return [$tec_med_data,$datos];
                }
                 if($lo_cat== 3){
                   $tec_ciru_data=LO_tecnico_cirujano::join('LO_categoria','LO_categoria.id','=','lo_tecnico_cirujanos.lo_categoria_id')->select('lo_tecnico_cirujanos.lo_CMP','lo_tecnico_cirujanos.lo_RNE','LO_categoria.nombre')->get();

                   return [$tec_ciru_data,$datos];
                }

            }
            


        }
    }
}
