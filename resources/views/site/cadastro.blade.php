<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="{{ asset('site_assets\css\site.css')}}" rel="stylesheet"><!-- Global portal stying -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script src="{{ asset('sweetalert2\dist\sweetalert2.min.js')}}"></script>

    <link rel="stylesheet" href="{{ asset('sweetalert2\dist\sweetalert2.min.css')}}">
    <title>NOTEPAD TOP</title>
  </head>
  <body>
  
    <header class="cabecalho">
      <div>
        <h1 class="title-header">
          NOTEPAD TOP
        </h1>
      </div>
    </header>
  <main class="cad-main">
    <div class="cad-container">
    <div style="    text-align: center;
    margin-bottom: 5%;
    border-radius: 50%;
    width: 100px;
    height: 100px;
    padding: 6%;
    background-color: #de6e6e;
    margin: 0 38% 6% 38%;">
        <span><svg xmlns="http://www.w3.org/2000/svg" style="    color: white;" width="50" height="50" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
  <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"></path>
  <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"></path>
  <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"></path>
    </svg></span>
</div>
@include('flashs')

        <h1 class="text-center pad-bottom-sm">Preencha todos os campos para concluir seu cadastro</h1>
        
        <form method="post" action="{{ route('site_create')}}" enctype="multipart/form-data">
        @csrf

            <div class="form-group cad-form">              
              <div class="row">
                <div class="col-2 cad-label">
                  <label for="nome">Nome</label>
                </div>
                <div class="col-10 cad-input">
                  <input type="text" id="usu_nome" name="usu_nome" class="form-control form-input" maxlength="50">
                </div>
              </div>
            </div>

            <div class="form-group cad-form">              
              <div class="row">
                <div class="col-2 cad-label">
                  <label for="nome">Cpf</label>
                </div>
                <div class="col-10 cad-input">
                  <input type="text" id="usu_cpf" name="usu_cpf" class="form-control form-input cpf">
                </div>
              </div>
            </div>

            <div class="form-group cad-form">              
              <div class="row">
                <div class="col-2 cad-label">
                <label for="email">Email</label>
                </div>
                <div class="col-10 cad-input">
                <input type="email" id="email" name="email" class="form-control form-input" maxlength="50">
                </div>
              </div>
            </div>

            <div class="form-group cad-form">              
              <div class="row">
                <div class="col-2 cad-label">
                  <label for="nome">Telefone</label>
                </div>
                <div class="col-10 cad-input">
                  <input type="text" id="telefone" name="telefone" class="form-control form-input telefone">
                </div>
              </div>
            </div>

            <div class="form-group cad-form">              
              <div class="row">
                <div class="col-2 cad-label">
                  <label for="senha">Senha</label>
                </div>
                <div class="col-10 cad-input">
                  <input type="password" class="form-control form-input" id="senha" name="senha" maxlength="30">
                </div>
              </div>
            </div>
            
            <div class="form-group txt-center">
              <input class="form-check-input" type="checkbox" value="" id="aceitatermos">
              <label class="form-check-label" for="flexCheckDefault">
                Aceito os Termos e Condições
              </label>
            </div>

            <div class="cad-form txt-center">
              <div class="row">
                <button type="submit" class="btn btn-primary btn-lg btn-sub" onclick="return validarForm()">Cadastrar</button>
              </div>
            </div>
        </form>
    </div>
</main>
<script>
        var nome = document.getElementById("usu_nome");
        var cpf = document.getElementById("usu_cpf");
        var email = document.getElementById("email");
        var telefone = document.getElementById("telefone");
        var senha = document.getElementById("senha");
        var aceitatermos = document.getElementById("aceitatermos");

        function validarForm() {
            if(nome.value != "" && email.value != "" && senha.value != "" && telefone.value != "" && cpf.value != "" && aceitatermos.checked==true){
                    nome.setCustomValidity("");
                    email.setCustomValidity("");
                    senha.setCustomValidity("");
                    cpf.setCustomValidity("");
                    telefone.setCustomValidity("");
                    aceitatermos.setCustomValidity("");
                    return true;
            }
            else{
                if (nome.value == ""){
                    nome.setCustomValidity("Informe seu nome completo!");
                    nome.reportValidity();
                    return false;
                }
                else{
                  if (cpf.value == ""){
                                cpf.setCustomValidity("Confirme seu cpf!");
                                cpf.reportValidity();
                                return false;
                            }
                    
                    else{
                      if (email.value == ""){
                        email.setCustomValidity("Informe seu email!");
                        email.reportValidity();
                        return false;
                        }
                        
                        else{
                          if (telefone.value == ""){
                                telefone.setCustomValidity("Informe seu telefone!");
                                telefone.reportValidity();
                                return false;
                              }
                          
                            else{
                              if (senha.value == ""){
                            senha.setCustomValidity("Informe uma senha!");
                            senha.reportValidity();
                            return false;
                            }
                            else{
                              if(aceitatermos.checked==false){
                                aceitatermos.setCustomValidity("É necessário confirmar!");
                                aceitatermos.reportValidity();
                              return false;
                              }
                              else{
                                nome.setCustomValidity("");
                    email.setCustomValidity("");
                    senha.setCustomValidity("");
                    cpf.setCustomValidity("");
                    telefone.setCustomValidity("");
                    aceitatermos.setCustomValidity("");
                    return true;
                              }
                            }
                            }
                        }
                    }
                }
            }
        }
    </script>

  <script>
    $(document).ready(function(){
    $('.cpf').mask('000.000.000-00');
    $('.telefone').mask('(00) 00000-0000');
});
    </script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>