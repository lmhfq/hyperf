<?php

namespace Hyperflex\Di;


use Hyperflex\Di\Aop\AstParserFactory;
use PhpParser\Parser;
use PhpParser\PrettyPrinter\Standard;
use PhpParser\PrettyPrinterAbstract;

class ConfigProvider
{

    public function __invoke(): array
    {
        return [
            'dependencies' => [
                Parser::class => AstParserFactory::class,
                PrettyPrinterAbstract::class => Standard::class,
            ],
            'scan' => [
                'paths' => [],
            ],
        ];
    }

}