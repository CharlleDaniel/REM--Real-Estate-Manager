<?php

class Imobiliaria{
	private $id;
	private $name;
	private $endereco;
	private $cnpj;
	private $telefone;
	private $email;

	public function __construct($id='', $name='', $endereco='',$cnpj='', $telefone='', $email=''){
		$this->id = $id;
		$this->name =$name;
		$this->endereco = $endereco;
		$this->cnpj = $cnpj;
		$this->telefone = $telefone;
		$this->email = $email;
	}
        
        public function getId(){
            return $this->id;
        }
        
        public function setId($id){
            $this->id=$id;
        }
        
        public function getName(){
            return $this->name;
        }
        
        public function setName($name){
            $this->name = $name;
        }
        
        public function getEndereco(){
            return $this->endereco;
        }
        
        public function setEndereco($endereco){
            $this->endereco = $endereco;
        }
        
        public function getCnpj(){
            return $this->cnpj;
        }
        
        public function setCnpj($cnpj){
            $this->cnpj = $cnpj;
        }
        
        public function getTelefone(){
            return $this->telefone;
        }
        
        public function setTelefone($telefone){
            $this->telefone = $telefone;
        }
        
        public function getEmail(){
            return $this->email;
        }
        
        public function setEmail($email){
            $this->email = $email;
        }
}
?>