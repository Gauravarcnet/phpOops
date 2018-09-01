<?php
class Bicycle{
    public const Categories = ['road','mountain','hybrid','cruiser','city','BMX'];
    public const Gender = ['mens','womens','unisex'];
    public $brand;
    public $model;
    public $year;
    public $category;
    public $color;
    public $description;
    public $gender;
    public $price;
    protected $weight_kg;
    protected $condition_id;
    protected const CONDITIONS_OPTIONS = [
        1 => 'Beat up',
        2 => 'Decent',
        3 => 'Good',  
        4 => 'Great',
        5 => 'Like new',
    ];
    // foreach ($args[] as $k => $v) {
    //     if(property_exists($this,$k)){
    //         $this->$k =$v;
    //     }
    // }

    public function __construct($args=[]){
        //echo $args['brand'];exit();
        $this->brand = $args['brand'] ?? '';
        $this->model = $args['model'] ?? '';
        $this->year = $args['year'] ?? '';
        $this->category = $args['category'] ?? '';
        $this->color = $args['color'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->gender = $args['gender'] ?? '';
        $this->price = $args['price'] ?? 0;
        $this->weight_kg = $args['weight_kg'] ?? 0.0;
        $this->condition_id = $args['condition_id'] ?? 3;

    }
    public function weight_kg(){
        return  number_format($this->weight_kg,2).'kg';
    }
    public function set_weight_kg($value){
        $this->weight_kg = floatval($value);
    }
    public function condition(){
        if($this->condition_id > 0){
            return self::CONDITIONS_OPTIONS[$this->condition_id];
        }else{
            return "Unknown";
        }
    }
    

 


}
$bicycle = new Bicycle();