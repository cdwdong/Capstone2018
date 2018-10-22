//main php
<?php
session_start();
if(!isset($_SESSION['userid']))
{
  header('Location: ./login.html'); //로그인중이 아니면 로그인 화면으로
}

echo "<a href=CloUDooP.html> 로그인 성공 </a>"; //업로드 창으로 이동
?>
