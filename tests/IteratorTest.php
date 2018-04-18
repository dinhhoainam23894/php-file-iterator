<?php
/**
 * Created by PhpStorm.
 * User: conghoan
 * Date: 4/18/18
 * Time: 07:23
 */
use PHPUnit\Framework\TestCase;

class IteratorTest extends TestCase
{
    public function testAccept(){
        $path = __DIR__ . "/folder";
        $iterator = new \SebastianBergmann\FileIterator\Iterator(new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path, \RecursiveDirectoryIterator::FOLLOW_SYMLINKS)
        ));

        $result = $iterator->accept();
        $this->assertTrue($result);
    }
}