<?php
declare(strict_types=1);

use App\Support\Collection;
use Tests\TestCase;

class CollectionTest extends TestCase
{

    public function test_empty_instanctiated_collection_returns_no_items()
    {
        $collection = new Collection;
        $this->assertEmpty($collection->get());
    }

    public function test_count_is_correc_for_items_passed_in()
    {
        $collection = new Collection(['one', 'two']);
        $this->assertCount(2, $collection);
    }

    public function test_items_return_match_items_passed_in()
    {
        $collection = new Collection(['one', 'thow', 'three']);
        $this->assertCount(3, $collection);
        $this->assertEquals($collection->get()[0], 'one');
        $this->assertEquals($collection->get()[1], 'thow');
        $this->assertEquals($collection->get()[2], 'three');
    }

    /**
     * @test
     */
    public function collection_is_instance_of_iterator_aggregate()
    {
        $collection = new Collection();
        $this->assertInstanceOf(IteratorAggregate::class, $collection);
    }


    /**
     * @test
     */

    public function collection_can_be_iterated()
    {
        $collection = new Collection(['one', 'two']);

        $items = [];

        foreach ($collection as $item) {
            $items[]= $item;
        }

        $this->assertCount(2, $items);
        $this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
    }

    /**
     * @test
     */
    public function collection_can_be_merged_with_another_collection()
    {
        $collection1 = new Collection(['one', 'two']);
        $collection2 = new Collection(['three', 'four', 'five']);

        $collection1->merge($collection2);

        $this->assertCount(5, $collection1);
        $this->assertEquals(5, $collection1->count());
    }

    /**
     * @test
     */
    public function can_add_to_existing_collection()
    {
        $collection = new Collection(['one', 'two']);

        $collection->add(['three', 'four']);

        $this->assertCount(4, $collection);
        $this->assertEquals(4, $collection->count());
    }

    /**
     * @test
     */
    public function can_transform_data_to_json()
    {
        $collection = new Collection([
            ['username' => 'json'],
            ['username' => 'billy']
        ]);

        $json = $collection->toJson();

        $this->assertJson($json);
        $this->assertEquals('[{"username":"json"},{"username":"billy"}]', $json);
        $this->assertIsString($json);
    }

    /** @test */
    public function json_encoding_a_colection_object_returns_json()
    {
        $collection = new Collection([
            ['username' => 'json'],
            ['username' => 'billy']
        ]);

        $encode = json_encode($collection);

        $this->assertJson($encode);
        $this->assertEquals('[{"username":"json"},{"username":"billy"}]', $encode);
        $this->assertIsString($encode);
    }

}
