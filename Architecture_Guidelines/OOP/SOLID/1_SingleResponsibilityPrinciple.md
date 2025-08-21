# 📖 Single-responsibility Principle (SRP)

> **Definition**:  
> A class should have only one reason to change, meaning it should only have one job.

---

## ❌ Bad Example (Without SRP)

### Problem
In this design, the AreaCalculator is doing too many things:
- Knows how to calculate the area of every shape.
- Handles **output formatting** (HTML).
```php
class Square {
    public $length;
    public function __construct($length) { $this->length = $length; }
}

class Circle {
    public $radius;
    public function __construct($radius) { $this->radius = $radius; }
}

class AreaCalculator {
    protected $shapes;

    public function __construct($shapes = []) {
        $this->shapes = $shapes;
    }

    public function sum() {
        $area = [];
        foreach ($this->shapes as $shape) {
            if (is_a($shape, 'Square')) {
                $area[] = pow($shape->length, 2);
            } elseif (is_a($shape, 'Circle')) {
                $area[] = pi() * pow($shape->radius, 2);
            }
        }
        return array_sum($area);
    }

    public function output() {
        return "Sum of areas: " . $this->sum();
    }
}

$shapes = [ new Circle(2), new Square(5), new Square(6) ];
$areas = new AreaCalculator($shapes);
echo $areas->output();
```

### 🚨 Problems:
If we add a new shape (e.g., Triangle), we must modify AreaCalculator.
- It also mixes business logic (calculation) with presentation (output).
- Multiple reasons to change → violates SRP.

---

## ✅ Good Example (With SRP)
### Solution
Each class has one clear responsibility:
- Shapes → know how to calculate their own area.
- AreaCalculator → sums up the areas.
- SumCalculatorOutputter → handles output formatting.
```php
class Square {
    public $length;
    public function __construct($length) { $this->length = $length; }
    public function area() { return pow($this->length, 2); }
}

class Circle {
    public $radius;
    public function __construct($radius) { $this->radius = $radius; }
    public function area() { return pi() * pow($this->radius, 2); }
}

class AreaCalculator {
    protected $shapes;
    public function __construct($shapes = []) { $this->shapes = $shapes; }
    public function sum() {
        $area = [];
        foreach ($this->shapes as $shape) {
            $area[] = $shape->area();
        }
        return array_sum($area);
    }
}

class SumCalculatorOutputter {
    protected $calculator;
    public function __construct(AreaCalculator $calculator) {
        $this->calculator = $calculator;
    }
    public function JSON() {
        return json_encode(['sum' => $this->calculator->sum()]);
    }
    public function HTML() {
        return "Sum of areas: " . $this->calculator->sum();
    }
}

$shapes = [ new Circle(2), new Square(5), new Square(6) ];
$areas = new AreaCalculator($shapes);
$output = new SumCalculatorOutputter($areas);

echo $output->JSON();
echo $output->HTML();
```

## 🎯 Benefits of SRP
- Adding a new shape → only requires creating a new class with area().
- AreaCalculator → only responsible for summing.
- SumCalculatorOutputter → only responsible for formatting.
- Each class has exactly one reason to change.

---

## 📌 Summary
- **❌ Bad design:** AreaCalculator mixes calculation + presentation → multiple responsibilities.
- **✅ Good design:** 
  - Shapes know their own area.
  - AreaCalculator → sums areas.
  - SumCalculatorOutputter → outputs results.

## ➡️ This separation ensures clean, maintainable, and extendable code following the Single-Responsibility Principle.