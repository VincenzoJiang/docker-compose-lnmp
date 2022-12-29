<?php
$config = [
    'host' => 'rabbit',
    'port' => 5672,
    'vhost' => '/',
    'login' => 'guest',
    'password' => 'guest'
];

$connection = new AMQPConnection($config);
if (!$connection) {
    die('connect fail');
}

$channel = new AMQPChannel($connection);
$exchange = new AMQPExchange($channel);
$exchange->setName('e_linvo2');
$exchange->setType(AMQP_EX_TYPE_FANOUT); //direct类型

$queue = new AMQPQueue($channel);
$queue->setName('queues');
$queue->setFlags(AMQP_DURABLE);
$queue->declareQueue();

echo "Message:\n";
while(True){
    $queue->consume('processMessage');
//自动ACK应答
    //$queue->consume('processMessage', AMQP_AUTOACK);
}
//$connection->disconnect();
/*
* 消费回调函数
* 处理消息
*/
function processMessage($envelope, $q) {
    $msg = $envelope->getBody();
    echo $msg."\n"; //处理消息
    $q->ack($envelope->getDeliveryTag()); //手动发送ACK应答
}