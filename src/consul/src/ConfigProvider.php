<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://hyperf.org
 * @document https://wiki.hyperf.org
 * @contact  group@hyperf.org
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace Hyperf\Consul;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
            ],
            'scan' => [
                'paths' => [
                ],
            ],
            'configs' => [
                'hyperf/consul' => [
                    __DIR__ . '/../config/consul.php' => BASE_PATH . '/config/autoload/consul.php',
                ],
            ],
        ];
    }
}