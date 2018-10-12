<?php

$filePath = “”;
$file = $_SERVER[‘DOCUMENT_ROOT’].”/files/”.$filePath;
$file_size = filesize($file);
$filename = urlencode($filePath);

// 접근경로 확인 (외부 링크를 막고 싶다면 포함해주세요)
/*
if (!eregi($_SERVER[‘HTTP_HOST’], $_SERVER[‘HTTP_REFERER’]))
{
echo “<script>alert(‘외부 다운로드는 불가능합니다.’);</script>”;
return;
}
*/

if (is_file($file)) // 파일이 존재하면
{
	// 파일 전송용 HTTP 헤더를 설정합니다.
	if(strstr($HTTP_USER_AGENT, “MSIE 5.5”))
	{
		header(“Content-Type: doesn/matter”);
		Header(“Content-Length: “.$file_size);
		header(“Content-Disposition: filename=”.$filename);
		header(“Content-Transfer-Encoding: binary”);
		header(“Pragma: no-cache”);
		header(“Expires: 0”);
	}
	else
	{
		Header(“Content-type: file/unknown”);
		Header(“Content-Disposition: attachment; filename=”.$filename);
		Header(“Content-Transfer-Encoding: binary”);
		Header(“Content-Length: “.$file_size);
		Header(“Content-Description: PHP3 Generated Data”);
		header(“Pragma: no-cache”);
		header(“Expires: 0”);
	}

	//파일을 열어서, 전송합니다.
	$fp = fopen($file, “rb”);
	if (!fpassthru($fp))
	fclose($fp);
}
else
{
	echo "No File";
}

?>
