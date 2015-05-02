<?php
namespace MicroApp\Console\Commands;

use Illuminate\Console\Command;
use MicroApp\Services\InitializeService;
use Symfony\Component\Console\Helper\ProgressBar;

/**
 * Class SetUpConsole
 * @package MicroApp\Console\Commands
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class SetUpConsole extends Command
{

    const OK = 'ok';

    const NG = 'ng';

    /** @var string */
    protected $name = 'cms:setup';

    /** @var string */
    protected $description = "setup application";

    /** @var null|string */
    protected $socialMedia = null;

    /** @var null  */
    protected $storage = null;

    /** @var null  */
    protected $useAccountName = null;

    /** @var bool  */
    protected $proceed = false;

    /** @var InitializeService */
    protected $service;

    /**
     * @param InitializeService $service
     */
    public function __construct(InitializeService $service)
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
        $this->inProgress();
        return;
        if(! $this->proceed) {
            $this->questionUseMedia();

            $this->questionUseAccount();

            $this->questionUseStorage();

            $this->questionConfirmSetUp();
        }
    }

    /**
     *
     */
    protected function questionUseMedia()
    {
        $this->socialMedia = $this->choice(
            'Please select your socialite account (defaults to twitter)',
            ['twitter', 'facebook', 'github'],
            0
        );
        $this->comment('You have just selected: ' . $this->socialMedia);
    }

    /**
     * @return void
     */
    protected function questionUseAccount()
    {
        $this->useAccountName = $this->ask('Please enter your account name', 'account name');
    }

    /**
     *
     */
    protected function questionUseStorage()
    {
        $this->storage = $this->choice(
            'Please select your data storage (defaults to mysql)',
            ['mysql', 'local file storage', 'aws', 'dropbox'],
            0
        );
        $this->comment('You have just selected: ' . $this->storage);
    }

    /**
     *
     */
    protected function questionConfirmSetUp()
    {
        $this->table(
            ['social', 'use account name', 'selected data storage'],
            [
                [
                    $this->socialMedia, $this->useAccountName, $this->storage
                    ]
            ]
        );
        $agree = $this->choice(
            'create initialize data? (default ok)',
            [self::OK, self::NG],
            0
        );
        if($agree === self::NG) {
            $this->fire();
            return;
        }
        $this->inProgress();
    }

    private function inProgress()
    {
        $progress = new ProgressBar($this->output);
        $progress->setBarCharacter('<comment>=</comment>');
        $progress->setFormat('normal');

        $progress->start();
        $i = 0;
        while ($i++ < 1) {
            $progress->advance(1);
        }
        $progress->finish();
    }
}