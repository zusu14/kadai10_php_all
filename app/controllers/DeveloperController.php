<?php

require_once(__DIR__ . '/../models/Developer.php');

class DeveloperController
{
  private $developerModel;

  public function __construct()
  {
    // Developerモデルのインスタンス生成
    $this->developerModel = new Developer();
  }

  // 開発者一覧表示（コレクション画面）
  public function index()
  {
    $developers = $this->developerModel->findAll();

    // viewを呼ぶ
    include(__DIR__ . '/../views/developer_list.php');
  }

  // 開発者詳細表示（シングル画面）
  public function show(int $developer_id)
  {
    $developer = $this->developerModel->findById($developer_id);
    if(!$developer){
      exit('該当する開発者が見つかりません');
    }

    // Kadaiモデルを使用し、開発者の課題一覧を取得
    require_once(__DIR__ . '/../models/Kadai.php');
    $kadaiModel = new Kadai();
    $kadai_list = $kadaiModel->findByDeveloper($developer_id);

    // viewを呼ぶ
    include(__DIR__ . '/../views/developer_detail.php');
  }
}