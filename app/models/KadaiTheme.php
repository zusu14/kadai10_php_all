<?php

require_once(__DIR__ . '/../helpers/db.php');

class KadaiTheme
{
  private $pdo;

  public function __construct()
  {
    $this->pdo = dbConnect();
  }

  /**
   * 課題テーマ一覧を取得する関数
   * return array 課題テーマ情報の連想配列
   */
  public function findAll():array
  {
    $sql = 'SELECT kadai_no, kadai_name FROM kadai_theme ORDER BY kadai_no ASC';
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  
  /**
   * 課題Noから課題テーマを取得
   * @param int $kadai_no 課題No
   * @return array|null 課題テーマ情報の連想配列
   */
  public function findByKadaiNo(int $kadai_no):?array
  {
    $sql = 'SELECT kadai_no, kadai_name FROM kadai_theme WHERE kadai_no = :kadai_no';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':kadai_no', $kadai_no, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ? $result : null; // 三項演算子
  }

}