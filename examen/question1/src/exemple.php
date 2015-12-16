<?php

class MyClass
{
    /**
     * @var string
     */
    private $test = 'quelquechose';

    /**
     * @return string
     */
    protected function getTest()
    {
        return $this->test;
    }
}

class MyClassExtended extends MyClass
{
    /**
     * @return string
     */
    public function getMyHiddenTest()
    {
        return $this->getTest();
    }
}

$myClassExtended = new MyClassExtended();

echo $myClassExtended->getMyHiddenTest();
