<?php

class ContatosController extends Controller
{

    /**
     * Lista os contatos
     */
    public function listar()
    {
        $contatos = Contato::all();
        return $this->view('grade', ['contatos' => $contatos]);
    }

    /**
     * Mostrar formulario para criar um novo contato
     */
    public function criar()
    {
        return $this->view('form');
    }

    /**
     * Mostrar formulário para editar um contato
     */
    public function editar($dados)
    {
        $id      = (int) $dados['id'];
        $contato = Contato::find($id);

        return $this->view('form', ['contato' => $contato]);
    }

    /**
     * Salvar o contato submetido pelo formulário, como padrão de segurança 
     * adicionei criptografia nos campos email e senha
     */
    public function salvar()
    {
        $contato           = new Contato;
        $contato->nome     = $this->request->nome;
        $contato->telefone = $this->request->telefone;
        $contato->email    = password_hash($this->request->email, PASSWORD_DEFAULT) ;
        $contato->senha = password_hash($this->request->senha, PASSWORD_DEFAULT);
        if ($contato->save()) {
            return $this->listar();
        } else {
            echo $contato->getMessage();
        }
    }

    /**
     * Atualizar o contato conforme dados submetidos
     */
    public function atualizar($dados)
    {
        $id                = (int) $dados['id'];
        $contato           = Contato::find($id);
        $contato->nome     = $this->request->nome;
        $contato->telefone = $this->request->telefone;
        $contato->email    = $this->request->email;
        $contato->senha    = $this->request->senha;
        $contato->save();
        return $this->listar();
    }
    /**
     * Apagar um contato conforme o id informado
     */
    public function excluir($dados)
    {
        $id      = (int) $dados['id'];
        $contato = Contato::destroy($id);
        return $this->listar();
    }
}