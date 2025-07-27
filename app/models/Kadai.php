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
   * @return array|null 課題情報の連想配列
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
   *　開発者IDから課題一覧を取得する関数 
   * @param int $developer_id 開発者ID
   * @return array|null 課題情報の連想配列
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

  /**
   * 課題テーマNoから該当する課題を持つ開発者一覧を取得する関数
   * @param int $kadai_no 課題テーマNo
   * @return array|null 開発者情報の連想配列
   */
  public function findDeveloperByKadaiNo(int $kadai_no):?array
  {
    $sql = 'SELECT d.id, d.name, k.kadai_no FROM developer d
            INNER JOIN kadai k ON k.developer_id = d.id
            WHERE k.kadai_no = :kadai_no
            ORDER BY d.id ASC';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':kadai_no', $kadai_no, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result ? $result : null; // 三項演算子
  }

  /**
   * 課題テーマIDと開発者IDから特定の課題を取得する関数
   * @param int $kadai_no 課題テーマNo
   * @param int $developer_id 開発者ID
   * @return array|null 課題情報の連想配列
   */
  public function findByKadaiNoAndDeveloperId(int $kadai_no, int $developer_id):?array
  {
    $sql = 'SELECT * FROM kadai WHERE kadai_no = :kadai_no AND developer_id = :developer_id';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':kadai_no', $kadai_no, PDO::PARAM_INT);
    $stmt->bindValue(':developer_id', $developer_id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ?? null; // null合体演算子
  }

 }