<?php
namespace App\Action;

use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;

class HelloAction implements MiddlewareInterface
{

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $query = $request->getQueryParams();
        
        $target = $request->getQueryParams()['target'] ?? 'World';
        
        //$target = htmlspecialchars($target, ENT_HTML5, 'UTF-8');
        
        return new JsonResponse(['message'=>sprintf(
            'Hello, %s!',
            $target
            )]);
        
    }
}

?>