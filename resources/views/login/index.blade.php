@extends('layout.site')
@section('titulo','Login')
@section('conteudo')
<divclass="container"><h3class="center">Entrar</h3><divclass="row">
<formclass=""action="{{route('site.login.entrar')}}"method="post">
{{ csrf_field() }}
<divclass="input-field">
<inputtype="text"name="email"><label>E-mail</label>
</div>
<divclass="input-field">
<inputtype="password"name="senha"><label>Senha</label>
</div>
<buttonclass="btn deep-orange">Entrar</button>
</form>
</div></div>
@endsection