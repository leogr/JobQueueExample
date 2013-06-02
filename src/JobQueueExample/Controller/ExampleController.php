<?php
namespace JobQueueExample\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class ExampleController extends AbstractActionController
{

    public function testAction()
    {
        return "It's works!";
    }

}