<?php

abstract class HumanAbstract
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    abstract public function getGreetings(): string;
    abstract public function getMyNameIs(): string;

    public function introduceYourself(): string
    {
        return $this->getGreetings() . '! ' . $this->getMyNameIs() . ' ' . $this->getName() . '.';
    }
}

class RussianHuman extends HumanAbstract 
{
    public function getGreetings(): string
    {
        return 'Привет';
    }

    public function getMyNameIs(): string
    {
        return "Меня зовут";
    }
}

class EnglishHuman extends HumanAbstract 
{

    public function getGreetings():string
    {
        return 'Hello';
    }

    public function getMyNameIs():string
    {
        return 'My name is';
    }
}

$hi_ru = new RussianHuman('Максимка-любимка');
$print_ru = $hi_ru->introduceYourself();

$hi_en = new EnglishHuman('Maksimka-lover');
$print_en = $hi_en->introduceYourself();

echo $print_ru."<BR>";
echo $print_en."<BR>";