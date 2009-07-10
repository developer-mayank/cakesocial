<?php
/**
 *
 *
 * @author Sardorbek Pulatov (pROCKramer)
 * @email : sardor90@gmail.com 
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
