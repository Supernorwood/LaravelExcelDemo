<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\libs\FloridaBlue\ImportFB2018;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $inputFileName = storage_path() . '/app/uploads/FloridaBlueSalesExample.xls';

        $fmt = new ImportFB2018();
        $fmt->load($inputFileName);

        $this->assertTrue(true);
    }
}
