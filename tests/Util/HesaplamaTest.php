<?php

namespace App\tests\Util;

use App\Util\Hesaplama;
use PHPUnit\Framework\TestCase;

class HesaplamaTest extends TestCase
{
    public function testCarp(){
        $hesaplama = new Hesaplama();
        $sonuc = $hesaplama->carp(4,8);

        //sonuc karsilastirmasi
        $this->assertEquals(32, $sonuc);
    }

}