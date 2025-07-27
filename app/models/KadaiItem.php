<?php

require_once(__DIR__ . '/../helpers/db.php');

class KadaiItem
{
  private $pdo;

  public function __construct()
  {
    $this->pdo = dbConnect();
  }

  public function findAll(): array
  {
    $sql = 'SELECT id, name FROM kadai_item ORDER BY id ASC';
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}