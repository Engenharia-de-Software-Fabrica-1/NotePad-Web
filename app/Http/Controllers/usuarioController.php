<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuario;
use Illuminate\Support\Facades\Http;

class usuarioController extends Controller
{
    public function index()
    {
        $url = "https://notepadeng.herokuapp.com/view/usuario/listar.php";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $resultado = json_decode(curl_exec($ch));
        
        return view('usuarios.index', [
            'usuarios' => $resultado
        ]);
    }

    public function edit(Request $request)
    {
$url = "https://notepadeng.herokuapp.com/view/usuario/listar.php";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $resultado = json_decode(curl_exec($ch));
        

    $result = curl_exec($ch);
        return view('usuarios.edit', [
            'users' => $resultado,
            'usu_cod' => $request->id
        ]);
    }
    

    public function save(Request $request)
    {
        $url = 'https://notepadeng.herokuapp.com/view/usuario/alterar.php';
        $data = array(
            'usu_codigo' => $request->id,
            'usu_nome' => $request->usu_nome,
            'usu_cpf' => $request->usu_cpf,
            'usu_email' => $request->email, 
            'usu_telefone' => $request->telefone,
            'usu_senha' => $request->senha
            );
        
        $postdata = json_encode($data);
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $result = curl_exec($ch);
        curl_close($ch);
        print_r ($result);
        $request->session()->flash('success', 'O usuário foi atualizado com sucesso!');
        return redirect()->route('usuarios');
    }

    public function delete(Request $request)
    {
        $url = 'https://notepadeng.herokuapp.com/view/usuario/excluir.php';
        $data = array(
            'usu_codigo' => $request->id
            );
        
        $postdata = json_encode($data);
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $result = curl_exec($ch);
        curl_close($ch);
        print_r ($result);
        $request->session()->flash('success', 'O usuário foi exluído com sucesso!');
        return redirect()->route('usuarios');
    }
}
