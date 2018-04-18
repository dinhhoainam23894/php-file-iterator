<?php
/**
 * Created by PhpStorm.
 * User: conghoan
 * Date: 4/18/18
 * Time: 07:23
 */
use PHPUnit\Framework\TestCase;
use SebastianBergmann\FileIterator\Facade;

class FacadeTest extends TestCase
{
    public $facade;
    function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->facade= new Facade();
    }

    public function testGetFilesAsArray(){
        $path = __DIR__ . "/../src";
        $facade = new Facade();
        $files = $facade->getFilesAsArray($path);
        $this->assertTrue(count($files) > 0);
    }

    public function testGetFilesSuffixes(){
        $suffixes = '1.json';
        $path = __DIR__ . "/folder";
        $facade = new Facade();
        $files = $facade->getFilesAsArray($path, $suffixes);
        foreach ($files as $file){
            $this->assertTrue(\substr($file, -1 * \strlen($suffixes)) === $suffixes);
        }
    }

    public function testGetFilesPrefixes(){
        $prefixes = '88';
        $path = __DIR__ . "/folder";
        $files = $this->facade->getFilesAsArray($path, '', $prefixes);
        foreach ($files as $file){
            $filename = basename($file);
            $this->assertTrue(\strpos($filename, $prefixes) === 0);
        }
    }

    public function testGetFilesSuffixesPrefixes(){
        $suffixes = '.json';
        $prefixes = '88';
        $path = __DIR__ . "/folder";
        $files = $this->facade->getFilesAsArray($path, $suffixes, $prefixes);
        foreach ($files as $file){
            $filename = basename($file);
            $this->assertTrue(\strpos($filename, $prefixes) === 0 && \substr($file, -1 * \strlen($suffixes)) === $suffixes);
        }
    }

    public function testgetFilesWithExclude(){
        $exclude = [
            '/Applications/MAMP/htdocs/test_laravel/packages/php-file-iterator/tests/folder/88_1.json'
        ];

        $path = __DIR__ . "/folder";
        $files = $this->facade->getFilesAsArray($path,'','', $exclude);
        foreach ($files as $file){
            $filename = basename($file);
            foreach ($exclude as $e){
                $filename_e = basename($e);
                $this->assertFalse($filename_e === $filename);
            }
        }
    }
    public function testgetFilesWithCommonPath(){

        $path = __DIR__ . "/folder";
        $files = $this->facade->getFilesAsArray($path,'','', [], true);
        print_r($files);
    }
}