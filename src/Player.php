<?php


namespace App;


class Player
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var
     */
    public $points;

    /**
     * Create a new player.
     *
     * @param  string  $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Add a point for the player.
     */
    public function score()
    {
        $this->points++;
    }

    /**
     * Convert the player's score to the Tennis term.
     *
     * @return string
     */
    public function toTerm()
    {
        switch ($this->points) {
            case 0:
                return 'love';
            case 1:
                return 'fifteen';
            case 2:
                return 'thirty';
            case 3:
                return 'forty';
        }
    }
}