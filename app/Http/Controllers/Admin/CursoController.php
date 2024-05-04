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
    public function salvar(Request $req){
        // declarado como post na rota, entao recebe um parametro request
        return "Aqui eu salvo";
        //desenvolveremos depois
    }
    public function editar($id){
        //ele recebe o id da rota
        $linha = Curso::find($id);
        //carrega o registro (faz selec e fetch)
        return view('admin.cursos.editar',compact('linha'));
        //manda o registro encontrado para ser editado na visão
    }
    public function excluir($id){
        //recebe id da rota
        Curso::find($id)->delete();
        //apos selecionar o registro, chama metodo delete do obj registro
        // eh mapeado internamente como um 'delete form' interno q roda no bd
        return redirect()->route('admin.cursos');
        //abre a visao da lista de cursos
    }
}
