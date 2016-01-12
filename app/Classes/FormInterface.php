<?php
namespace Filter\Classes;

interface FormInterface
{
    /**
     * @return mixed
     *
     * this method getting data from form and send it in database
     */
    public function getFormData();
}