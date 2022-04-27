<?php
  require '../../common/auth.php';
  require '../../common/database.php';

  if(!isLogin()){
    header('Location: ../login/');//リダイレクト処理
    exit;
  }

  $edit_id = $_POST['edit_id'];
  $edit_title = $_POST['edit_title'];
  $edit_content = $_POST['edit_content'];

  $user_id = getLoginUserId();

  $database_handler = getDatabaseConnection();

  try{/*                                                                                                         ↓ 現在の時刻 ↓選択されたメモidでログインuser_id*/
    if($statement = $database_handler->prepare("UPDATE memos SET title = :title, content = :content, updated_at = NOW() WHERE id = :edit_id AND user_id = :user_id")){
      $statement->bindParam(":title",htmlspecialchars($edit_title));/*htmlspecialchars => 特殊文字をHTML記号に変換,クロスサイトスクリプティング対策*/
      $statement->bindParam(":content",htmlspecialchars($edit_content));
      $statement->bindParam(":edit_id",$edit_id);
      $statement->bindParam(":user_id",$user_id);
      $statement->execute();
    }
    /*                        ↓excuteで実行が指示されたらハンドライベントとしてSQLが発火するddd*/
    if($statement = $database_handler->prepare("SELECT id, title, content FROM memos WHERE id = :edit_id AND user_id = :user_id")){
      $statement->bindParam(":edit_id",$edit_id);
      $statement->bindParam(":user_id",$user_id);
      $statement->execute();

      $result = $statement->fetch(PDO::FETCH_ASSOC);
      $_SESSION['select_memo'] = [
        'id' => $result['id'],
        'title' => $result['title'],
        'content' => $result['content'],
      ];
    }
  }catch(Throwable $e){
    echo $e->getMessage();
    exit;
  }

  header('Location: ../../memo');
  exit;
