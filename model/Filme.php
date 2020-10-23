<?php
    class filme
    {
        public $nome;
        public $nota;

        function __construct ($nome){
            $this->nome = $nome;
        }

        public function __avaliar($nota){
            $this->nota = $nota;
        }

        public function __getnome(){
            return $this->nome;
        }

        public function __getnota(){
            return $this->nota;
        }
    }
?>