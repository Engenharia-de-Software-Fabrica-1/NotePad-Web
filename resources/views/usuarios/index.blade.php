@extends('layout')

@section('title')
    Usuários
@endsection

@section('content')

    @include('flashs')
    <style>
        .dropdown-menu.show{
            position: relative !important;
            margin: 0 !important;
            float: right;
        }
    </style>
    <div class="card">
        <div class="card-body collapse show">
            <a href="{{ route('site_create') }}">
                <button type="button" class="btn waves-effect waves-light btn-info">Novo usuário</button>
            </a>
            {{--<button type="button" class="btn waves-effect waves-light btn-warning">Warning</button>--}}
            {{--<button type="button" class="btn waves-effect waves-light btn-danger">Danger</button>--}}
        </div>
    </div>

    <table class="tablesaw table-striped table-hover table-bordered table tablesaw-columntoggle" data-tablesaw-mode="columntoggle" id="tablesaw-509">
        <thead>
        <tr>
            <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">ID</th>
            <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Nome</th>
            <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-sortable-default-col="" data-tablesaw-priority="3" class="tablesaw-priority-3">E-mail</th>

            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($usuarios as $user) {?>
            <tr>
                <td class="title"><?php echo $user->usu_codigo ?></td>
                <td class="tablesaw-priority-3"><?php echo $user->usu_nome ?></td>
                <td class="tablesaw-priority-2"><?php echo $user->usu_email ?></td>
                <td>                                                   
                    <a style="float: left; padding-right: 5px;" href="{{ route('usuarios_edit', $user->usu_codigo) }} ">
                        <button type="button" class="btn waves-effect waves-light btn-warning">Editar</button>
                    </a>
                    <!--
                    <a style="float: left; padding-right: 5px;" href="{{ route('usuarios_editPass', <?php echo $user->usu_codigo ?>) }}">
                        <button type="button" class="btn waves-effect waves-light btn-success">Alterar Senha</button>
                    </a>-->
                    {{--
                    <a style="float: left; padding-right: 5px;" href="{{ route('usuarios_delete',echo $user->usu_codigo) }}">
                        <button type="button" class="btn waves-effect waves-light btn-warning">Excluir</button>
                    </a>
                    --}}
                    {{--
                    <a href="javascript:void(0)" style="float: right; padding-right: 5px;" id="UserDelete" role="button" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        <button type="button" class="btn waves-effect waves-light btn-warning">Excluir</button>
                    </a>

                    <div class="dropdown-menu animated flipInY" style="position: relative !important; padding: 0 !important; float: right;" aria-labelledby="UserDelete">
                        <a style="float: left; padding-right: 5px;" href="{{ route('usuarios_delete', $user->usu_codigo) }}">
                            <button type="button" class="btn waves-effect waves-light btn-warning">Confirmar</button>
                        </a>
                    </div>--}}

                    <form style="float: right;" method="post" action="{{ route('usuarios_delete', $user->usu_codigo) }}">
                        @csrf
                        <button onclick="send_form()" type="submit" class="btn waves-effect waves-light btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
@endsection

@section('customjs')
    <script>
        function send_form() {
            event.preventDefault();
            var form = event.target.form;

            Swal.fire({
                title: "Tem certeza?",
                text: "Deseja mesmo excluir este usuário?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Sim, excluir",
                cancelButtonText: "CANCELAR",
            }).then(function (result) {
                if (result.value) {
                    form.submit();
                }
            });
        }
    </script>
@endsection