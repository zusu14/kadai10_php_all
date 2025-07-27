<?php

// require_once(__DIR__ . '/../helpers/db.php');
// require_once(__DIR__ . '/../helpers/session.php');
require_once(__DIR__ . '/../helpers/init_user.php');
$user_id = initUser(); // セッション開始、ユーザIDを取得（取得できない場合は新規生成）

$page = $_GET['page'] ?? 'developers';

switch ($page) {
    case 'developers':
        require_once(__DIR__ . '/../controllers/DeveloperController.php');
        (new DeveloperController())->index();
        break;

    case 'developer':
        require_once(__DIR__ . '/../controllers/DeveloperController.php');
        $developer_id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        (new DeveloperController())->show($developer_id);
        break;

    case 'kadai':
        require_once(__DIR__ . '/../controllers/KadaiController.php');
        $kadai_id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        (new KadaiController())->show($kadai_id);
        break;

    case 'comment_create':
        require_once(__DIR__ . '/../controllers/CommentController.php');
        (new CommentController())->create($_POST, $user_id);
        break;

    case 'comment_edit':
        require_once(__DIR__ . '/../controllers/CommentController.php');
        $comment_id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        (new CommentController())->edit($comment_id, $user_id);
        break;

    case 'comment_update':
        require_once(__DIR__ . '/../controllers/CommentController.php');
        (new CommentController())->update($_POST, $user_id);
        break;

    case 'comment_delete':
        require_once(__DIR__ . '/../controllers/CommentController.php');
        $comment_id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        (new CommentController())->delete($comment_id, $user_id);
        break;

    default:
        echo "ページが見つかりません";
        http_response_code(404);
        break;
}
