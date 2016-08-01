<?php

class Cliente{
	
	private $nome;
	private $email;
	private $rg;
	private $cpf;
	private $endereco;
	private $id;
	
	public function __construct($codigo='', $nome='',$cpf='', $rg='', $endereco=''){
		$this->nome = $nome;
		$this->cpf = $cpf;
		$this->rg = $rg;
		$this->endereco = $endereco;
		$this->id = $codigo;

		$this->pdo = Database::connect ();
		$this->pdo->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		
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
		return $this->nome;
	}
	
	public function setEndereco($endereco){
		$this->endereco = $endereco;
	}
	
	public function getDataJSON(){
		$aux = array(
				'id'=>$this->id,
				'name'=>$this->nome,
				'email'=>$this->email,
				'rg'=>$this->rg,
				'cpf'=>$this->cpf,
				'address'=>$this->endereco,
				);
			
		return($aux);	
	}
	
}

?>