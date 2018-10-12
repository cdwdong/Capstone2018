<?php

// 설정
$uploads_dir = '/var/www/Data';

 
// 변수 정리
$error = $_FILES['myfile']['error'];
$name = $_FILES['myfile']['name'];
$ext = array_pop(explode('.', $name));

move_uploaded_file( $_FILES['myfile']['tmp_name'], "$uploads_dir/$name");
 
// 오류 확인
if( $error != UPLOAD_ERR_OK ) 
{
	switch( $error ) 
	{
		case UPLOAD_ERR_INI_SIZE:
		case UPLOAD_ERR_FORM_SIZE:
			echo "파일이 너무 큽니다. ($error)";
			break;
		case UPLOAD_ERR_NO_FILE:
			echo "파일이 첨부되지 않았습니다. ($error)";
			break;
		default:
			echo "파일이 제대로 업로드되지 않았습니다. ($error)";
	}
	exit;
}
else if (is_uploaded_file($_FILES['myfile']['tmp_name'])) 
{
   echo "File ". $_FILES['myfile']['name'] ." uploaded successfully.\n";
   echo "Displaying contents\n";
   readfile($_FILES['myfile']['tmp_name']);
} 
else 
{
   echo "Possible file upload attack: ";
   echo "filename '". $_FILES['myfile']['tmp_name'] . "'.";
}



 
// 파일 이동


// 파일 정보 출력
echo "<h2>파일 정보</h2>
<ul>
	<li>파일명: $name</li>
	<li>확장자: $ext</li>
	<li>파일형식: {$_FILES['myfile']['type']}</li>
	<li>파일크기: {$_FILES['myfile']['size']} 바이트</li>
</ul>";



?>

