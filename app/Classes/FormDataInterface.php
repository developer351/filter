<?php
namespace Filter\Classes;

interface FormDataInterface
{
    /**
     * method for getting all countries
     */
    public function getCountries();

    /**
     * method for getting all countries
     */
    public function getCurrensies();

    /**
     * method to get the data from the form
     */
    public function getFormRequest();
}