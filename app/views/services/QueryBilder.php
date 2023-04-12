<?php

namespace App\views\services;

use Aura\SqlQuery\QueryFactory;
use PDO;

class QueryBilder{

    public $queryFactory, $pdo;
    public function __construct(){
        $this->pdo = new PDO("mysql:host=localhost;dbname=project;", "root", "");
        $this->queryFactory = new QueryFactory('mysql');
    }

    public function getAll($table){
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])
            ->from($table);
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        $result = $sth->fetchALL(PDO::FETCH_ASSOC);
        return $result;
    }
}
