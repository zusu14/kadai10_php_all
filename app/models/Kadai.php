 <?php

 require_once(__DIR__ . '/../helpers/db.php');

 class Kadai
 {

  private $pdo;

  public function __construct()
  {
    $this->pdo = dbConnect();
  }

  /**
   * 課題IDから取得する関数
   * @param int $id 課題ID
   * @return 
   */
  public function findById(int $id):?array
  {
    $sql = 'SELECT * FROM kadai WHERE id=:id';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // return $result ?:null; // ショートサーキット評価（エルビス演算子）
    return $result ? $result : null; // 三項演算子
  }

  /**
   * 
   * @param int $developer_id 開発者ID
   * @return array 課題情報の連想配列
   */
  public function findByDeveloper(int $developer_id):?array
  {
    $sql = 'SELECT id, title FROM kadai WHERE developer_id=:developer_id ORDER BY id ASC';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':developer_id', $developer_id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result ? $result : null; // 三項演算子
  }

 }