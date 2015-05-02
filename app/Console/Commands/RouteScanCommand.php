<?php
namespace MicroApp\Console\Commands;

use RuntimeException;
use Collective\Annotations\Console\RouteScanCommand as ScanCommand;

/**
 * Class RouteScanCommand
 * @package MicroApp\Providers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class RouteScanCommand extends ScanCommand
{

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->files->put($this->getOutputPath(), $this->getRouteDefinitions());

        $this->info('Routes scanned!');
    }

    /**
     * Get the route definitions for the annotations.
     *
     * @return string
     */
    protected function getRouteDefinitions()
    {
        $scanner = $this->laravel->make('annotations.route.scanner');

        $scanner->setClassesToScan($this->provider->routeScans());

        return '<?php ' . PHP_EOL . PHP_EOL . $scanner->getRouteDefinitions() . PHP_EOL;
    }

    /**
     * Get the path to which the routes should be written.
     *
     * @return string
     */
    protected function getOutputPath()
    {
        return storage_path() . '/framework/routes.scanned.php';
    }

    /**
     * Get the application namespace from the Composer file.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected function getAppNamespace()
    {
        $composer = json_decode(file_get_contents(base_path() . '/composer.json'), true);
        foreach ((array)data_get($composer, 'autoload.psr-4') as $namespace => $path) {
            foreach ((array)$path as $pathChoice) {
                if (realpath(base_path() . '/app') == realpath(base_path() . '/' . $pathChoice)) {
                    return $namespace;
                }
            }
        }
        throw new RuntimeException("Unable to detect application namespace.");
    }

}
