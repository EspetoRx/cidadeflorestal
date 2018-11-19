@extends('app.app')

@section('conteudo')

    <div class="coisa5">&nbsp;</div>
    <div class="row">
        <div class="col-md-12">&nbsp;</div>
        <div class="offset-md-4 col-md-4">
            @include('inc.errors')
        </div>
        <div class="offset-md-4 col-md-4" style="padding-bottom: 30px;" align="center">
            <div class="parceiro login-box" align="center">
                <p class="login-title">Área do login</p>
                <div id="erro" class="col-md-12">
                    &nbsp;
                </div>
                <form method="post" action="/login">
                    {{ csrf_field() }}
                <input type="email" name="email" id="email" class="form-control input-login" placeholder="E-mail"/>
                <input type="password" name="senha" id="senha" class="form-control input-login" placeholder="Senha"/>
                <button type="submit" class="btn botao-nav">Fazer login</button><br><br>
                </form>
                <div class="col-md-11">
                    <a href="#" class="float-left link-noti">Esqueci minha senha</a>&nbsp;
                    <a href="#" class="float-right link-noti">Participar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">&nbsp;</div>
    </div>

@endsection