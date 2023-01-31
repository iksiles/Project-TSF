<?php

namespace App\Http\Controllers;

use App\Models\Weapons;
use App\Models\Tsf;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WeaponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wep = Weapons::orderBy('id','asc')->paginate(15);
        return view('Tsf.weapons', compact('wep'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Tsf.crearW');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'arma' => 'required|max:40',
            'nacion' => 'required|max:40',
        ]);
        $wep = new Weapons();
        $wep->arma = $request->arma;
        $wep->nacion = $request->nacion;

        if (($request->categoria) == "0") {
            $wep->categoria = "Armamento de defensa personal";
        } elseif (($request->categoria) == "1") {
            $wep->categoria = "Rifle de asalto";
        } elseif (($request->categoria) == "2") {
            $wep->categoria = "Rifle de tirador";
        } elseif (($request->categoria) == "3") {
            $wep->categoria = "Espada";
        } elseif (($request->categoria) == "4") {
            $wep->categoria = "Escudo";
        } elseif (($request->categoria) == "5") {
            $wep->categoria = "Misiles";
        }

        //0 = Armamento de defensa personal
        //1 = Rifle de asalto
        //2 = Rifle de tirador
        //3 = Espada
        //4 = Escudo
        //5 = Misiles

        if (($request->categoria)=="1") {
            $wep->municiones = "36mm/120mm";
        } elseif (($request->categoria)=="2") {
            $wep->municiones = "36mm";
        } elseif (($request->categoria)=="5") {
            $wep->municiones = "HEAT";
        } else {
            $wep->municiones = "NULL";
        }

        if ($request->hasFile("img")){
            $img = $request->file("img");
            $nomImg = Str::slug($request->arma).".".$img->guessExtension();
            $ruta = public_path("img/weapons/");

            copy($img->getRealPath(),$ruta.$nomImg);

            $wep->imgW = $nomImg;
            $wep->type = $img->guessExtension();
        };
        
        $wep->save();
        return redirect()->action([WeaponsController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Weapons  $weapons
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wep = Weapons::findOrFail($id);
        $modelTSF = $wep->modelo_TSF;

        $tsf = Tsf::where('modelo','=',$modelTSF)->get();
        echo $tsf;
        // <a class="btn btn-secondary" href="{{ route('Tsf.show', $wep->modelo_TSF = $tsf->modelo && $tsf->modelo = $tsf->id) }}">{{ $wep->modelo_TSF }}</a> 
        return view('Tsf.verW', ['wep' => $wep, 'tsf' => $tsf]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Weapons  $weapons
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wep = Weapons::findOrFail($id);
        return view('Tsf.editarW', ['wep' => $wep]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Weapons  $weapons
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $wep = Weapons::findOrFail($id);
        $wep->arma = $request->arma;
        $wep->nacion = $request->nacion;

        if (($request->categoria) == "0") {
            $wep->categoria = "Armamento de defensa personal";
        } elseif (($request->categoria) == "1") {
            $wep->categoria = "Rifle de asalto";
        } elseif (($request->categoria) == "2") {
            $wep->categoria = "Rifle de tirador";
        } elseif (($request->categoria) == "3") {
            $wep->categoria = "Espada";
        } elseif (($request->categoria) == "4") {
            $wep->categoria = "Escudo";
        } elseif (($request->categoria) == "5") {
            $wep->categoria = "Misiles";
        }

        //0 = Armamento de defensa personal
        //1 = Rifle de asalto
        //2 = Rifle de tirador
        //3 = Espada
        //4 = Escudo
        //5 = Misiles

        if (($request->categoria)=="1") {
            $wep->municiones = "36mm/120mm";
        } elseif (($request->categoria)=="2") {
            $wep->municiones = "36mm";
        } elseif (($request->categoria)=="5") {
            $wep->municiones = "HEAT";
        } else {
            $wep->municiones = "NULL";
        }

        if ($request->hasFile("img")){
            unlink(public_path('img/weapons/'.$wep->imgW));
            $img = $request->file("img");
            $nomImg = Str::slug($request->arma).".".$img->guessExtension();
            $ruta = public_path("img/weapons/");
    
            copy($img->getRealPath(),$ruta.$nomImg);
    
            $wep->imgW = $nomImg;
            $wep->type = $img->guessExtension();
        } elseif ($request->arma == $wep->arma) {
            
            $img = public_path('img/weapons/'.$wep->imgW);
            
            $nomImg = Str::slug($request->arma).".".$wep->type;
            $ruta = public_path("img/weapons/");

            copy($img,$ruta.$nomImg);
            unlink(public_path('img/weapons/'.$wep->imgW));
            $wep->imgW = $nomImg;
        };
        $wep->save();
        return redirect()->action([WeaponsController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Weapons  $weapons
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wep = Weapons::findOrFail($id);
        if (file_exists(public_path('img/weapons/'.$wep->imgW))) {
            unlink(public_path('img/weapons/'.$wep->imgW));
        }
        $wep->delete();
        return redirect()->route('Tsf.weapons')->with('success', 'El TSF ha sido removido de la BDD');
    }

    public function confirm($id) 
    {
        $wep = Weapons::findOrFail($id);
        return view('Tsf.confirmW', compact('wep'));
    }
}
