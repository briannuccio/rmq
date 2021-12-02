<?php

$cnn = new AMQPConnection();
$cnn->setLogin("username");
$cnn->setPassword("password");
$cnn->setHost("x.x.x.x");

if ($cnn->connect()) {
    echo "Established a connection to the broker\n";
}
else {
    echo "Cannot connect to the broker\n";
}

    $channel = new AMQPChannel($cnn);
    $queue = new AMQPQueue($channel);
    $queue->setName('examplequeue');

    // the default / nameless) exchange does not require a binding
    // as the broker declares a binding for each queue with key
    // identical to the queue name. error 403 if you try yourself.
    //$queue->bind('', 'myqueue');

$msg=$queue->get(AMQP_AUTOACK);

echo $msg->getBody();
echo "\n";

?>
