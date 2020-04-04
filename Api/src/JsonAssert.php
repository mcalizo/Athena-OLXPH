<?php

/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 14/09/2017
 * Time: 11:47 AM
 */
namespace Tests\Api\src;

use Peekmo\JsonPath\JsonPath;

class JsonAssert extends \PHPUnit_Framework_Assert
{
    /** @var array */
    private $json;
    /**
     * @var JsonPath
     */
    private $jsonPath;

    private function __construct(array $json)
    {
        $this->json = $json;
        $this->jsonPath = new JsonPath();
    }

    public function assertJsonPathEquals($path, $value) {
        $match = $this->jsonPath->jsonPath($this->json, $path);
        if(sizeof($match) === 1) {
            $match = $match[0];
        }
        $this->assertEquals($value, $match,
            "asserting that $path === ".var_export($value, true)." in json: \n".json_encode($this->json, JSON_PRETTY_PRINT).". actually, $path was \n".json_encode($match, JSON_PRETTY_PRINT));
        return $this;
    }

    public function assertJsonPathPresent($path) {
        $this->assertNotEmpty($this->jsonPath->jsonPath($this->json, $path));
        return $this;
    }

    public static function from(array $json) {
        return new JsonAssert($json);
    }
}