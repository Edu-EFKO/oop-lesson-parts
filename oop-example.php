<?php

class Chair
{

}

class Table
{

}

$firstChair = new Chair();

$secondChair = new Chair();

var_dump($firstChair);

var_dump($secondChair);

var_dump($firstChair === $secondChair);

$firstTable = new Table();

$secondTable = new Table();

var_dump($firstChair);

var_dump($secondChair);

var_dump($firstTable === $secondTable);