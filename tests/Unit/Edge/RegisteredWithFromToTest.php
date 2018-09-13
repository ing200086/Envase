<?php

namespace Ing200086\GraphCore\Tests\Unit\Edge;

use Ing200086\GraphCore\Edge\EdgeDirectionEnum;
use Ing200086\GraphCore\Edge\Registered;


/**
 * Class RegisteredTest
 *
 * @package Ing200086\GraphCore\Tests\Unit\Edge
 *
 */
class RegisteredWithFromToTest extends TestCase {
    /** @test */
    public function it_can_return_if_it_contains_a_vertex()
    {
        $suspect = $this->mockVertex($this->graph, 0);

        $this->assertTrue($this->edge->contains($suspect));
    }

    /** @test */
    public function it_can_test_if_edge_allows_entry_to_vertex()
    {
        $this->assertFalse($this->edge->providesEntryTo($this->source));
        $this->assertTrue($this->edge->providesEntryTo($this->destination));
    }

    /** @test */
    public function it_can_test_if_edge_allows_exit_from_vertex()
    {
        $this->assertTrue($this->edge->providesExitTo($this->source));
        $this->assertFalse($this->edge->providesExitTo($this->destination));
    }

    protected function generateArticle()
    {
        return Registered::CreateDirectedFromTo($this->source, $this->destination);
    }
}