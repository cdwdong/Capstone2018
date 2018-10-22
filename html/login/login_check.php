//로그인 php
<?php
session_start();
$id=$_POST['id'];
$pw=$_POST['pw'];
$mysqli=mysqli_connect("localhost","root","비밀번호","test2");

$check="SELECT * FROM user_info WHERE userid='$id'";
$result=$mysqli->query($check);
if($result->num_rows==1){
  $row=$result->fetch_array(MYSQLI_ASSOC);  //하나의 열을 배열로 가져옴
  if(row['userpw']==$pw){
    $_SESSION['userid']=$id;
    if(isset($_SESSION['userid']))
    {
      header('Location: ./main.php');
    }
    else{
      echo "세션 저장 실패";
    }
  }
  else{
    echo "아이디 혹은 비밀번호가 틀렸습니다";
  }
}
else{
  echo "아이디 혹은 비밀번호가 틀렸습니다";
}
?>
