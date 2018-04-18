<?php
/**
 * Created by PhpStorm.
 * User: conghoan
 * Date: 4/18/18
 * Time: 07:23
 */
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    public function testGetFileIterator(){
        $path = __DIR__ . "/folder";
        $factory = new \SebastianBergmann\FileIterator\Factory();
        $iterator = $factory->getFileIterator($path);
        $this->assertTrue($iterator instanceof \AppendIterator);
    }
}