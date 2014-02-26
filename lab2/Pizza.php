<?php

/**
 * Created by PhpStorm.
 * User: dragos
 * Date: 2/26/14
 * Time: 10:56 PM
 */
class Pizza {

    public $cheeses = 0;
    public $vegetables = 0;
    public $meats = 0;

    protected $ingredients = array();

    protected function addIngredient($ingredient, $price) {
        if (!isset($this->ingredients[$ingredient]))
            $this->ingredients[$ingredient] = array('qty' => 1, 'price' => $price);
        else {
            ++$this->ingredients[$ingredient]['qty'];
        }
    }

    public function getIngredients() {
        return $this->ingredients;
    }

    public function withFeta() {
        ++$this->cheeses;
        $this->addIngredient('feta', 3);
        return $this;
    }

    public function withParmesan() {
        ++$this->cheeses;
        $this->addIngredient('parmesan', 2.50);
        return $this;
    }

    public function withMozarella() {
        ++$this->cheeses;
        $this->addIngredient('mozarella', 1.75);
        return $this;
    }

    public function withDorBlue() {
        ++$this->cheeses;
        $this->addIngredient('dor-blue', 3.25);
        return $this;
    }

    public function withEdam() {
        ++$this->cheeses;
        $this->addIngredient('edam', 3);
        return $this;
    }

    public function withBranza() {
        ++$this->cheeses;
        $this->addIngredient('branza', 1);
        return $this;
    }

    public function withBacon() {
        ++$this->meats;
        $this->addIngredient('bacon', 5);
        return $this;
    }

    public function withProsciutto() {
        ++$this->meats;
        $this->addIngredient('prosciutto', 7);
        return $this;
    }

    public function withSalami() {
        ++$this->meats;
        $this->addIngredient('salami', 3.50);
        return $this;
    }

    public function withChickenBreast() {
        ++$this->meats;
        $this->addIngredient('chicken-breast', 2.50);
        return $this;
    }

    public function withHam() {
        ++$this->meats;
        $this->addIngredient('ham', 4.50);
        return $this;
    }

    public function withFreshMushrooms() {
        ++$this->vegetables;
        $this->addIngredient('fresh-mushrooms', 0.50);
        return $this;
    }

    public function withSmokedMushrooms() {
        ++$this->vegetables;
        $this->addIngredient('smoked-mushrooms', 1.50);
        return $this;
    }

    public function withRedOnion() {
        ++$this->vegetables;
        $this->addIngredient('red-onion', 0.25);
        return $this;
    }

    public function withTomatoes() {
        ++$this->vegetables;
        $this->addIngredient('tomatoes', 0.50);
        return $this;
    }

    public function withGarlic() {
        ++$this->vegetables;
        $this->addIngredient('garlic', 0.15);
        return $this;
    }

    public function withRucola() {
        ++$this->vegetables;
        $this->addIngredient('rucola', 0.50);
        return $this;
    }

    public function withCorn() {
        ++$this->vegetables;
        $this->addIngredient('corn', 0.30);
        return $this;
    }

    public function withChiliPepper() {
        ++$this->vegetables;
        $this->addIngredient('chili-pepper', 0.50);
        return $this;
    }

} 