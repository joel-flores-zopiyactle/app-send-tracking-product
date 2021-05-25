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
            'product' => ['required'],
            'client' => ['required', 'min:3'],
            'provider' => ['required', 'min:3'],
            'date_send' => ['required'],
            'hour_send' => ['required'],
            'date_arrival' => ['required'],
            'product_output' => ['required', 'min:4'],
            'arrival_product' => ['required', 'min:4'],
            'price' => ['required'],
            'comment' => ['required', 'min:15'],
        ]);

        $send = new Send();

        $send->folio = $request->folio;
        $send->product = $request->product;
        $send->client = $request->client;
        $send->provider = $request->provider;
        $send->date_send = $request->date_send;
        $send->hour_send = $request->hour_send;
        $send->date_arrival = $request->date_arrival;
        $send->product_output = $request->product_output;
        $send->arrival_product = $request->arrival_product;
        $send->price = $request->price;

        $send->user_id = Auth::id();

        if ($send->save()) {

            $track = new Tracking;

            $track->comment = $request->comment;
            $track->user_id = Auth::id();
            $track->send_id = $send->id;

            $track->save();

            return back()->with('success', 'Envio registrado exitosamente!');

        } else {
            return back()->with('error', 'Fallo al dar de alta el envío!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailSend = Send::find($id);
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
        $send = Send::find($id);
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

        //$sendEdit->folio = $request->folio;
        $sendEdit->product = $request->product;
        $sendEdit->client = $request->client;
        $sendEdit->provider = $request->provider;
        $sendEdit->date_send = $request->date_send;
        $sendEdit->hour_send = $request->hour_send;
        $sendEdit->date_arrival = $request->date_arrival;
        $sendEdit->product_output = $request->product_output;
        $sendEdit->arrival_product = $request->arrival_product;
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
        $flight = Send::find($id);

       if ( $flight->delete()) {
         return redirect()->route('home');
       } else {
        return back()->with('error', 'Fallo al eliminar el envío!');;
       }
    }

    public function showTrack($id)
    {
        $tracking = Tracking::where('send_id', $id)->get();
        $product = DB::table('sends')->select('product', 'product_output', 'arrival_product')
                                    ->where('id', $id)->get();

       return view('sends.track', compact('tracking','id', 'product'));
    }

    public function postStatusSend($id)
    {
        $tracking = Tracking::where('send_id', $id)->get();
        $product = DB::table('sends')->select('product', 'product_output', 'arrival_product')
                                    ->where('id', $id)->get();

        return view('sends.comment-status-send', compact('tracking','id', 'product'));
    }

    public function searchFolio(Request $request)
    {

        $sends = Send::where('folio', $request->folio)->get();
        return view('sends.result-search-folio', compact('sends'));
    }
}
