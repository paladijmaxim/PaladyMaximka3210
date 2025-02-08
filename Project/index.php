<?php
    class Cat {
        private $name;
        public $color;
        public $weight;


        function __construct(string $name, string $color, int $weight) {
            $this->name = $name;
            $this->color = $name;
            $this->weight = $weight;
        }
        function setName(string $name) {
            $this->name = $name;
        }
        function getName() {
            return $this-> name;
        }
    }

    $cat1 = new Cat('murka', 'black', 3);

    // $cat2 = new Cat;
    //$cat1->setName('barsik');
    //$cat2->setName('tishka');
    //$cat1->color = 'grey';
    //$cat1->weight = 7;
    echo $cat1->getName().'<BR>';
   // echo $cat2->getName().'<BR>';
    var_dump($cat1);
