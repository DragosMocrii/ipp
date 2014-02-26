<?php

require '../Pizza.php';

class PizzaTest extends PHPUnit_Framework_TestCase {
    public function testAddIngredient() {
        $pizza = new Pizza();

        $this->assertEquals(0, count($pizza->getIngredients()));

        $pizza->withFeta()->withBacon()->withBranza()->withChickenBreast()->withCorn()->withEdam();

        $sum = 0;
        foreach ($pizza->getIngredients() as $_ingredient) {
            $sum += $_ingredient['qty'] * $_ingredient['price'];
        }
        $this->assertEquals(14.80, $sum);

        $this->assertEquals(3, $pizza->cheeses);
    }

    public function testAddIngredientReturnPizzaInstance() {
        $pizza_reflection = new ReflectionClass('Pizza');
        $pizza = new Pizza();

        foreach ($pizza_reflection->getMethods() as $_method) {
            if (substr($_method->name, 0, 4) === 'with') {
                $this->assertInstanceOf('Pizza', $pizza->{$_method->name}());
            }
        }

    }

    public function testDoubleAddIngredient() {
        $pizza = new Pizza();

        $pizza->withEdam()->withEdam();
        $this->assertEquals(2, $pizza->getIngredients()['edam']['qty']);
    }
}