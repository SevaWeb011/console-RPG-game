<?php

namespace App\Model;

class Hero
{
    protected $health = 10;

    protected $power = 2;

    public function getHealth(): int
    {
        return $this->health;
    }

    public function getPower(): int
    {
        return $this->power;
    }

    public function setHealth(int $health): void
    {
        $this->health = $health;
    }

    public function hit(int $damage): void
    {
        $this->health = $this->health - $damage;
    }

    public function attackTo($person): void
    {
        $person->hit($this->getPower());
    }
}
