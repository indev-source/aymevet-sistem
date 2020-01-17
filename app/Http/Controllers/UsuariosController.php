<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\User;
use App\Bussine;

use App\models\UserRepository;
use App\models\BusinessRepository;
class UsuariosController extends Controller{

    public function __construct(UserRepository $user){
        $this->user = $user;
        $this->activos = 'activo';
        $this->middleware('auth');
    }

    public function getUserByid($userId){
        return $this->user->findorFail($userId);
    }
    public function encrypter($password){
        return bcrypt($password);
    }
    public function index(){
        $users = $this->user->users($this->activos)->sellers()->get();
        return view('users.index',['users'=>$users]);
    }
    public function profile(Request $request){
        return view('users.profile',['user'=>$this->getUserbyId($request->empleado),'bussines'=>BusinessRepository::all()]);
    }
    public function create(){
        return view('users.create',['bussines'=>BusinessRepository::all()]);
    }
    public function store(UserStoreRequest $request){
        try{
            $request->password = $this->encrypter($request->password);
            $this->user->createUser($request->all());
            return redirect('administracion/usuarios')->with('status_success','El usuario ha sido agregado correctamente');
        }catch(\Exception $e){
            return back()->with('status_warning',"Un error ha ocurrido en el servidor: ".$e->getMessage());
        }
    }
    public function edit($userId){
        return view('users.edit',['user'=>$this->getUserbyId($userId)]);
    }
    public function update(Request $request, $userId){
        try{
            $request->password = $this->encrypter($request->password);
            $this->getUserById($userId)->editUser($request->all());
            return redirect('administrador/usuarios')->with('status_success','Usuario actualizado correctamente');
        }catch(\Exception $e){
            dd($e);
        }
    }
    public function password(Request $request,$userId){
        $request->password = $this->encrypter($request->password);
        //dd($request->password);
        $this->getUserByid($userId)->editUser($request->all());
        return back()->with('status_success','la contraseña fue actualizada correctamente');
    }
    public function destroy($id)
    {
        //
    }
   
}
