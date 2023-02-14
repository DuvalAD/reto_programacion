<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //################# PERFIL
    public function view(){
        $user = DB::table('employees')->where('user_fk', Auth::user()->id)->first();
        $vaccines = DB::table('vaccines')->orderBy('name')->get();
        return view('profile.view', compact('user','vaccines'));
    }
    public function editProfile(Request $request){
        $valida = $request->validate([
            'fecha_nacimiento' => ['required'],
            'telefono' => ['required','regex:/(09)[0-9]{8}/'],
            'direccion' => ['required','max:200'],
            'estado_vacunado' => ['required'],
                'tipo_vacuna' => ['required_if:estado_vacunado,1'],
                'fecha_vacunacion' => ['required_if:estado_vacunado,1'],
                'dosis' => ['required_if:estado_vacunado,1'],
        ]);

        DB::beginTransaction();

        try {
            DB::table('employees')->where('id', $request->employee_id)->update([
                'birth_date' => $request->fecha_nacimiento,
                'direction' => Str::upper($request->direccion),
                'phone_number' => $request->telefono,
                'vaccinated' => ($request->estado_vacunado == "1" ? 1 : 0),
                'vaccine_fk' =>($request->estado_vacunado == "1" ? $request->tipo_vacuna : null),
                'vaccinated_date' => ($request->estado_vacunado == "1" ? $request->fecha_vacunacion : null),
                'number_dose' => ($request->estado_vacunado == "1" ? $request->dosis : null),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            DB::commit();
            return redirect()->route('user.perfil.view')->with('success', 'Datos actualizados con éxito.');

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    //################# CONTRASENA
    public function viewPassword(){
        return view('profile.password');
    }
    public function editPassword(Request $request){
        $datos = $request->all();
        $password_old = $datos['antigua_contrasenia'];
        $password_new = $datos['nueva_contrasenia'];

        $user = Auth::user();

        if($user){
            if(Hash::check($password_old, $user->password)){

                DB::beginTransaction();

                try {
                    DB::table('users')->where('id' , $user->id)->update([
                        'password' => Hash::make($password_new),
                    ]);

                    DB::commit();
                    Auth::logout();
                    return redirect()->route('login')->with('success' , 'Contraseña modificada con éxito.');

                } catch (\Throwable $th) {
                    DB::rollBack();
                    return redirect()->back()->with('error' , 'Algo salió mal, vuelva a intentarlo.');
                    throw $th;
                }
            }else{
                return redirect()->back()->with('error' , 'La contraseña antigua ingresada no es correcta.');
            }
        }else{
            return redirect()->back()->with('error' , 'Usuario no encontrado.');
        }
    }
}
