<?php

namespace App\Entity;

use App\db\Database;
use PDO;

class Vaga{
    
    public int $id;
    public string $titulo;
    public string $descricao;
    public string $ativo;
    public string $data;

    public function cadastrar()
    {
        $this->data = date('Y-m-d H:i:s');

        $obDatabase = new Database('vagas');
        $this->id = $obDatabase->insert([
            'titulo'=> $this->titulo,
            'descricao'=> $this->descricao,
            'ativo'=> $this->ativo,
            'data'=> $this->data,
        ]);
       
        return true;
    }

    public static function getVagas($where = null, $order = null, $limit = null)
    {
        return (new Database('vagas'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}