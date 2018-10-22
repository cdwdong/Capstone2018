//회원가입 php
<?php
$id=$_POST['id'];
$pw=$_POST['pw'];
$pwc=$_POST['pwc'];
$name=$_POST['name'];
$email=$_POST['email'];

if($pw!=$pwc)
{
  echo "비밀번호가 서로 일치하지 않습니다.";
  echo "<a href=signup.html>Back Page</a>";
  exit();
}

if($id==NULL || $pw==NULL || $name==NULL || $email==NULL)
{
  echo "입력하지 않은 항목이 있습니다."
  echo "<a href=signup.html>Back Page</a>";
  exit();
}

$mysqli=mysqli_connect("localhost","root","quf235689",'test2');

$check="SELECT *from user_info WHERE userid='$id'";
$result=$mysqli->query($check);

if($result->num_rows==1)
{
  echo "이미 사용중인 아이디 입니다."
  echo "<a href=signup.html>Back Page</a>";
  exit();
}

$signup=mysqli_query($mysqli, "INSERT INTO user_info (userid, userpw, name, email) VALUES('$id','$pw','$name','$email')");

if($signup){
  echo "회원가입 성공";
}
?>
