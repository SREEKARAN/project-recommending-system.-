<?php
class Product 
{   public $prod_id;
    public $name;
    public $category_id;
    public $image;
    public $price;
    public $brand;
    public function __construct()
    {echo "parent ";}
    public function __construct($param) 
        {
        include "dbconnect.php";
        $this->prod_id=$param;
        //$this->generateScript();
        $query="select category_id,brand,name,image,price from product where product_id = ".$this->prod_id."";
        $rslt=mysqli_query($con,$query);
           while($row=mysqli_fetch_row($rslt)) {
                $this->category_id=$row[0];
                $this->brand=$row[1];
                $this->name=$row[2];
                $this->image=$row[3];
                $this->price=$row[4];
                } 
        }
}

class FullProduct extends Product
{
    public function __construct()
    {
        parent::__construct();
    }
    public function generateScript()
        {
            echo "<script type='text/javascript'>
                function addCart(){ 
                    $.ajax({url: 'addToCart.php?prod_id=".$this->prod_id."' });
                    }
                function addWish(){ 
                    $.ajax({url: 'addToWish.php?prod_id=".$this->prod_id."' });
                    }
                function ck(){ 
                    $.ajax({url: 'start.php'});
                    }
                function end(){
                    $.ajax({url:'stop.php?prod_id=".$this->prod_id."'});
                    }
                window.unload=end();
                </script><body onload=ck();>";
        }
}

class Cart extends Product
{
    public function __construct()
    {
        parent::__construct();
    }
}

class Wishlist extends Product
{
    public function __construct()
    {
        parent::__construct();
    }
}
?>