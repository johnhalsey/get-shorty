<?php

namespace Tests\Unit\Enums;

use App\Enums\UrlPlan;
use PHPUnit\Framework\TestCase;

class UrlPlanTest extends TestCase
{
    public function test_it_can_get_the_plan_rediect_count()
    {
        $plan = UrlPlan::FREE;
        $this->assertEquals(10, $plan->redirectCount());

        $plan = UrlPlan::STARTER;
        $this->assertEquals(100, $plan->redirectCount());

        $plan = UrlPlan::PRO;
        $this->assertEquals(10000, $plan->redirectCount());

        $plan = UrlPlan::ENTERPRISE;
        $this->assertEquals(999999999999999999999999999, $plan->redirectCount());
    }

    public function test_it_can_get_the_price()
    {
        $plan = UrlPlan::FREE;
        $this->assertEquals(0, $plan->price());

        $plan = UrlPlan::STARTER;
        $this->assertEquals(1, $plan->price());

        $plan = UrlPlan::PRO;
        $this->assertEquals(2, $plan->price());

        $plan = UrlPlan::ENTERPRISE;
        $this->assertEquals(5, $plan->price());
    }

    public function test_it_can_get_ip_count()
    {
        $plan = UrlPlan::FREE;
        $this->assertEquals(0, $plan->ipCount());

        $plan = UrlPlan::STARTER;
        $this->assertEquals(5, $plan->ipCount());

        $plan = UrlPlan::PRO;
        $this->assertEquals(20, $plan->ipCount());

        $plan = UrlPlan::ENTERPRISE;
        $this->assertEquals(999999999999999999999999999, $plan->ipCount());
    }

    public function test_it_can_get_reporting()
    {
        $plan = UrlPlan::FREE;
        $this->assertFalse($plan->reporting());

        $plan = UrlPlan::STARTER;
        $this->assertFalse($plan->reporting());

        $plan = UrlPlan::PRO;
        $this->assertFalse($plan->reporting());

        $plan = UrlPlan::ENTERPRISE;
        $this->assertTrue($plan->reporting());
    }
}
