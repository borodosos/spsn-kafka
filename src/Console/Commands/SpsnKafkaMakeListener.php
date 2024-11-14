<?php

namespace Spsn\Kafka\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class SpsnKafkaMakeListener extends GeneratorCommand {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'spsn-kafka:make-listener {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create listener for Kafka messages';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Listener';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub() {
        return __DIR__ . '/stubs/kafka.listener.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace) {
        return $rootNamespace . '\Listeners';
    }
}