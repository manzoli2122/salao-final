<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function alterarSenha()
    {
        $user = Auth::user();
        return view('auth.passwords.alterarSenha', compact('user'));
    }


    public function updateSenha(Request $request)
    {
        $user = Auth::user();
        $dataUser = $request->all();           
        $dataUser['password'] = bcrypt($dataUser['password']);
        $update = $user->update($dataUser);     
        
        if($update){
            return redirect()->route('home')->with(['success' => 'Perfil atualizado com sucesso']);
        }        
        else {
            return redirect()->route('home')->withErrors(['errors' =>'Erro no Editar'])->withInput();
        }
    }


}
