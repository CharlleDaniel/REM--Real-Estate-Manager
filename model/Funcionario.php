<?php

class Funcionario{
	
	private $nome;
	private $email;
	private $rg;
	private $cpf;
	private $endereco;
	
	public function __construct($nome='', $email='', $rg='',$cpf='', $endereco=''){
		$this->nome = $nome;
		$this->email = $email;
		$this->rg = $rg;
		$this->cpf = $cpf;
		$this->endereco = $endereco;
		
	}
	
	public function getNome(){
		return $this->nome;
	}
	
	public function setNome($nome){
		$this->nome = $nome;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function setEmail($email){
		$this->email = $email;
	}
	
	public function getRG(){
		return $this->rg;
	}
	
	public function setRG($rg){
		$this->rg = $rg;
	}
	
	public function getCPF(){
		return $this->cpf;
	}
	
	public function setCPF($cpf){
		$this->cpf = $cpf;
	}

	public function getEndereco(){
		return $this->endereco;
	}
	
	public function setEndereco($endereco){
		$this->endereco = $endereco;
	}

	public function getDataJSON(){
		$aux = array(
				'nome'=>$this->nome,
				'email'=>$this->email,
				'rg'=>$this->rg,
				'cpf'=>$this->cpf,
				'endereco'=>$this->endereco,
				);
			
		return($aux);	
	}
}
?>