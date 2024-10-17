<?php

namespace App\Enums;

enum UrlPlan: string
{
    case FREE = 'Free';
    case STARTER = 'Starter';
    case PRO = 'Pro';
    case ENTERPRISE = 'Enterprise';

    public function redirectCount(): int|float
    {
        return match ($this) {
            UrlPlan::FREE => 10,
            UrlPlan::STARTER => 100,
            UrlPlan::PRO => 10000,
            UrlPlan::ENTERPRISE => 999999999999999999999999999, // unlimited
        };
    }

    public function price(): int
    {
        return match ($this) {
            UrlPlan::FREE => 0,
            UrlPlan::STARTER => 1,
            UrlPlan::PRO => 2,
            UrlPlan::ENTERPRISE => 5,
        };
    }

    public function ipCount(): int|float
    {
        return match ($this) {
            UrlPlan::FREE => 0,
            UrlPlan::STARTER => 5,
            UrlPlan::PRO => 20,
            UrlPlan::ENTERPRISE => 999999999999999999999999999, // unlimited
        };
    }

    public function reporting(): bool
    {
        return match ($this) {
            UrlPlan::FREE => false,
            UrlPlan::STARTER => false,
            UrlPlan::PRO => false,
            UrlPlan::ENTERPRISE => true,
        };
    }
}
