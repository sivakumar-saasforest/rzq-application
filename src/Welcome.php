<?php

namespace RzqApplication\Plugin;

class Welcome
{
    public function greet(String $sName)
    {
        return 'Hi ' . $sName . '! How are you doing today?';
    }
}
