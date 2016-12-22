<?php
/**
 * Copyright: (c) i2o3d Holdings Limited, 2013 - 2014
 *
 * Description: << fill in here >>
 * Project: php-gitlab-api
 * User: john
 * Date: 22/12/2016
 */

namespace Gitlab\Tests\Api;


/**
 * Class ServicesApiTest
 *
 * @package Gitlab\Tests\Api
 */
class ServicesApiTest extends ApiTestCase
{
    /**
     * @test
     */
    public function shouldGetSlackService()
    {
        $expectedArray = $this->getSlackData();

        $api = $this->getServicesSlackMock('projects/1/services/slack', $expectedArray);

        $this->assertEquals($expectedArray, $api->read(1, 'slack'));
    }

    /**
     * @test
     */
    public function shouldDeleteSlackService()
    {
        $api = $this->getServicesDeleteSlackMock('projects/1/services/slack');

        $this->assertTrue($api->remove(1, 'slack'));
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return 'Gitlab\Api\Services';
    }

    /**
     * @return array
     */
    protected function getSlackData()
    {
        return array(
            'webhook' => 'https://hooks.slack.com/services/...',
        );
    }

    /**
     * @param $string
     * @param $expectedArray
     *
     * @return mixed|\PHPUnit_Framework_MockObject_MockObject
     */
    protected function getServicesSlackMock($string, $expectedArray)
    {
        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('get')
            ->with($string)
            ->will($this->returnValue($expectedArray));

        return $api;
    }

    /**
     * @param $string
     *
     * @return mixed|\PHPUnit_Framework_MockObject_MockObject
     */
    private function getServicesDeleteSlackMock($string)
    {
        $expectedBool = true;

        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('delete')
            ->with($string)
            ->will($this->returnValue($expectedBool));

        return $api;
    }
}