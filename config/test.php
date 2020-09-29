<?php

class A {
    private $_name = 'A';

    function _construct(){
        echo 'A construct'."\n";
    }

    function test(){
        echo 'A test()'."\n";
    }
}
class B extends A
{
    private $_name = 'B';

    function _construct() 
    {
        parent::__construct();
        echo 'B construct'."\n";
    }

    function test()
    {
        echo 'B test()';
    }
}

A::test();

echo '#########'."\n";
B::test();