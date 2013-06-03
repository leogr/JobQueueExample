<?php
namespace JobQueueExample\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class ExampleController extends AbstractActionController
{

    public function testAction()
    {
        return "It's works!";
    }


    public function setupMongoAction()
    {
        /* @var $queue \ZendQueue\Queue */
        $queue = $this->getServiceLocator()->get('mongo-queue');
        $queue->ensureQueue();

        $queue = $this->getServiceLocator()->get('mongo-capped-queue');
        $queue->ensureQueue();
    }

    public function senderAction()
    {
        $this->queue('mongo-capped-queue')->forward('JobQueueExample\Controller\Example', array(
           'action' => 'receiver',
           'time'   => microtime(true)
        ));
        return "Message has been forwarded.\n";
    }

    public function receiverAction()
    {
        $time = $this->params('time');
        $latency = (microtime(true) - (float) $time) * 1000;
        echo 'Message received: ' . number_format($latency, 3, '.', '') . "ms\n";
    }

}