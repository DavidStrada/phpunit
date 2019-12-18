<?php
declare(strict_types=1);

use App\Calculator\Division;
use App\Calculator\Exceptions\NoOperandsException;
use Tests\TestCase;

class DivisionTest extends TestCase
{

    /**
     * @test
     */
    public function divides_up_given_operands()
    {
        $division = new Division;
        $division->setOperands([4, 2]);
        $total = $division->calculate();

        $this->assertEquals(2, $total);
    }

    /**
     * @test
     */
    public function no_operands_given_throw_exception()
    {
        $this->expectException(NoOperandsException::class);

        $addition = new Division;
        $total = $addition->calculate();
    }

    /**
     * @test
     */
    public function removes_division_by_zero_operands()
    {
       $division = new Division;
       $division->setOperands([10, 0, 0, 5, 0]);
       $total = $division->calculate();

       $this->assertEquals(2, $total);
    }

}
