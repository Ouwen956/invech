<?php

namespace bong\service\auth;

use bong\foundation\Str;

class Recaller
{
    protected $recaller;

    public function __construct($recaller)
    {
        $this->recaller = $recaller;
    }

    public function id()
    {
        return explode('|', $this->recaller, 2)[0];
    }

    public function token()
    {
        return explode('|', $this->recaller, 2)[1];
    }

    public function valid()
    {
        return $this->properString() && $this->hasAllSegments();
    }

    protected function properString()
    {
        return is_string($this->recaller) && Str::contains($this->recaller, '|');
    }


    protected function hasAllSegments()
    {
        $segments = explode('|', $this->recaller);

        return count($segments) == 2 && trim($segments[0]) !== '';
    }
}
