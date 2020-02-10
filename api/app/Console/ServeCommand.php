<?php

namespace App\Console;

use Illuminate\Foundation\Console\ServeCommand as BaseServeCommand;
use Illuminate\Support\Env;
use Symfony\Component\Console\Input\InputOption;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class ServeCommand extends BaseServeCommand
{
    /**
     * Execute the console command.
     *
     * @return int
     *
     * @throws \Exception
     */
    public function handle()
    {
        chdir(public_path());
        $this->line("<info>Development server started:</info> http://{$this->host()}:{$this->port()}");
        passthru($this->serverCommand(), $status);

        if ($status && $this->canTryAnotherPort()) {
            $this->portOffset += 1;

            return $this->handle();
        }

        return $status;
    }

    /**
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            ['host', null, InputOption::VALUE_OPTIONAL, 'The host address to serve the application on', 'localhost'],
            [
                'port',
                null,
                InputOption::VALUE_OPTIONAL,
                'The port to serve the application on',
                Env::get('SERVER_PORT'),
            ],
            ['tries', null, InputOption::VALUE_OPTIONAL, 'The max number of ports to attempt to serve from', 10],
        ];
    }
}
