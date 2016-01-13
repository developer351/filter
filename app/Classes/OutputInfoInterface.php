<?php
namespace Filter\Classes;

interface OutputInfoInterface
{
    /**
     * @return mixed
     *
     * show the display
     */
    public function printData($data);

    /**
     * this method save json
     */
    public function saveJson($data);

    /**
     * @return mixed
     *
     * this method saved data in xml file
     */
    public function saveXml($data);
}