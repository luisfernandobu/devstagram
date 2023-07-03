<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        // validar que el perfil que se quiere editar pertenezca a usuario autenticado
        if ($user->id !== auth()->user()->id) {
            abort(401);
        }
        
        return view('profile.index');
    }

    public function store(Request $request)
    {
        // validar request
        $this->validate($request, [
            'username' => [
                'required',
                'unique:users,username,' . auth()->user()->id,
                'min:5',
                'max:25',
                'alpha_dash'
            ],
            'profileImage' => 'image'
        ]);
        
        // validar si se cargo imaen
        if ($request->profileImage) {
            // obtener imagen cargada
            $imagen = $request->file('profileImage');
            // generar nombre unico para cada imagen
            $nombreImagen = Str::uuid() . "." . $imagen->extension();
            // crear instancia de intervention image
            $imagenServidor = Image::make($imagen);
            // aplicar cambios a imagen
            $imagenServidor->fit(1000, 1000);
            // definir ruta destino
            $imagenPath = public_path('profiles' . '/' . $nombreImagen);
            // guardar imagen final
            $imagenServidor->save($imagenPath);
        }

        // guardar cambios
        $user = User::find(auth()->user()->id);
        $user->username = $request->username;
        $user->profileImage = $nombreImagen ?? auth()->user()->profileImage ?? null;
        $user->save();

        return redirect()->route('posts.index', $user->username);
    }
}
