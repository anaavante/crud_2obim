@extends('layout.site')
@section('titulo','Adicionar Cursos')
@section('conteudo')
<!---->
<!--NÃO TENHO NADA NO VETOR LINHA QUANDO CHAMO O ADICIONAR.BLADE-->
<!--linha eh um vetor vazio-->


<div class="container">
    <h3 class="center">Adicionar Curso</h3>
    <div class="row">
        <form class="" action="{{route('admin.cursos.salvar')}}"
        method="post" enctype="multipart/form-data"> <!--obrigatorio usar pq envia imagens-->
    {{ csrf_field() }} <!--inclui template do _form // token-->
    @include('admin.cursos._form')
    <button class="btn deep-orange">Salvar</button>   
    </form>   
    </div>
</div>
@endsection