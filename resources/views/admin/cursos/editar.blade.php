@extends('layout.site')
@section('titulo','Cursos')
@section('conteudo')
<!--recebe o vetor linha com os dados do registro para que seja editado-->
<!--linha eh um vetor preenchido-->

<div class="container">
    <h3 class="center">Editando Curso</h3>
    <div class="row">
        <!--$linha envia do id para o metodo atualizar-->
        <form class="" action="{{route('admin.cursos.atualizar', $linha->id)}}"
        method="post" enctype="multipart/form-data"> <!--obrigatorio usar pq envia imagens-->
    {{ csrf_field() }} <!--inclui template do _form // token-->
    <input type="hidden" name="_method" value="put"> <!--crie essa linha sempre que o met do controller for do tipo put-->
    @include('admin.cursos._form')<!-- _form possui todos os input types-->
    <button class="btn deep-orange">Atualizar</button>   
    </form>   
    </div>
</div>
@endsection