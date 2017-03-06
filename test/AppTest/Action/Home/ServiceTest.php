<?php

namespace AppTest\Action\Home;

use App\Action\Home\Service;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest;
use Zend\Expressive\Router\RouterInterface;


/**
 * @author Diego Vilarinho <contato@diegovilarinho.com.br>
 */
class ServiceTest extends \PHPUnit_Framework_TestCase
{
    /** @var RouterInterface */
    protected $router;

    protected function setUp()
    {
        $this->router = $this->prophesize(RouterInterface::class);
    }

    public function testResponse()
    {
        $homeService = new Service();
        $response = $homeService(
            new ServerRequest(['/api/v1/contents/home']), 
            new Response(), 
            function () {}
        );

        $this->assertTrue($response instanceof Response);
    }
}
