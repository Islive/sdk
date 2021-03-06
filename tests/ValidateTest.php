<?php

/**
 * Created by PhpStorm.
 * User: andy
 * Date: 26-4-16
 * Time: 19:30
 */
class ValidateTest extends PHPUnit_Framework_TestCase
{
    private $testApiResult;

    private function setDummyData($name){
        $this->testApiResult = file_get_contents(dirname(__FILE__).'/dummyData/Validate/'.$name.'.json');
        $curl = new \Paynl\Curl\Dummy();
        $curl->setResult($this->testApiResult);
        \Paynl\Config::setCurl($curl);
    }

    public function testIsPayServerIpYes(){
        $this->setDummyData('isPayServerIpYes');
        $result = \Paynl\Validate::isPayServerIp('37.46.137.137');

        $this->assertEquals(true, $result);
    }
    public function testIsPayServerIpNo(){
        $this->setDummyData('isPayServerIpNo');

        $result = \Paynl\Validate::isPayServerIp('192.168.20.1');

        $this->assertEquals(false, $result);
    }
}