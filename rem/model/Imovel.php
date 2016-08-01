<?php

class Imovel{
	
	private $id;
	private $name;
	private $endereco;
	private $valorAvaliado;
	private $valorAluguel;
	private $proprietario;
	private $descricao;
	
	public function __construct($id='', $name='', $endereco='', $valorAvaliado='', $valorAluguel='', $proprietario='', $descricao=''){
		
		$this->id = $id;
		$this->name = $name;
		$this->endereco = $endereco;
		$this->valorAvaliado = $valorAvaliado;
		$this->valorAluguel = $valorAluguel;
		$this->proprietario = $proprietario;
		$this->descricao = $descricao;
		
	}
	
	public function getID(){
		return $this->$id;
	}
	
	public function setID($id){
		$this->id = $id;
	}
	public function getName(){
		return $this->$name;
	}	
	public function setName($name){
		$this->name = $name;
	}
	
	public function getendereco(){
		return $this->endereco;
	}
	
	public function setendereco($endereco){
		$this->endereco = $endereco;
	}
	
	
	public function setvalorAvaliado($valorAvaliado){
		$this->valorAvaliado = $valorAvaliado;
	}
	
	public function getvalorAvaliado(){
		return $this->valorAvaliado;
	}
	
	public function setvalorAluguel($valorAluguel){
		$this->valorAluguel = $valorAluguel;
	}
	
	public function getvalorAluguel(){
		return $this->valorAluguel;
	}
	
	public function getProprietario(){
		return $this->proprietario;
	}
	
	public function setProprietario($proprietario){
		$this->proprietario = $proprietario;
	}
	
	public function getDescricao(){
		return $this->descricao;
	}
	
	public function getDataJSON(){
		$aux = array(
				'id'=>$this->id,
				'immobile'=>$this->name,
				'address'=>$this->endereco,
				'valuedValue'=>$this->valorAvaliado,
				'rentValue'=>$this->valorAluguel,
				'owner'=>$this->proprietario,
				'description'=>$this->descricao,
				);
			
		return($aux);	
	}
}
?>