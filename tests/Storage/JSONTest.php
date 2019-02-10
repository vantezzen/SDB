<?php

use PHPUnit\Framework\TestCase;
use vowserDB\Table;
use vowserDB\Storage\JSON;

class JSONStorageTest extends TestCase
{
    protected static $storage;
    protected static $table;

    public static function setUpBeforeClass()
    {
        self::$storage = new JSON;
        self::$table = new Table('unitJSONStorageTest', ['one', 'two', 'three', 'four'], false, [
            "storage" => self::$storage
        ]);
    }

    /**
     * Test basic functionality.
     */
    public function testCreation()
    {
        $this->assertFileExists('vowserDB/unitJSONStorageTest.json');
        $this->assertStringEqualsFile('vowserDB/unitJSONStorageTest.json', '{"columns":["one","two","three","four"],"data":[]}');
    }


    /**
     * Test get columns array.
     */
    public function testGetColumns()
    {
        $file = self::$table->path;
        $actual = self::$storage->columns($file);
        $this->assertEquals(['one', 'two', 'three', 'four'], $actual);
    }

    /**
     * Test insertion.
     */
    public function testInsert()
    {
        self::$table->insert(['two' => 'test'])->save()->read();
    
        // Test table class data
        $expected = [[
            'one' => '', 
            'two' => 'test', 
            'three' => '', 
            'four' => ''
        ]];
        $this->assertEquals($expected, self::$table->data());

        // Test table file
        $this->assertStringEqualsFile('vowserDB/unitJSONStorageTest.json', '{"columns":["one","two","three","four"],"data":[{"two":"test","one":"","three":"","four":""}]}');
        self::$table->truncate()->save();
    }

    public static function tearDownAfterClass()
    {
        self::$table->drop();
    }
}