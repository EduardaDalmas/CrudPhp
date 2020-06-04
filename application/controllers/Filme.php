<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filme extends CI_Controller {

	public function index()
	{
		
	}

	public function lista_filme()
	{
		$this->load->view('menu');
		//carregar modelo aqui
		$this->load->model('filme_model');
		$resultado = $this->filme_model->getFilmes();
		$dado = array('filmes'=>$resultado);
		$this->load->view('filme/lista_filme', $dado);
	}

	public function listaFilme()
	{	
		$this->load->model('filme_model');
		$resultado['filmes'] = $this->filme_model->get();
		$this->load->view('menu');
		$this->load->view('filme/listaFilme', $resultado);
	}
	
	public function novoFilme()
	{
		$this->load->view('menu');
		$this->load->view('filme/novoFilme');
	}

	public function gravar()
	{
		$this->load->library('form_validation');

		$this->load->model('filme_model');

		$regras = array(
			array('field' => 'titulo', 'label' => 'titulo', 'rules' => 'required'),
			array('field' => 'genero', 'label' => 'genero', 'rules' => 'required'),
			array('field' => 'produtor', 'label' => 'produtor', 'rules' => 'required'),
			array('field' => 'gravadora', 'label' => 'gravadora', 'rules' => 'required'),
			array('field' => 'classificacao', 'label' => 'classificacao', 'rules' => 'required'),
			array('field' => 'diretor', 'label' => 'diretor', 'rules' => 'required'),
			array('field' => 'diretor_musical', 'label' => 'diretor_musical', 'rules' => 'required'),
			array('field' => 'roteirista', 'label' => 'roteirista', 'rules' => 'required'),
			array('field' => 'cinegrafista', 'label' => 'cinegrafista', 'rules' => 'required'),
			array('field' => 'origem', 'label' => 'origem', 'rules' => 'required'),
			array('field' => 'lancamento', 'label' => 'lancamento', 'rules' => 'required|exact_length[4]'),
			array('field' => 'tempo', 'label' => 'tempo', 'rules' => 'required')
		);

		$this->form_validation->set_rules($regras);

		 if ($this->form_validation->run() == false) {
			 echo "erro de validação";
			 $this->load->view('menu');
			 $this->load->view('filme/novoFilme');
		 }
		 else {

		$dados = array(
			"titulo" => $this->input->post('titulo'),
			"genero" => $this->input->post('genero'),
			"produtor" => $this->input->post('produtor'),
			"gravadora" => $this->input->post('gravadora'),
			"classificacao" => $this->input->post('classificacao'),
			"diretor" => $this->input->post('diretor'),
			"diretor_musical" => $this->input->post('diretor_musical'),
			"roteirista" => $this->input->post('roteirista'),
			"cinegrafista" => $this->input->post('cinegrafista'),
			"origem" => $this->input->post('origem'),
			"lancamento" => $this->input->post('lancamento'),
			"tempo" => $this->input->post('tempo'),
		);

		//echo var_dump($dados);
		$this->load->view('menu');
		if ($this->filme_model->gravar($dados)) {
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
			$this->load->model('filme_model');
			$dados = $this->filme_model->get($id);
			if ($dados->num_rows() > 0 ) {
				$valores['id'] = $dados->row()->id;
				$valores['titulo'] = $dados->row()->titulo;
				$valores['genero'] = $dados->row()->genero;
				$valores['produtor'] = $dados->row()->produtor;
				$valores['gravadora'] = $dados->row()->gravadora;
				$valores['classificacao'] = $dados->row()->classificacao;
				$valores['diretor'] = $dados->row()->diretor;
				$valores['diretor_musical'] = $dados->row()->diretor_musical;
				$valores['roteirista'] = $dados->row()->roteirista;
				$valores['cinegrafista'] = $dados->row()->cinegrafista;
				$valores['origem'] = $dados->row()->origem;
				$valores['lancamento'] = $dados->row()->lancamento;
				$valores['tempo'] = $dados->row()->tempo;
			}
			$this->load->view('menu');
			$this->load->view('filme/novoFilme', $valores);
		} 
		else {
			echo "Filme não localizado";
		}
	}

	public function excluir($id = null)
		{
			if ($id) {
				$this->load->model('filme_model');
				if ($dados = $this->filme_model->excluir($id))
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
