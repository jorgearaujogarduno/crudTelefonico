<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\telephones;
use App\Models\favorite_number;
use App\Models\telephone_customer;
use Illuminate\Support\Facades\DB;


class TelephoneCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $telephone_customers = telephone_customer::all();
        $telephones = telephones::get();

        return view('index', compact('telephone_customers', 'telephones'));
    }


    public function create()
    {
        $telephones = telephones::get();
        return view('create', compact('telephones'));
    }

    public function store(Request $request)
    {
        // Guardamos los datos del usuario
        $telephone_customer = new telephone_customer([
            'telephone_id' => $request->post('telefonias'),
            'name' => $request->post('name'),
            'ap_paterno' => $request->post('ap_paterno'),
            'ap_materno' => $request->post('ap_materno'),
            'numero_telefonico' => $request->post('numero_telefonico')
        ]);

        $telephone_customer->save();
        $telephone_customer_id = $telephone_customer->id;

        $numero_telefonico_frecuentes = $request->post('numero_telefonico_frecuente');
        $telefonia_frecuentes = $request->post('telefonia_frecuente');


        // Guardamos los números frecuentes del usuario
        foreach($numero_telefonico_frecuentes as $keyNF => $numero_telefonico_frecuente){
            foreach($telefonia_frecuentes as $keyTF => $telefonia_frecuente){
                if($keyNF == $keyTF){
                    $favorite_number = new favorite_number([
                        'telephone_customer_id' => $telephone_customer_id,
                        'telephone_id' => $telefonia_frecuente,
                        'numero_telefonico' => $numero_telefonico_frecuente
                    ]);

                    $favorite_number->save();
                }
            }
        }

        return redirect()->route('usuarios.index')->with('success', 'Se guardaron correctamente los datos');
        // dd(response()->json(['request' => $request->post()]));
    }

    public function show($id)
    {
        $favorite_numbers = DB::table('favorite_numbers')
        ->join('telephones', 'telephones.id', '=', 'favorite_numbers.telephone_id')
        ->select(
            'favorite_numbers.numero_telefonico as numero_telefonico',
            'telephones.name_telefonia as name_telefonia'
        )
        ->where('favorite_numbers.telephone_customer_id', '=',  $id)
        ->get();

        $telephone_customers = telephone_customer::where('id', '=',  $id)->first();

        $numFavorite = count($favorite_numbers);

        $typeError = 2;
        $mensaje = '<span> La impresion de ticket se realizo correctamente </span>';

        return response()->json([
            'numeros_frecuentes' => $numFavorite
            ,'favorite_numbers' => $favorite_numbers
            ,'telephone_customers' => $telephone_customers
        ]);
    }

    public function edit($id)
    {
        // Datos del usuario
        $telephone_customers = telephone_customer::where("id", '=', $id)->get();
        $favorite_numbers = DB::table('favorite_numbers')
        ->join('telephones', 'telephones.id', '=', 'favorite_numbers.telephone_id')
        ->select(
            'favorite_numbers.id as id',
            'favorite_numbers.telephone_id as telephone_id',
            'favorite_numbers.numero_telefonico as numero_telefonico',
            'telephones.name_telefonia as name_telefonia'
        )
        ->where('favorite_numbers.telephone_customer_id', '=',  $id)
        ->get();
        $telephones = telephones::get();

        $numFavorite = count($favorite_numbers);

        return view('editarUsuario', compact('id', 'telephone_customers', 'telephones', 'numFavorite', 'favorite_numbers'));
    }

    public function update(Request $request, $telephone_customer_id)
    {
        $telephone_customer = telephone_customer::find($telephone_customer_id);
        $telephone_customer->telephone_id = $request->post('telefonias');
        $telephone_customer->name = $request->post('name');
        $telephone_customer->ap_paterno = $request->post('ap_paterno');
        $telephone_customer->ap_materno = $request->post('ap_materno');
        $telephone_customer->numero_telefonico = $request->post('numero_telefonico');
        $telephone_customer->update();
        return redirect()->route('usuarios.index')->with('success', 'Se editaron los datos correctamente ');
    }

    public function destroy($id)
    {
        // Eliminamos los números frecuentes
        $favorite_numbers = favorite_number::where("telephone_customer_id", '=', $id);
        $favorite_numbers->delete();
        //Eliminamos el usuario
        $customer = telephone_customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('usuarios.index')->with('success', 'Se elimino el usuario correctamente');
    }
}
