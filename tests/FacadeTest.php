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
    public function testGetFilesAsArray(){
//        $path = "../src";
        $path = __DIR__ . "/../src";
        $facade = new Facade();
        $files = $facade->getFilesAsArray($path);
        if (count($files) > 0){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
}