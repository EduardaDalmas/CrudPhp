<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function index()
	{
		
	}

	public function lista_usuarios_simples()
	{
		$this->load->view('menu');
		$this->load->model('usuario_model');
		$resultado = $this->usuario_model->getUsuarios();
		$dado = array('usuarios'=>$resultado);
		$this->load->view('usuario/lista_simples', $dado);
	}

	public function lista()
	{	
		$this->load->model('usuario_model');
		$resultado['usuarios'] = $this->usuario_model->get();
		$this->load->view('menu');
		$this->load->view('usuario/lista', $resultado);
	}

	public function novo()
	{
		$this->load->view('menu');
		$this->load->view('usuario/novo');
	}

	public function gravar($id = null)
	{
		$this->load->library('form_validation');

		$this->load->model('usuario_model');

		$regras = array(
			array('field' => 'nome', 'label' => 'nome', 'rules' => 'required'),
			array('field' => 'email', 'label' => 'email', 'rules' => 'required|valid_email'),
			array('field' => 'senha', 'label' => 'senha', 'rules' => 'required'),
			array('field' => 'aniversario', 'label' => 'aniversario', 'rules' => 'required'),
			array('field' => 'genero', 'label' => 'genero', 'rules' => 'required'),
			array('field' => 'cpf', 'label' => 'cpf', 'rules' => 'required|exact_length[11]'),
			array('field' => 'estado', 'label' => 'estado', 'rules' => 'required|exact_length[2]'),
			array('field' => 'cidade', 'label' => 'cidade', 'rules' => 'required')
		);

		$this->form_validation->set_rules($regras);

		 if ($this->form_validation->run() == false) {
			 echo "erro de validação";
			 $this->load->view('menu');
			 $this->load->view('usuario/novo');
		 }
		 else {

		$id = $this->input->post('id');
		$dados = array(
			"nome" => $this->input->post('nome'),
			"email" => $this->input->post('email'),
			"senha" => $this->input->post('senha'),
			"aniversario" => $this->input->post('aniversario'),
			"genero" => $this->input->post('genero'),
			"cpf" => $this->input->post('cpf'),
			"estado" => $this->input->post('estado'),
			"cidade" => $this->input->post('cidade')
		);

		$this->load->view('menu');
		if ($this->usuario_model->gravar($dados, $id)) {
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
			$this->load->model('usuario_model');
			$dados = $this->usuario_model->get($id);
			if ($dados->num_rows() > 0 ) {
				$valores['id'] = $dados->row()->id;
				$valores['nome'] = $dados->row()->nome;
				$valores['email'] = $dados->row()->email;
				$valores['senha'] = $dados->row()->senha;
				$valores['aniversario'] = $dados->row()->aniversario;
				$valores['genero'] = $dados->row()->genero;
				$valores['cpf'] = $dados->row()->cpf;
				$valores['estado'] = $dados->row()->estado;
				$valores['cidade'] = $dados->row()->cidade;
			}
			$this->load->view('menu');
			$this->load->view('usuario/novo', $valores);
		} 
		else {
			echo "Usuario não localizado";
		}
	}

	public function excluir($id = null)
	{
		if ($id) {
			$this->load->model('usuario_model');
			if ($dados = $this->usuario_model->excluir($id))
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
