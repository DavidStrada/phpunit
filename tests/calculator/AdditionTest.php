<?php
declare(strict_types=1);

use App\Calculator\Addition;
use App\Calculator\Exceptions\NoOperandsException;
use Tests\TestCase;

class AdditionTest extends TestCase
{
    /**
     * @test
     */
    public function adds_up_given_operands()
    {
        $addition = new Addition;
        $addition->setOperands([2, 4, 6, 8]);
        $total = $addition->calculate();

        $this->assertEquals(20, $total);
    }

    /**
     * @test
     */
    public function no_operands_given_throw_exception()
    {
        $this->expectException(NoOperandsException::class);

        $addition = new Addition;
        $total = $addition->calculate();
    }

}
