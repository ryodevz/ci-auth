<?php

namespace Ryodevz\CiAuth\Commands;

use CodeIgniter\CLI\BaseCommand;

class PublishVendorCommand extends BaseCommand
{
    protected $group = 'Yoo';

    protected $name = 'auth:vendor';

    protected $description = '';

    protected $usage = 'auth:vendor [arguments] [options]';

    protected $arguments = [];

    protected $options = [];

    public function run(array $params)
    {
        $configPath = APPPATH . '/Config/CiAuth.php';

        if(!file_exists($configPath)) {
            file_put_contents($configPath,  file_get_contents(__DIR__ . '/../stubs/CiAuth.stub') );
        }
    }
}