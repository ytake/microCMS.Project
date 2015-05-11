<?php
namespace MicroApp\Console\Commands;

use Illuminate\Console\Command;
use MicroApp\Services\InitializeServiceInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Helper\ProgressBar;

/**
 * Class SetUpConsole
 * @package MicroApp\Console\Commands
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class SetUpConsole extends Command
{

    /** @var string */
    protected $name = 'cms:setup';

    /** @var string */
    protected $description = "setup application";

    /** @var bool  */
    protected $proceed = false;

    /** @var InitializeServiceInterface */
    protected $service;

    protected $keys = [];

    /**
     * @param InitializeServiceInterface $service
     */
    public function __construct(InitializeServiceInterface $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        if(! $this->proceed) {

            $this->questionDefaultEnvironment();

            $this->questionUseMedia();

            $this->questionUseAccount();

            $this->questionUseStorage();

            $this->questionConfirmSetUp();
        }

    }

    protected function questionDefaultEnvironment()
    {
        foreach($this->service->getEnvironments() as $key => $envValue) {
            $this->keys[$key] = $this->ask(
                "Please enter your Environment Configuration:{$key} (default:{$envValue})", $envValue
            );
        }
    }

    /**
     *
     */
    protected function questionUseMedia()
    {
        $this->keys['CMS_SOCIAL_DRIVER'] = $this->choice(
            'Please select your socialite account (defaults to twitter)',
            ['twitter', 'facebook', 'github'],
            0
        );
        $this->comment('You have just selected: ' . $this->keys['CMS_SOCIAL_DRIVER']);
    }

    /**
     * @return void
     */
    protected function questionUseAccount()
    {
        $this->keys['CMS_SOCIAL_ACCOUNT'] = $this->ask(
            'Please enter your account name', 'account name'
        );
    }

    /**
     *
     */
    protected function questionUseStorage()
    {
        $this->keys['CMS_STORAGE_DRIVER'] = $this->choice(
            'Please select your data storage (defaults to mysql)',
            ['database', 'local file storage', 'file storage'],
            0
        );
        $this->comment('You have just selected: ' . $this->keys['CMS_STORAGE_DRIVER']);
    }

    /**
     *
     */
    protected function questionConfirmSetUp()
    {
        $this->table(
            ['configuration', 'use environment'],
            $this->selectedEnvironments()
        );
        $answer = $this->confirm('create initialize data? (default ok)', true);
        if(!$answer) {
            $this->fire();
            return;
        }
        $this->inProgress();
    }

    /**
     * generate .env file task progress
     */
    private function inProgress()
    {
        $production = $this->option('production');
        $progress = new ProgressBar($this->output);
        $progress->setBarCharacter('<comment>=</comment>');
        $progress->setFormat('verbose');
        $progress->start();
        $i = 0;
        $this->keys = array_merge($this->keys, $this->requiredParams());
        while ($i++ < 1) {
            $progress->setMessage('in progress...');
            $this->service->generateEnvironmentFile(
                $this->keys, $production
            );
            $progress->advance(1);
        }
        $progress->finish();
    }

    /**
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['production', '-p', InputOption::VALUE_NONE, 'set environment'],
        ];
    }

    /**
     * @return array
     */
    protected function requiredParams()
    {
        return [
            'CMS_SETUP' => 'true',
        ];
    }

    /**
     * @return array
     */
    private function selectedEnvironments()
    {
        $environments = [];
        foreach($this->keys as $key => $value) {
            $environments[] = [$key, $value];
        }
        return $environments;
    }

}
