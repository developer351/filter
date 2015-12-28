<?php
interface ConnectInterface
{
    /**
     *  use for create connection for mysql database
     */
    public function connect();
    /**
     * this method to close the connection
     */
    public function closeConnect();
}