<?php
require_once(__DIR__ . '/../models/Comment.php');

class CommentController
{
  private $commentModel;

  public function __construct()
  {
    $this->commentModel = new Comment();
  }

  public function create(array $postData, int $user_id)
  {
    // user_idをpostDataに追加
    $postData['user_id'] = $user_id;
    // バリデーションなどは別途実装
    $this->commentModel->create($postData);

    // リダイレクト
    header("Location: index.php?page=kadai&id=" . $postData['kadai_id']);
    // include(__DIR__ . '/../views/kadai_detail.php');
    exit();
  }

  public function edit(int $comment_id, int $user_id)
  {
    $comment = $this->commentModel->findById($comment_id);

    if (!$comment || $comment['user_id'] !== $user_id) {
        exit('権限がありません');
    }

    // view遷移
    include(__DIR__ . '/../views/comment_edit.php');
  }

  public function update(array $postData, int $user_id)
  {
      // POSTパラメータの簡易バリデーション
      if (
          empty($postData['id']) || !is_numeric($postData['id']) ||
          empty($postData['kadai_id']) || !is_numeric($postData['kadai_id']) ||
          empty($postData['nickname']) || $postData['nickname'] === '' ||
          empty($postData['comment']) || $postData['comment'] === ''
      ) {
          exit('ParamError');
      }

      $id = (int)$postData['id'];
      $kadai_id = (int)$postData['kadai_id'];
      $nickname = trim($postData['nickname']);
      $comment = trim($postData['comment']);

      // 権限チェック（コメント所有者か）
      $existing = $this->commentModel->findById($id);
      if (!$existing || (int)$existing['user_id'] !== $user_id) {
          exit('不正なアクセスです。');
      }

      // 更新処理
      $success = $this->commentModel->update($id, $nickname, $comment);

      if ($success) {
          header("Location: index.php?page=kadai&id={$kadai_id}");
          exit();
      } else {
          exit('更新に失敗しました');
      }
  }

  public function delete(?int $comment_id, int $user_id): void
  {
      if (!$comment_id) {
          exit('ParamError');
      }

      // コメントの存在と権限チェック
      $comment = $this->commentModel->findById($comment_id);
      if (!$comment || (int)$comment['user_id'] !== $user_id) {
          exit('不正なアクセスです。');
      }

      // 削除実行
      $success = $this->commentModel->delete($comment_id);
      if ($success) {
          header("Location: index.php?page=kadai&id=" . $comment['kadai_id']);
          exit();
      } else {
          exit('削除に失敗しました');
      }
  }
}
