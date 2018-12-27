<?php

namespace Hyperflex\Dispatcher;


use Hyperflex\Dispatcher\Exceptions\InvalidArgumentException;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use function array_unique;
use function is_string;

class HttpRequestHandler implements RequestHandlerInterface
{

    private $middlewares = [];

    private $offset = 0;

    /**
     * @var string
     */
    private $coreHandler;

    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(array $middlewares, string $coreHandler, ContainerInterface $container)
    {
        $this->middlewares = array_unique($middlewares);
        $this->coreHandler = $coreHandler;
        $this->container = $container;
    }

    /**
     * Handles a request and produces a response.
     * May call other collaborating code to generate the response.
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        if (! isset($this->middlewares[$this->offset]) && ! empty($this->coreHandler)) {
            $handler = $this->container->get($this->coreHandler);
        } else {
            $handler = $this->middlewares[$this->offset];
            is_string($handler) && $handler = $this->container->get($handler);
        }
        if (! method_exists($handler, 'process')) {
            throw new InvalidArgumentException(sprintf('Invalid middleware, it have to provide a process() method.'));
        }
        return $handler->process($request, $this->next());
    }

    private function next()
    {
        $this->offset++;
        return $this;
    }
}