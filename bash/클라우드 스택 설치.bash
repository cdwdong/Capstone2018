sudo apt install yum

/etc/yum.repos.d/cloudstack.repo

[cloudstack]
name=cloudstack
baseurl=http://download.cloudstack.org/centos7/4.11/ //버전 맞는 것이 없음 우분투은 아예 지원 안하나봄
enabled=1
gpgcheck=0

cd ./apache-cloudstack-4.0.0-incubating-src
apt-get update
apt-get install python-software-properties
add-apt-repository ppa:natecarlson/maven3
apt-get update
apt-get install ant debhelper openjdk-6-jdk tomcat6 libws-commons-util-java genisoimage python-mysqldb libcommons-codec-java libcommons-httpclient-java liblog4j1.2-java maven3


//ifconfig없음
apt install net-tools