$HADOOP_HOME/sbin/stop-all.sh
while read h; do
	if [ -z "$h" ]; then continue; fi
	hn=`echo $h | cut -d ' ' -f2`
	ssh $hn "rm -rf /opt/hadoop_tmp/hdfs/datanode/*"
done < /etc/hosts
$HADOOP_HOME/bin/hdfs namenode -format
