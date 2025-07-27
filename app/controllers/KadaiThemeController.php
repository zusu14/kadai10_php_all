<?php

require_once(__DIR__ . '../models/KadaiTheme.php');
require_once(__DIR__ . '../models/Kadai.php');

class KadaiThemeController
{
  private $kadaiThemeModel;
  private $kadaiModel;

  public function __construct()
  {
    $this->kadaiThemeModel = new KadaiTheme();
    $this->kadaiModel = new Kadai();
  }

  /**
   * 課題テーマ一覧表示（コレクション画面）
   */
  public function index()
  {
    $kadai_themes = $this->kadaiThemeModel->findAll();

    // viewを呼ぶ
    include(__DIR__ . '/../views/kadai_theme_list.php');
  }

  /**
   * 課題テーマ詳細表示
   * その課題テーマを登録している開発者一覧を表示
   */
  public function show(int $kadai_no)
  {
    $kadai_theme = $this->kadaiThemeModel->findByKadaiNo($kadai_no);
    if(!$kadai_theme){
      exit('該当する課題テーマが見つかりません');
    }

    // その課題テーマを登録している開発者一覧を取得
    $developers = $this->kadaiModel->findDeveloperByKadaiNo($kadai_no);

    // viewを呼ぶ
    include(__DIR__ . '/../views/kadai_theme_detail.php');
  }
}