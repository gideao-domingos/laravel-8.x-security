<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Log::info('Página - Visualizar-Funções: '.Auth::user()->email);
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('roles.index',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Log::info('Página - Criar-Função: '.Auth::user()->email);
        $permission = Permission::get();
        return view('roles.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'label' => 'required|unique:roles,label',
            'permission' => 'required',
        ]);
        //dd($request->input('permission'));
        $role = Role::create([
            'name' => $request->input('name'),
            'label'=> $request->input('label')
        ]);

        $role->permissions()->attach($request->input('permission'));

        Log::info('Página - Criar-Função: '
            .'Nome: '.$request->input('name').'\n'
            .'Utilizador: '.Auth::user()->email
        );

        return redirect()
            ->route('roles.index')
            ->with('success','Função criada com sucesso');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        Log::info('Página - Visulizar-Função: '
            .'Nome: '. $role->nome
            .'Utilizador: '.Auth::user()->email
        );
        $rolePermissions = DB::table('permission_role')
            ->join('roles', 'roles.id', 'permission_role.role_id')
            ->join('permissions', 'permissions.id', 'permission_role.permission_id')
            ->where("roles.id",$id)
            ->get();
        return view('roles.show',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        Log::info('Página - Editar-Função: '
            .'Nome: '. $role->nome
            .'Utilizador: '.Auth::user()->email
        );
        $permission = Permission::get();
        $rolePermissions = DB::table('permission_role')
            ->join('roles', 'roles.id', 'permission_role.role_id')
            ->join('permissions', 'permissions.id', 'permission_role.permission_id')
            ->pluck('permission_role.permission_id','permission_role.permission_id')
            ->where("roles.id",$id)
            ->all();
            //->get();

        /*$rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        */
        return view('roles.edit',compact('role','permission','rolePermissions'));
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
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
            'label' => 'required'
        ]);
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->label= $request->input('label');
        $role->save();
        $role->permissions()->sync($request->input('permission'));
        Log::info('Actualizar - Função:'
            .'Nome: '. $role->nome
            .'Utilizador: '.Auth::user()->email
        );
        return redirect()->route('roles.index')
            ->with('success','Função actualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        Log::info('Eliminar - Função: '
            .'Nome: '. $role->nome
            .'Utilizador: '.Auth::user()->email
        );
        $role->delete();
        return redirect()
            ->route('roles.index')
            ->with('success','Função eliminada com sucesso');
    }
}
