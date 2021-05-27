<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comment as Comment;
use App\send as Send;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'comment' => ['required', 'min:15'],
        ]);

        $newComment = new Comment();

        $newComment->comment = $request->comment;
        $newComment->user_id = 1;
        $newComment->send_id = decrypt($request->send_id);

        if($newComment->save()) {
            return back()->with('success', 'Comentario guardado exitosamente, gracias!');;
        } else {
            return back()->with('error', 'Fallo al registrar su comentario. Recarga la pagina he intenta de nuevo!');;
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
        $comments = Comment::all()->where('send_id', decrypt($id));

        return view('product.show-comments', compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('product.edit');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showSendsCompleted()
    {
        $sends = Send::where('completed', true)->paginate(35);
        //$sends = Send::all()->orderBy('id', 'DESC');
        return view('all-completed', compact('sends'));
    }

    public function showSendsNoCompleted()
    {
        $sends = Send::where('completed', false)->paginate(35);
        //$sends = Send::all()->orderBy('id', 'DESC');
        return view('all-not-completed', compact('sends'));
    }


    public function completedSend($id)
    {
        $send = Send::find(decrypt($id));

        $send->completed = true;

       if( $send->save()) {
           return back()->with('success', 'Envio completada');
       }
    }
}
