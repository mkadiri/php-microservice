<?php

namespace test\service;

use PHPUnit\Framework\TestCase;
use src\model\GifModel;
use src\repository\GifRepository;
use src\service\GifFinderService;

class GifFinderServiceTest extends TestCase
{

    /** @Mock */
    private $gifRepository;

    public function setUp()
    {
        $this->gifRepository = $this->getMockBuilder(GifRepository::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testFind()
    {
        $gifModel = $this->getMockBuilder(GifModel::class)
            ->disableOriginalConstructor()
            ->getMock();

        $gifModel->expects($this->once())->method('getTitle')->will($this->returnValue('banana'));
        $gifModel->expects($this->once())->method('getUrl')->will($this->returnValue('http://gifapi.com/banana'));

        $gifModel2 = $this->getMockBuilder(GifModel::class)
            ->disableOriginalConstructor()
            ->getMock();

        $gifModel2->expects($this->once())->method('getTitle')->will($this->returnValue('blue banana'));
        $gifModel2->expects($this->once())->method('getUrl')->will($this->returnValue('http://gifapi.com/blue_banana'));

        $repositoryGifModels = [
            $gifModel,
            $gifModel2
        ];

        $this->gifRepository->expects($this->once())
            ->method('search')
            ->will($this->returnValue($repositoryGifModels));

        $gifs = (new GifFinderService($this->gifRepository))->find('banana');

        $returned = [
            [
                'title' => 'banana',
                'url' => 'http://gifapi.com/banana'
            ],
            [
                'title' => 'blue banana',
                'url' => 'http://gifapi.com/blue_banana'
            ]
        ];

        $this->assertEquals($returned, $gifs);
    }
}