<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;


class SiteController extends Controller
{
    public function index(Request $request)
    {
    
$url = "https://notepadeng.herokuapp.com/view/usuario/listar.php";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$resultado = json_decode(curl_exec($ch));

return view('site.index', [
    'banners' => $resultado
]);
    }

    public function cadastrar(Request $request)
    {
        return view('site.cadastro');
    }

    public function create(Request $request)
    {

$url = 'https://notepadeng.herokuapp.com/view/usuario/inserir.php';
$data = array(
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


        $request->session()->flash('success', 'O usuário foi criado com sucesso!');
        return redirect()->route('site_cadastrar');
    }
}
