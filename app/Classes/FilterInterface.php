<?php
namespace Filter\Classes;

interface FilterInterface
{
    /**
     * @return mixed
     * This method gets the data from the form ,
     * and select from the table in the database by these parameters
     */
    public function filterData($currency,$country,$quantity);
}