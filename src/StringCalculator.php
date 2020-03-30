<?php

namespace App;

use Exception;

class StringCalculator
{
    const MAX_NUMBER_ALLOWED = 1000;

    protected $delimiter = ",|\n";

    public function add(string $numbers)
    {
        $this->disallowNegatives($numbers = $this->parseString($numbers));

        return array_sum(
            $this->ignoreGreaterThan1000($numbers)
        );
    }

    public function parseString(string $numbers): array
    {
        $customDelimiter = '\/\/(.)\n';

        if (preg_match("/{$customDelimiter}/", $numbers, $matches)) {
            $this->delimiter = $matches[1];

            $numbers = str_replace($matches[0], '', $numbers);
        }

        return preg_split("/{$this->delimiter}/", $numbers);
    }

    public function disallowNegatives(array $numbers): void
    {
        foreach ($numbers as $number) {
            if ($number < 0) {
                throw new Exception('Negative numbers are not allowed!');
            }
        }
    }

    public function ignoreGreaterThan1000(array $numbers): array
    {
        return array_filter($numbers, function ($number) {
            return $number <= self::MAX_NUMBER_ALLOWED;
        });
    }
}