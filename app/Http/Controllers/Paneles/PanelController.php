<?php

namespace App\Http\Controllers\Paneles;

use App\Models\Usuario;
use App\Models\Alarma;
use App\Models\Contenedor;
use App\Models\Empresa_contenedore;
use App\Models\Empresa;
use App\Models\Eventos;
use App\Models\Registro_diario_generadores;
use App\Models\Registro_diario_reefers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PanelController extends Controller
{
  
    
    public function board()
    {
        date_default_timezone_set("America/Lima");
        $usuario = []; 
        if (session()->get('usuario') == null) {
            return redirect('/');
        }
        $actualizado =  Usuario::where('usuario',session()->get('usuario'))->update(['ultimo_acceso'=>date('Y-m-d H:i:s')]);
        if ($actualizado == 1) {
            $usuario = Usuario::where('usuario',session()->get('usuario'))->get();
        }
        if (count($usuario) != 0) {

            $empresaXusuario = Empresa::where('usuario_id',$usuario[0]->id)->get();
            $contenedores_todos = Empresa_contenedore::select('contenedores.id', 'contenedores.nombre_contenedor', 
                                        'contenedores.tipo', 'contenedores.encendido', 'empresas.id', 'empresas.usuario_id', 
                                        'empresas.nombre_empresa', 'empresas.descripcion_booking', 'empresas.temp_contratada')
                                        ->join('contenedores', 'contenedores.id', 'empresas_contenedores.contenedor_id')
                                        ->join('empresas', 'empresas.id', 'empresas_contenedores.empresa_id')
                                        ->get();
            $contenedores_encendidos = Empresa_contenedore::select('contenedores.id', 'contenedores.nombre_contenedor', 
                                        'contenedores.tipo', 'contenedores.encendido', 'empresas.id', 'empresas.usuario_id', 
                                        'empresas.nombre_empresa', 'empresas.descripcion_booking', 'empresas.temp_contratada')
                                        ->join('contenedores', 'contenedores.id', 'empresas_contenedores.contenedor_id')
                                        ->join('empresas', 'empresas.id', 'empresas_contenedores.empresa_id')
                                        ->where('contenedores.encendido','encendido')
                                        ->get();

            return Inertia::render('Panel/board', [
                'usuario_logeado' => $usuario,
                'empresa_logeado' => $empresaXusuario,
                'contenedores_todos' => $contenedores_todos,
                'contenedores_encendidos' => $contenedores_encendidos,
            ]);
        }
        
    }
    //http://162.248.55.24/trace/AWS981GHABT2X/ZGRU101342-0?setpoint=4.10&tsupply=23.50&treturn=23.50&rehume=32766&reco2=3276.70&reo2=3276.70&avl=32767&latitude=-08.5&longitude=-79.5&status=off&model=ThermoKing
    /* DATOS ENVIADOS POR GENERADOR
    trace
    AWS981GHABT2X
    ZGRU101342-0
    setpoint=4.10 
    tsupply=23.50
    treturn=23.50
    rehume=32766
    reco2=3276.70
    reo2=3276.70
    avl=32767
    latitude=-08.5
    longitude=-79.5
    status=off
    model=ThermoKing
    */
    //http://162.248.55.24/trace/AWS981GHABT2X/ZGUU205301-0?setpoint=0.00&tsupply=0.00&treturn=0.00&rehume=0.00&fuel=0.00&vdc=0.00&rpm=0&freq=0&vac=0&latitude=&longitude=&tmotor=0.00&status=off&speed=low&ecopower=off&horometro=0&alarma.0=&event.0=&model=thermoking"
    /* DATOS ENVIADOS POR REEFER
    trace
    AWS981GHABT2X
    ZGUU205301-0
    setpoint=0.00
    tsupply=0.00
    treturn=0.00
    rehume=0.00
    fuel=0.00
    vdc=0.00
    rpm=0
    freq=0
    vac=0
    latitude=
    longitude=
    tmotor=0.00
    status=off
    speed=low
    ecopower=off
    horometro=0
    alarma.0=
    event.0=
    model=thermoking
    */
}
