<?php

require_once(__DIR__ . '/../helpers/db.php');

class Developer
{
  private $pdo;

  /** マジックメソッド オブジェクト生成時に自動で呼ばれる
   *  
   */
  public function __construct()
  {
    $this->pdo = dbConnect();
  }

  /** 開発者一覧を取得する関数
   * 
   * @return array 開発者情報の連想配列
   */
  public function findAll():array
  {
    $sql = 'SELECT id, name FROM developer ORDER BY id ASC';
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * ID指定で開発者を取得
   * @param int $id 開発者ID
   * @return array|null 開発者情報の連想配列（存在しない場合はnull）
   */
  public function findById(int $id): ?array
  {
    $sql = 'SELECT id, name FROM developer WHERE id=:id';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $developer = $stmt->fetch(PDO::FETCH_ASSOC);
    // return $developer ?: null; // ショートサーキット評価
    return $developer ? $developer : null; // 三項演算子
  }

  /**
   * 新規登録
   * @param string $name 登録する開発者の名前
   * @return bool  true:成功、false:失敗
   */
  public function create(string $name):bool
  {
    $sql = 'INSERT INTO developer (name) VALUES (:name)';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    return $stmt->execute();
  }

  /**
   * 更新
   * @param int $id 開発者ID
   * @param string $name 開発者名
   * @return bool  true:成功、false:失敗
   */
  public function update(int $id, string $name):bool
  {
    $sql = 'UPDATE developer SET name = :name WHERE id=:id';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
  }

  /**
   * 削除
   * @param int $id 開発者ID
   * @return bool true:成功、false:失敗
   */
  public function delete(int $id):bool
  {
    $sql = 'DELETE FROM developer WHERE id=:id';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
  }
}
