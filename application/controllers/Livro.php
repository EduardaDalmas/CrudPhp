<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Livro extends CI_Controller {

	public function index()
	{
		
	}

	public function lista_livro()
	{
		$this->load->view('menu');
		//carregar modelo aqui
		$this->load->model('livro_model');
		$resultado = $this->livro_model->getLivros();
		$dado = array('livros'=>$resultado);
		$this->load->view('livro/lista_livro', $dado);
	}

	public function listaLivro()
	{	
		$this->load->model('livro_model');
		$resultado['livros'] = $this->livro_model->get();
		$this->load->view('menu');
		$this->load->view('livro/listaLivro', $resultado);
	}

	public function novoLivro()
	{
		$this->load->view('menu');
		$this->load->view('livro/novoLivro');
	}

	public function gravar()
	{
		$this->load->library('form_validation');


		$this->load->model('livro_model');

		$regras = array(
			array('field' => 'nome', 'label' => 'nome', 'rules' => 'required'),
			array('field' => 'autor', 'label' => 'autor', 'rules' => 'required'),
			array('field' => 'editora', 'label' => 'editora', 'rules' => 'required'),
			array('field' => 'lancamento', 'label' => 'lancamento', 'rules' => 'required'),
			array('field' => 'genero', 'label' => 'genero', 'rules' => 'required'),
			array('field' => 'origem', 'label' => 'origem', 'rules' => 'required'),
			array('field' => 'distrubuidora', 'label' => 'distrubuidora', 'rules' => 'required'),
			array('field' => 'linguagem', 'label' => 'linguagem', 'rules' => 'required'),
			array('field' => 'traducao', 'label' => 'traducao', 'rules' => 'required'),
			array('field' => 'tradutor', 'label' => 'tradutor', 'rules' => 'required'),
			array('field' => 'titulo_origem', 'label' => 'titulo_origem', 'rules' => 'required'),
			array('field' => 'designer_conteudo', 'label' => 'designer_conteudo', 'rules' => 'required')
		);

		$this->form_validation->set_rules($regras);

		 if ($this->form_validation->run() == false) {
			 echo "erro de validação";
			 $this->load->view('menu');
			 $this->load->view('livro/novoLivro');
		 }
		 else {

		$dados = array(
			"nome" => $this->input->post('nome'),
			"autor" => $this->input->post('autor'),
			"editora" => $this->input->post('editora'),
			"lancamento" => $this->input->post('lancamento'),
			"genero" => $this->input->post('genero'),
			"origem" => $this->input->post('origem'),
			"distrubuidora" => $this->input->post('distrubuidora'),
			"linguagem" => $this->input->post('linguagem'),
			"traducao" => $this->input->post('traducao'),
			"tradutor" => $this->input->post('tradutor'),
			"titulo_origem" => $this->input->post('titulo_origem'),
			"designer_conteudo" => $this->input->post('designer_conteudo'),
		);

		//echo var_dump($dados);
		$this->load->view('menu');
		if ($this->livro_model->gravar($dados)) {
			$msg['mensagem'] = "Dados gravados com sucesso!";
			$this->load->view('usuario/success', $msg);
		} else {
			echo "Erro ao gravar dados!";
		}
	}
		
	}

	public function editar($id = null)
	{
		if ($id) {
			$this->load->model('livro_model');
			$dados = $this->livro_model->get($id);
			if ($dados->num_rows() > 0 ) {
				$valores['id'] = $dados->row()->id;
				$valores['nome'] = $dados->row()->nome;
				$valores['editora'] = $dados->row()->editora;
				$valores['lancamento'] = $dados->row()->lancamento;
				$valores['genero'] = $dados->row()->genero;
				$valores['origem'] = $dados->row()->origem;
				$valores['distrubuidora'] = $dados->row()->distrubuidora;
				$valores['linguagem'] = $dados->row()->linguagem;
				$valores['traducao'] = $dados->row()->traducao;
				$valores['tradutor'] = $dados->row()->tradutor;
				$valores['titulo_origem'] = $dados->row()->titulo_origem;
				$valores['designer_conteudo'] = $dados->row()->designer_conteudo;
			}
			$this->load->view('menu');
			$this->load->view('livro/novoLivro', $valores);
		} 
		else {
			echo "livro não localizado";
		}
	}

	public function excluir($id = null)
	{
		if ($id) {
			$this->load->model('livro_model');
			if ($dados = $this->livro_model->excluir($id))
			{
				$this->load->view('menu');
				echo "Excluido com sucesso";
			}
			else {
				echo "Erro ao excluir";
			}

		}
	}
}
