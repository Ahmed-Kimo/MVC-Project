<?php

require './../auto/vendor/autoload.php' ;


class SimplePrinter implements PrintOnly
{

    public function print(){
        return 'regular print ...' ;
    }


}