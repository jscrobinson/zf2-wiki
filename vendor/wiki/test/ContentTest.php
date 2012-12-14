<?php

namespace WikiTest\Model;

use Wiki\Model\Content;
use PHPUnit_Framework_TestCase;

class ContentTest extends PHPUnit_Framework_TestCase {

    public function testContentInitialState() {
        $content = new Content();

        $this->assertNull($content->id, '"id" should initially be null');
        $this->assertNull($content->title, '"title" should initially be null');
        $this->assertNull($content->content, '"content" should initially be null');
        $this->assertNull($content->created_at, '"created_at" should initially be null');
        $this->assertNull($content->updated_at, '"updated_at" should initially be null');
        $this->assertNull($content->created_by, '"created_by" should initially be null');
        $this->assertNull($content->updated_by, '"updated_by" should initially be null');
    }

    public function testExchangeArraySetsPropertiesCorrectly() {
        $content = new Content();
        $data = array(
            'id' => 123,
            'title' => 'Test Title',
            'content' => 'Test Content',
            'created_at' => date('c'),
            'updated_at' => date('c'),
            'created_by' => 23,
            'updated_by' => 12,
        );
        
        $content->exchangeArray($data);

        $this->assertSame($data['id'], $content->id, '"id" was not set correctly');
        $this->assertSame($data['title'], $content->title, '"title" was not set correctly');
        $this->assertSame($data['content'], $content->content, '"content" was not set correctly');
        $this->assertSame($data['created_at'], $content->created_at, '"created_at" was not set correctly');
        $this->assertSame($data['updated_at'], $content->updated_at, '"updated_at" was not set correctly');
        $this->assertSame($data['created_by'], $content->created_by, '"created_by" was not set correctly');
        $this->assertSame($data['updated_by'], $content->updated_by, '"updated_by" was not set correctly');
    }

    public function testExchangeArraySetsPropertiesToNullIfKeysAreNotPresent() {
        $content = new Content();

        $content->exchangeArray(array(
            'id' => 123,
            'title' => 'Test Title',
            'content' => 'Test Content',
            'created_at' => date('c'),
            'updated_at' => date('c'),
            'created_by' => 23,
            'updated_by' => 12,
        ));
        $content->exchangeArray(array());

        $this->assertNull($content->id, '"id" should have defaulted to null');
        $this->assertNull($content->title, '"title" should have defaulted to null');
        $this->assertNull($content->content, '"content" should have defaulted to null');
        $this->assertNull($content->created_at, '"created_at" should have defaulted to null');
        $this->assertNull($content->updated_at, '"updated_at" should have defaulted to null');
        $this->assertNull($content->created_by, '"created_by" should have defaulted to null');
        $this->assertNull($content->updated_by, '"updated_by" should have defaulted to null');
    }

}