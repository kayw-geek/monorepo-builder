<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace MonorepoBuilder20211007\Symfony\Component\HttpKernel\Controller;

use MonorepoBuilder20211007\Symfony\Component\ErrorHandler\ErrorRenderer\ErrorRendererInterface;
use MonorepoBuilder20211007\Symfony\Component\HttpFoundation\Request;
use MonorepoBuilder20211007\Symfony\Component\HttpFoundation\Response;
use MonorepoBuilder20211007\Symfony\Component\HttpKernel\Exception\HttpException;
use MonorepoBuilder20211007\Symfony\Component\HttpKernel\HttpKernelInterface;
/**
 * Renders error or exception pages from a given FlattenException.
 *
 * @author Yonel Ceruto <yonelceruto@gmail.com>
 * @author Matthias Pigulla <mp@webfactory.de>
 */
class ErrorController
{
    private $kernel;
    private $controller;
    private $errorRenderer;
    public function __construct(\MonorepoBuilder20211007\Symfony\Component\HttpKernel\HttpKernelInterface $kernel, $controller, \MonorepoBuilder20211007\Symfony\Component\ErrorHandler\ErrorRenderer\ErrorRendererInterface $errorRenderer)
    {
        $this->kernel = $kernel;
        $this->controller = $controller;
        $this->errorRenderer = $errorRenderer;
    }
    public function __invoke(\Throwable $exception) : \MonorepoBuilder20211007\Symfony\Component\HttpFoundation\Response
    {
        $exception = $this->errorRenderer->render($exception);
        return new \MonorepoBuilder20211007\Symfony\Component\HttpFoundation\Response($exception->getAsString(), $exception->getStatusCode(), $exception->getHeaders());
    }
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param int $code
     */
    public function preview($request, $code) : \MonorepoBuilder20211007\Symfony\Component\HttpFoundation\Response
    {
        /*
         * This Request mimics the parameters set by
         * \Symfony\Component\HttpKernel\EventListener\ErrorListener::duplicateRequest, with
         * the additional "showException" flag.
         */
        $subRequest = $request->duplicate(null, null, ['_controller' => $this->controller, 'exception' => new \MonorepoBuilder20211007\Symfony\Component\HttpKernel\Exception\HttpException($code, 'This is a sample exception.'), 'logger' => null, 'showException' => \false]);
        return $this->kernel->handle($subRequest, \MonorepoBuilder20211007\Symfony\Component\HttpKernel\HttpKernelInterface::SUB_REQUEST);
    }
}
