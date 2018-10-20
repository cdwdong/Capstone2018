#기존 서버 files에 있는 파일을 하둡 파일 시스템에 업로드
hadoop fs -put /var/www/html/server/files 하둡파일시스템 경로

#하둡 파일 시스템에서 다시 files로 다운로드
hadoop copyToLocal 하둡파일시스템 경로 /var/www/html/server/files