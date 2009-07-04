<?php
/**
 *
 *
 * @author pROCKrammer
 * @email prockrammer@ya.ru
 */
    class AdminController extends AppController
    {
        var $name = "Admin";
        var $uses = array("Users");

        function beforeFilter()
        {
            parent::beforeFilter();
            $this -> Auth -> deny ();
        }
    }
?>
