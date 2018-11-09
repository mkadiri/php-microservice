<?php

namespace test\model;

use PHPUnit\Framework\TestCase;
use src\exception\TitleInvalidException;
use src\exception\UrlInvalidException;
use src\model\GifModel;

class GifModelTest extends TestCase
{
    public function testValidGifModel()
    {
        $gifModel = new GifModel('banana', 'http://gifapi.com/banana');

        $this->assertEquals('banana', ($gifModel)->getTitle());
        $this->assertEquals('http://gifapi.com/banana', ($gifModel)->getUrl());
    }

    public function testInvalidGifModelTitle()
    {
        $this->expectException(TitleInvalidException::class);
        new GifModel('', 'http://gifapi.com/banana');
     }

    public function testInvalidGifModelUrl()
    {
        $this->expectException(UrlInvalidException::class);
        new GifModel('banana', '');
    }
}
