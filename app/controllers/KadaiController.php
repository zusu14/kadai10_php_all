<?php
require_once(__DIR__ . '/../models/Kadai.php');
require_once(__DIR__ . '/../models/Comment.php');

class KadaiController
{
  private $kadaiModel;
  private $commentModel;

  public function __construct()
  {
    $this->kadaiModel = new Kadai();
    $this->commentModel = new Comment();
  }

  // 掲示板（課題詳細）＋コメント一覧表示
  public function show(int $kadai_id)
  {
    $kadai = $this->kadaiModel->findById($kadai_id);
    if (!$kadai) {
      exit('該当する課題が見つかりません');
    }

    $comments = $this->commentModel->findByKadaiId($kadai_id);

    // セッションからユーザIDを取得（未ログインならNULL）
    $user_id = $_SESSION['user_id'] ?? null;

    // viewを呼ぶ
    include(__DIR__ . '/../views/kadai_detail.php');
  }
}
