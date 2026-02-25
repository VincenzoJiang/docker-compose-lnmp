# docker-compose-lnmp


#根目录下运行docker-compose up -d


##### TEST
docker run -d \
--name rocketmq \
--network docker-compose-lnmp_my_network \
--ip 172.19.0.10 \
-p 10912:10912 -p 10911:10911 -p 10909:10909 \
-p 8090:8080 -p 8091:8081 \
-e "NAMESRV_ADDR=rmqnamesrv:9876" \
-v /Users/vincenzo_jiang/docker-compose-lnmp/mq/rocketMQ/broker.conf:/home/rocketmq/rocketmq-5.3.2/conf/broker.conf \
apache/rocketmq:5.3.2 sh mqbroker --enable-proxy \
-c /home/rocketmq/rocketmq-5.3.2/conf/broker.conf


docker run -d --name rmqnamesrv -p 9876:9876 --network docker-compose-lnmp_my_network --ip 172.19.0.11 apache/rocketmq:5.3.2 sh mqnamesrv

docker exec -it rocketmq bash 
sh mqadmin updatetopic -t palr_hk_mq -c DefaultCluster