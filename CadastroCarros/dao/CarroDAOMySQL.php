<?php

require_once 'models/Carro.php';

class CarroDAOMySQL {
    private $pdo;

    public function __construct(PDO $driver){
        $this->pdo = $driver;
    }


    public function add(Carro $c){
        $sql = $this->pdo->prepare("INSERT INTO carros (marca, modelo, ano, preco) VALUES (:marca, :modelo, :ano, :preco)");
        $sql->bindValue(':marca', $c->getMarca());
        $sql->bindValue(':modelo', $c->getModelo());
        $sql->bindValue(':ano', $c->getAno());
        $sql->bindValue(':preco', $c->getPreco());
        $sql->execute();
    }

    public function findById($id){

        $sql= $this->pdo->prepare("SELECT * FROM carros WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0){

            $data = $sql->fetchAll();

            foreach($data as $item){
                $u = new Carro();
                $u->setId($item['id']);
                $u->setMarca($item['marca']);
                $u->setModelo($item['modelo']);
                $u->setAno($item['ano']);
                $u->setPreco($item['preco']);

                return $u;

            }
        }else{
            return false;
        }
    }

    public function read(){

        $array=[];

        $sql= $this->pdo->query("SELECT * FROM carros");
        if($sql->rowCount() > 0){

            $data = $sql->fetchAll();

            foreach($data as $item){
                $u = new Carro();
                $u->setId($item['id']);
                $u->setMarca($item['marca']);
                $u->setModelo($item['modelo']);
                $u->setAno($item['ano']);
                $u->setPreco($item['preco']);

                $array[] = $u;

            }
        }

        return $array;
    }

    public function update(Carro $c){
        $sql = $this->pdo->prepare("UPDATE carros SET marca = :marca, modelo = :modelo, ano = :ano, preco = :preco WHERE id = :id");
        $sql->bindValue(':marca', $c->getMarca());
        $sql->bindValue(':modelo', $c->getModelo());
        $sql->bindValue(':ano', $c->getAno());
        $sql->bindValue(':preco', $c->getPreco());
        $sql->bindValue(':id', $c->getId());
        $sql->execute();

        return true;
    }

    public function delete($id){
        $sql = $this->pdo->prepare("DELETE FROM carros WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}