<?php
declare(strict_types=1);

use App\Calculator\Addition;
use App\Calculator\Calculator;
use App\Calculator\Division;
use App\Calculator\Exceptions\NoOperandsException;
use Tests\TestCase;

class CalculatorTest extends TestCase
{

    /**
     * @test
     */
    public function can_set_single_operation()
    {
        $addition = new Addition;
        $addition->setOperands([2, 4, 6, 8]);

        $calculator = new Calculator;

        $calculator->setOperation($addition);

        $this->assertCount(1, $calculator->getOperations());
    }

    /**
     * @test
     */
    public function can_set_multiple_operations()
    {
        $addition1 = new Addition;
        $addition1->setOperands([2, 4, 6, 8]);

        $addition2 = new Addition;
        $addition2->setOperands([2, 4, 6, 8]);

        $calculator = new Calculator;

        $calculator->setOperations([$addition1, $addition2]);

        $this->assertCount(2, $calculator->getOperations());
    }

    /**
     * @test
     */
    public function operationsAreIgnoredIfNotInstanceOfOperationInterface()
    {
        $addition1 = new Addition;
        $addition1->setOperands([2, 4, 6, 8]);

        $calculator = new Calculator;

        $calculator->setOperations([$addition1, 'cat', 'dog']);

        $this->assertCount(1, $calculator->getOperations());
    }

    /**
     * @test
     */
    public function can_calculate_result()
    {
        $addition1 = new Addition;
        $addition1->setOperands([2, 4]);

        $calculator = new Calculator;

        $calculator->setOperation($addition1);

        $this->assertEquals(6, $calculator->calculate());
    }

    /**
     * @test
     */
    public function can_calculate_multiple_results()
    {
        $addition1 = new Addition;
        $addition1->setOperands([2, 4]);

        $addition2 = new Addition;
        $addition2->setOperands([6, 2]);

        $calculator = new Calculator;

        $calculator->setOperations([$addition1, $addition2]);

        $calculation = $calculator->calculate();

        $this->assertIsArray($calculation);
        $this->assertEquals(6, $calculation[0]);
        $this->assertEquals(8, $calculation[1]);

    }

}
