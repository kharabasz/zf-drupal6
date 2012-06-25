<?php

class Y_DbAdapter_Drupal extends Zend_Db_Adapter_Mysqli
{
    protected function _connect()
    {
        global $active_db;

        if($this->_connection)
        {
            return;
        }

        if(!is_null($active_db))
        {
            $this->_connection = $active_db;
            return;
        }

        parent::_connect();
    }
}