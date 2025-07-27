<?php

require_once(__DIR__ . '/../helpers/db.php');

class Comment
{
  private $pdo;

  public function __construct()
  {
    $this->pdo = dbConnect();
  }

  /**
   * IDからコメントを取得する関数
   * @param int $id コメントID
   * @return array コメント一覧（作成日時の降順）
   */
  public function findById(int $id):?array
  {
    $sql = 'SELECT * FROM comment WHERE id=:id';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $comment = $stmt->fetch(PDO::FETCH_ASSOC);
    // return $comment ?:null; // ショートサーキット評価（エルビス演算子）
    return $comment ? $comment : null; // 三項演算子
  }

  /**
   * 課題IDからコメント一覧を取得する関数
   * @param int $kadai_id 課題ID
   * @return array コメント一覧（作成日時の降順）
   */
  public function findByKadaiId(int $kadai_id):?array
  {
    $sql = 'SELECT id, user_id, nickname, comment, created_at FROM comment WHERE kadai_id=:kadai_id ORDER BY created_at DESC';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue('kadai_id', $kadai_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * コメントデータ作成
   * @param array $data コメントデータ配列
   * @return void
   */
  public function create(array $data):void
  {
    $sql = 'INSERT INTO comment(id, nickname, comment, created_at, kadai_id, user_id) VALUES(NULL, :nickname, :comment, now(), :kadai_id, :user_id)';
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
      ':nickname' => $data['nickname'],
      ':comment' => $data['comment'],
      ':kadai_id' => $data['kadai_id'],
      ':user_id' => $data['user_id'],
    ]);
  }

  public function update(int $id, string $nickname, string $comment): bool
  {
      $sql = 'UPDATE comment SET nickname = :nickname, comment = :comment, updated_at = NOW() WHERE id = :id';
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':nickname', $nickname, PDO::PARAM_STR);
      $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
      $stmt->bindValue(':id', $id, PDO::PARAM_INT);
      try {
          return $stmt->execute();
      } catch (PDOException $e) {
          // 例外処理はController側に任せる場合もある
          return false;
      }
  }

    public function delete(int $id): bool
  {
      $sql = 'DELETE FROM comment WHERE id = :id';
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':id', $id, PDO::PARAM_INT);
      try {
          return $stmt->execute();
      } catch (PDOException $e) {
          // ログ記録や例外処理を入れてもよい
          return false;
      }
  }

}