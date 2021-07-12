<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\send as Send;
use App\tracking as Tracking;

class sendProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sends = Send::paginate(35);
        return view('all-products', compact('sends'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sends.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  return $request->all();
        //  return  Auth::id();

        $validatedData = $request->validate([
            'folio' => ['required', 'unique:sends', 'max:255'],
            'producto' => ['required'],
            'cliente' => ['required', 'min:3'],
            'vendedor' => ['required', 'min:3'],
            'fecha_envio' => ['required'],
            'hora_envio' => ['required'],
            'fecha_llegada' => ['required'],
            'salida' => ['required', 'min:4'],
            'llegada' => ['required', 'min:4'],
            'precio' => ['required'],
            'comentario' => ['required', 'min:15'],
        ]);

        $send = new Send();

        $send->folio = strtoupper($request->folio);
        $send->product = ucfirst($request->producto);
        $send->client = ucwords($request->cliente);
        $send->provider = ucwords($request->vendedor);
        $send->date_send = $request->fecha_envio;
        $send->hour_send = $request->hora_envio;
        $send->date_arrival = $request->fecha_llegada;
        $send->departure_location = ucfirst($request->salida);
        $send->arrival_location = ucfirst($request->llegada);
        $send->price = $this->floatValue($request->precio);

        $send->user_id = Auth::id();

        if ($send->save()) {

            $track = new Tracking;

            $track->body = $request->comentario;
            $track->user_id = Auth::id();
            $track->send_id = $send->id;

            $track->save();

            return back()->with('success', 'Envio registrado exitosamente!');

        } else {
            return back()->with('error', 'Fallo al dar de alta el envío!');
        }

    }

    /*
    *   Function que transforma la informacion del precio
    */
    public function floatValue($str){
        if(preg_match("/([0-9\.,-]+)/", $str, $match)){
            $value = $match[0];
            if( preg_match("/(\.\d{1,2})$/", $value, $dot_delim) ){
                $value = (float)str_replace(',', '', $value);
            }
            else if( preg_match("/(,\d{1,2})$/", $value, $comma_delim) ){
                $value = str_replace('.', '', $value);
                $value = (float)str_replace(',', '.', $value);
            }
            else
                $value = (int)$value;
        }
        else {
            $value = 0;
        }
        return $value;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailSend = Send::find(decrypt($id));

        if(!is_object($detailSend)){abort(404);}

        return view('product.show', compact('detailSend'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $send = Send::find(decrypt($id));
        if(!is_object($send)){abort(404);}
        return view('product.edit', compact('send'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            //'folio' => ['required', 'unique:sends', 'max:255'],
            'product' => ['required'],
            'client' => ['required', 'min:3'],
            'provider' => ['required', 'min:3'],
            'date_send' => ['required'],
            'hour_send' => ['required'],
            'date_arrival' => ['required'],
            'product_output' => ['required', 'min:4'],
            'arrival_product' => ['required', 'min:4'],
            'price' => ['required'],
        ]);

        $sendEdit = Send::find($id);

        if(!is_object($sendEdit)){abort(404);}
        //$sendEdit->folio = $request->folio;
        $sendEdit->product = ucfirst($request->product);
        $sendEdit->client = ucwords($request->client);
        $sendEdit->provider = ucwords($request->provider);
        $sendEdit->date_send = $request->date_send;
        $sendEdit->hour_send = $request->hour_send;
        $sendEdit->date_arrival = $request->date_arrival;
        $sendEdit->departure_location = ucfirst($request->product_output);
        $sendEdit->arrival_location = ucfirst($request->arrival_product);
        $sendEdit->price = $request->price;

        if ($sendEdit->save()) {
            return back()->with('success', 'Datos actualizados exitosamente!');
        } else {
            return back()->with('error', 'Fallo actualizados los datos!');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $send = Send::find(decrypt($id));

        if(!is_object($send)){abort(404);}

       if ( $send->delete()) {
         return redirect()->route('home');
       } else {
        return back()->with('error', 'Fallo al eliminar el envío!');
       }
    }

    public function showTrack($id)
    {
        $tracking = Tracking::where('send_id', decrypt($id))->get();

        if (count($tracking) < 1) { abort(404); }

        $product = DB::table('sends')->select('product', 'departure_location', 'arrival_location')
                                    ->where('id', decrypt($id))->get();

       return view('sends.track', compact('tracking','id', 'product'));
    }

    public function postStatusSend($id)
    {
        $tracking = Tracking::where('send_id', decrypt($id))->get();

        if(count($tracking) < 1){abort(404);}

        $product = DB::table('sends')->select('product', 'departure_location', 'arrival_location')
                                    ->where('id', decrypt($id))->get();

        return view('sends.comment-status-send', compact('tracking','id', 'product'));
    }

    public function searchFolio(Request $request)
    {
        $validatedData = $request->validate([
            'folio' => ['required'],
        ]);


        $sends = Send::where('folio', $request->folio)->get();

        if(count($sends) < 1){
            return redirect()->route('404');
        }


        return view('sends.result-search-folio', compact('sends'));
    }
}
