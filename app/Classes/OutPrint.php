<?php
/**
 * Created by PhpStorm.
 * User: bulatov
 * Date: 21.01.2016
 * Time: 8:49
 */

namespace Filter\Classes;


class OutPrint implements OutInterface {

    /**
     * this method printing result on display
     * @return array
     */
    public function showResult()
    {
        $data = [1,1,1,1,1,1,1,1,1];
        print_r($data);
      /*  foreach ($data as $item) {
            echo "<pre>";
            print_r($item);
            echo "</pre>";
        }*/
    }

}