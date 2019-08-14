<?php  namespace Manager;

class Gender
{

    public function getAll()
    {
        include( __DIR__ .'/../../config/config.php');

        return $config['gender'];
    }
}
