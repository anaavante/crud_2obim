<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//arquivo que define o modelo
use App\Models\Curso;

class CursoController extends Controller
{
    // select * sem usar sql; metodo invocado diretamente na classe
    // recorda um conj de registros (record et) que sera atribuido a rows
    // linhas e colunas
    // mando rows para dentro da view que fica em admin
    // quem imprimirá será a view que iremos criar; o controller só tem logica
    public function index(){
        $rows = Curso::all();
        return view('admin.cursos.index', compact('rows'));
    }
    
    public function adicionar(){
        return view('admin.cursos.adicionar');
    }
    public function salvar(Request $req)
    {
        // declarado como post na rota, entao recebe um parametro request
        $dados = $req->all();
        if(isset($dados['publicado']))
        {
            $dados['publicado'] = 'sim';
        }else{
            $dados['publicado'] = 'nao';
        }
        if($req->hasFile('arquivo'))
        {
            $imagem = $req->file('arquivo');
            $num = rand(1111,9999);
            $dir = "img/cursos/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_".$num.".".$ex;
            $imagem->move($dir,$nomeImagem);
            $dados['imagem'] = $dir."/".$nomeImagem;
        }
    Curso::create($dados);
    return redirect()->route('admin.cursos');
    }
    public function editar($id){
        //ele recebe o id da rota
        $linha = Curso::find($id); //select from curso where id=$id
        //1- encontra dados do php; 2-c#; 3 -java...
        //carrega o registro (faz selec e fetch)
        return view('admin.cursos.editar',compact('linha')); //se nao colocar compact, nao vai ter valores para editar
        //manda o registro encontrado para ser editado na visão
    }
    public function excluir($id){
        // COMENTÁRIOS PARA ESTUDAR PARA A PROVA
        //recebe id da rota
        Curso::find($id)->delete(); //para excluir, preciso encontrar o registro
        //procura o registro e, ao encontrar, chama o método delete
        //apos selecionar o registro, chama metodo delete do obj registro
        // eh mapeado internamente como um 'delete form' interno q roda no bd
        return redirect()->route('admin.cursos'); //PRECISO RECARREGAR A LISTA ATUALIZADA DE REGISTROS
        //abre a visao da lista de cursos
    }
    public function atualizar(Request $req, $id)
    {
        $dados = $req->all();
        if(isset($dados['publicado'])){
            $dados['publicado'] = 'sim';
        }
        else
        {
            $dados['publicado'] = 'nao';
        }
        if($req->hasFile('arquivo'))
        {
            $imagem = $req->file('arquivo');
            $num = rand(1111,9999);
            $dir = "img/cursos/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_".$num.".".$ex;
            $imagem->move($dir,$nomeImagem);
            $dados['imagem'] = $dir."/".$nomeImagem;
        }
        Curso::find($id)->update($dados);
        return redirect()->route('admin.cursos');
}
}


