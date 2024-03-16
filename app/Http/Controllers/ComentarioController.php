<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request, User $user, Post $post) // El $user no se usa pero no afecta colocarlo
    {
        //Validacion
        $this->validate($request, [
            'comentario' => 'required|max:255'
        ]);

        //Almacenar el resultado
        Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comentario' => $request->comentario 
        ]);

        //Importar un mensaje
        return back()->with('mensaje', 'Comentario realizado correctamente');
    }
}
