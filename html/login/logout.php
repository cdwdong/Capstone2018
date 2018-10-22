//로그아웃 php
<?php
session_start();
$res=session_destroy(); //모든 세션 변수 삭제
if($res){
  header('Location: ./main/php');
}
?>
