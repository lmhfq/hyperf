<?php

namespace Hyperflex\Dispatcher;


class ConfigProvider
{

    public function __invoke(): array
    {
        return [
            'dependencies' => [

            ],
            'scan' => [
                'paths' => [],
            ],
        ];
    }

}