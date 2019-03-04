<?php

namespace App;

// use App\Model\Foo;
use Illuminate\Database\Eloquent\Model;



class Example extends Model
{
    protected $foo;

    public function construct(Foo $foo) {
        $this->foo = $foo;
    }
}
