<?php

require './../auto/vendor/autoload.php' ;

class AdvancedPrinter implements PrintOnly , PrintMachineInterface 
{

    public function print(){
        return 'regular print ...' ;
    }

    public function scan(){
        return 'scanning a document ...' ;
    }

    public function xerox(){
        return 'xerox print ...' ;
    }


}

