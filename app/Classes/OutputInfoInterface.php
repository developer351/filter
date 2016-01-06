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
    public function saveJson();
}