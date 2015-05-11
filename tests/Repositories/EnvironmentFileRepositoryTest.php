<?php

class EnvironmentFileRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var \MicroApp\Repositories\File\EnvironmentRepository  */
    protected $file;

    protected function setUp()
    {
        $this->file = new \MicroApp\Repositories\File\EnvironmentRepository(
            new \Illuminate\Filesystem\Filesystem()
        );
    }

    public function testEnvironment()
    {
        $this->assertFileExists($this->file->environmentFile());
    }

    public function testParseEnvironment()
    {
        $this->assertInternalType('array', $this->file->parseEnvironments());
    }
}
