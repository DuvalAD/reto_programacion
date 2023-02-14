<?php

namespace App\Http\Controllers;

use App\Rules\ValidateIdentificationEC;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller{

    //##### LISTAR REGISTROS
    public function view(Request $request){
        if(Gate::allows('can_employee_view')){
            $search_status_vaccinated = $request->search_status_vaccinated;
            $search_vaccine = $request->search_vaccine;
            $search_date_start = $request->search_date_start;
            $search_date_end = $request->search_date_end;

            $employeed_query = DB::table('employees')
                ->join('users' , 'employees.user_fk' , 'users.id')
                ->leftJoin('vaccines' , 'employees.vaccine_fk' , 'vaccines.id')
                ->select(
                    'employees.*','vaccines.name as vaccine_name'
                )
                ->where('employees.status', 1)
                ->where('users.rol', 'Colaborador')
                ->orderBy('employees.last_name')
            ->orderBy('employees.first_name');

            if(!empty($request->search_status_vaccinated)){
                $employeed_query->where('employees.vaccinated' , ($search_status_vaccinated == "true" ? 1 : 0));
            }
            if(!empty($request->search_vaccine)){
                $employeed_query->where('employees.vaccine_fk' , $search_vaccine);
                $employeed_query->where('employees.vaccinated', 1);
            }
            if(!empty($request->search_date_start) && !empty($request->search_date_end)){
                $employeed_query->whereBetween('employees.vaccinated_date' , [$search_date_start , $search_date_end]);
                $employeed_query->where('employees.vaccinated', 1);
            }

            $employees = $employeed_query->paginate(10);
            $rank = $employees->firstItem();

            //=========== PARAMETERS
            $vaccines = DB::table('vaccines')->orderBy('name')->get();

            return view('employees.view', compact(
                'employees','rank',
                'vaccines',

                'search_status_vaccinated',
                'search_vaccine',
                'search_date_start',
                'search_date_end',
            ));
        }
        return redirect()->route('home');
    }
    //##### CREAR REGISTROS
    public function viewCreate(){
        if(Gate::allows('can_employee_create')){
            return view('employees.create');
        }
        return redirect()->route('home');
    }
    public function createPost(Request $request){
        if(Gate::allows('can_employee_create')){
            $valida = $request->validate([
                'identificacion' => ['required', 'digits:10', 'numeric', 'unique:employees,identification'],
                'nombres' => ['required', 'max:100', 'regex:/^[\pL\s\-]+$/u'],
                'apellidos' => ['required', 'max:100', 'regex:/^[\pL\s\-]+$/u'],
                'correo' => ['required','email','unique:employees,email']
            ]);

            DB::beginTransaction();

            try {
                $user_fk = DB::table('users')->insertGetId([
                    'username' => $request->identificacion,
                    'name' => Str::upper($request->nombres.' '.$request->apellidos),
                    'password' => Hash::make($request->identificacion),
                ]);

                DB::table('employees')->insert([
                    'user_fk' => $user_fk,
                    'identification' => $request->identificacion,
                    'first_name' => Str::upper($request->nombres),
                    'last_name' => Str::upper($request->apellidos),
                    'email' => $request->correo,
                    'created_at' => date('Y-m-d H:i:s')
                ]);


                DB::commit();
                return redirect()->route('employee.view')->with('success', 'Empleado registrado con éxito.');

            } catch (\Throwable $th) {
                DB::rollback();
                throw $th;
            }
        }
        return redirect()->route('home');
    }
    //##### EDITAR
    public function viewEdit($id){
        if(Gate::allows('can_employee_edit')){
            $user = DB::table('employees')->where('id', $id)->first();
            if($user){
                // dd($user);
                return view('employees.edit' , compact('user'));
            }
            return redirect()->route('employee.view');
        }
        return redirect()->route('home');
    }
    public function editPost(Request $request){
        if(Gate::allows('can_employee_edit')){
            $valida = $request->validate([
                'identificacion' => ['required', 'digits:10', 'numeric', 'unique:employees,identification,'.$request->employee_id],
                'nombres' => ['required', 'max:100', 'regex:/^[\pL\s\-]+$/u'],
                'apellidos' => ['required', 'max:100', 'regex:/^[\pL\s\-]+$/u'],
                'correo' => ['required','email','unique:employees,email,'.$request->employee_id]
            ]);

            DB::beginTransaction();

            $user = DB::table('employees')->where('id', $request->employee_id)->first();

            try {
                DB::table('employees')->where('id', $user->id)->update([
                    'identification' => $request->identificacion,
                    'first_name' => Str::upper($request->nombres),
                    'last_name' => Str::upper($request->apellidos),
                    'email' => $request->correo,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

                DB::table('users')->where('id', $user->user_fk)->update([
                    'name' => Str::upper($request->nombres.' '.$request->apellidos),
                ]);

                DB::commit();
                return redirect()->route('employee.view')->with('success', 'Empleado actualizado con éxito.');

            } catch (\Throwable $th) {
                DB::rollback();
                throw $th;
            }
        }
        return redirect()->route('home');
    }

    //##### ELIMINAR
    public function delete($id){
        if(Gate::allows('can_employee_delete')){
            DB::beginTransaction();

            try {
                $employ = DB::table('employees')->where('id', $id)->first();

                DB::table('employees')->where('id', $id)->update([
                    'status' => 66,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

                DB::table('users')->where('id', $employ->user_fk)->update([
                    'status' => 66
                ]);

                DB::commit();
                return redirect()->route('employee.view')->with('success', "Empleado $employ->last_name $employ->first_name eliminado con éxito.");

            } catch (\Throwable $th) {
                DB::rollback();
                throw $th;
            }
        }
        return redirect()->route('home');
    }
}
