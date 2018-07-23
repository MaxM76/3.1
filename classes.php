<?php

function getPriceFromSupplier()
{
    echo 'Посылаем запрос поставщику';
    return 0;
}

function getDimentionsFromSupplier()
{
    echo 'Посылаем запрос поставщику';
    return ["length" => 100, "width" => 50, "height" => 30];
}

function getGrossWeightFromSupplier()
{
    echo 'Посылаем запрос поставщику';
    return 1000;
}

function orderAutoVehicle($color, $fuelType, $capacity, $loadCapacity)
{
    echo 'Заказываем у поставщика';
    return true;
}


function orderBallpointPen($colorsNmb, $colors)
{
    echo 'Заказываем у поставщика';
    return true;
}

function orderDuck($breed, $age, $sex)
{
    echo 'Заказываем у поставщика';
    return true;
}

function orderTVSet($color, $screenSize, $tuners)
{
    echo 'Заказываем у поставщика';
    return true;
}


class GoodsClass
{
    private $dimentions = ["length" => 0, "width" => 0, "height" => 0];
    private $netWeight = 0;
    private $grossWeight = 0;
    private $purchasePrice = 0;
    private $price = 0;
    private $discount = 0;
    private $status = "absent";
    protected $category;
    private $name;
    private $description;

    public function __construct($category, $name, $netWeight, $description)
    {
        $this->category = $category;
        $this->name = $name;
        $this->netWeight = $netWeight;
        $this->description = $name;
        echo 'Goods constructed';
    }

    public function __destruct()
    {
        echo 'Goods destructed';
    }

    public function getDimentions()
    {
        return $this->dimentions;
    }

    public function getNetWeight()
    {
        return $this->netWeight;
    }

    public function getGrossWeight()
    {
        return $this->grossWeight;
    }

    public function getPurchasePrice()
    {
        return $this->purchasePrice;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getDiscount()
    {
        return $this->discount;
    }

    public function getSellingPrice()
    {
        return $this->price * (100 - $this->getDiscount());
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getDiscription()
    {
        return $this->description;
    }

    public function bue()
    {
        echo 'Закупаем товар';
        $this->status = "in stock";
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    public function setDiscription($description)
    {
        $this->discription = $description;
    }

    public function sell()
    {
        echo 'Продаем товар';
        $this->status = "sold";
    }

    public function order()
    {
        echo 'Заказываем у поставщика, получаем закупочную цену и характеристики';
        $this->purchasePrice = getPriceFromSupplier();
        $this->dimentions = getDimentionsFromSupplier();
        $this->grossWeight = getGrossWeightFromSupplier();
        $this->status = "ordered";
    }

    public function showInfo()
    {
        echo $this->name . PHP_EOL;
        echo 'category ' . $this->category . PHP_EOL;
        echo 'discription: ' . $this->description . PHP_EOL;
        echo 'length ' . $this->dimentions["length"] . PHP_EOL;
        echo 'width ' . $this->dimentions["width"] . PHP_EOL;
        echo 'height ' . $this->dimentions["height"] . PHP_EOL;
        echo 'netWeight ' . $this->netWeight;
        echo 'grossWeight ' . $this->grossWeight;
        echo 'price ' . $this->price;
        echo 'discount ' . $this->discount;
        echo 'status ' . $this->status;
        echo 'SellingPrice ' . $this->getSellingPrice();
    }
}


class AutoVehicleClass extends GoodsClass
{
    private $brand;
    private $model;
    private $type;
    private $color = "invisible";
    private $fuelType = "none";
    private $capacity = 0;
    private $loadCapacity = 0;

    public function __construct($netWeight, $description, $brand, $model, $type)
    {
        parent::__construct('AutoVehicle', $brand . $model, $netWeight, $description);
        $this->brand = $brand;
        $this->model = $model;
        $this->type = $type;
        echo 'AutoVehicle constructed';
    }

    public function order($color, $fuelType, $capacity, $loadCapacity)
    {
        parent::order();
        if (orderAutoVehicle($color, $fuelType, $capacity, $loadCapacity)) {
            $this->color = $color;
            $this->fuelType = $fuelType;
            $this->capacity = $capacity;
            $this->loadCapacity = $loadCapacity;
        }
    }
}


class BallpointPenClass extends GoodsClass
{
    private $brand;
    private $model;
    private $type;
    private $colorsNmb = 0;
    private $colors = ['invisible'];

    public function __construct($netWeight, $description, $brand, $model, $type)
    {
        parent::__construct('BallpointPen', $brand . $model, $netWeight, $description);
        $this->brand = $brand;
        $this->model = $model;
        $this->type = $type;
        echo 'BallpointPen constructed';
    }

    public function order($colors, $colorsNmb)
    {
        parent::order();
        if (orderBallpointPen($colorsNmb, $colors)) {
            $this->colors = $colors;
            $this->colorsNmb = $colorsNmb;
        }
    }

}


class DuckClass extends GoodsClass
{
    private $breed;
    private $age;
    private $sex;

    public function __construct($name, $netWeight, $description)
    {
        parent::__construct('Domestic cattle', $name, $netWeight, $description);
        echo 'Duck constructed';
    }

    public function order($breed, $age, $sex)
    {
        parent::order();
        if (orderDuck($breed, $age, $sex)) {
            $this->breed = $breed;
            $this->age = $age;
            $this->sex = $sex;
        }
    }

}

class TVSetClass extends GoodsClass
{
    private $brand;
    private $model;
    private $type;
    private $color;
    private $screenSize;
    private $tuners;

    public function __construct($netWeight, $description, $brand, $model, $type)
    {
        parent::__construct('TVSet', $brand . $model, $netWeight, $description);
        $this->brand = $brand;
        $this->model = $model;
        $this->type = $type;
        echo 'TVSet constructed';
    }

    public function order($color, $screenSize, $tuners)
    {
        parent::order();
        if (orderTVSet($color, $screenSize, $tuners)) {
            $this->color = $color;
            $this->screenSize = $screenSize;
            $this->tuners = $tuners;
        }
    }
}

$sorento = new AutoVehicleClass(1650, 'bla-bla-bla', 'KIA', 'Sorento', 'diesel');
$lancer = new AutoVehicleClass(1350, 'bla-bla-bla', 'Mitsibishi', 'Lancer', 'gasoline');
$parker = new BallpointPenClass(0.5, 'bla-bla-bla', 'Parker', 'pp-105-98', 'ink-pen');
$nonamePen = new BallpointPenClass(0.0, 'bla-bla-bla', 'noname', '', 'gel-pen');
$pekinDuck = new DuckClass('Пекинская утка', 1.3, 'bla-bla-bla');
$indoDuck = new DuckClass('Индоутка', 1.1, 'bla-bla-bla');
$appleTV = new TVSetClass (17.5, 'bla-bla-bla', 'Apple', '5554gfdd-789', 'LCD');
$Horizont = new TVSetClass(30.5, 'bla-bla-bla', 'Horizont', '1656984-788', 'vintage TV');