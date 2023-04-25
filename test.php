<?php $array = array('fruit1' => 'apple', 'fruit2' => 'orange', 'fruit3' => 'grape', 'fruit4' => 'apple');
//thiscycleechoesallassociativearray
//keywherevalueequals"apple"
while ($fruit_name = current($array)) {
    if ($fruit_name == 'apple') {
        echo key($array) . '<br/>';
    }
    next($array);
} 

class Car {
public $comp;
public $color = 'white';
public $hasSunRoof= true;
public function hello() {
return "beep"; }
}
$bmw= new Car ();
$mercedes= new Car ();
echo $bmw-> hello();
echo $mercedes-> hello();
?>
<?php

class StaffMember
{

    private $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    private $office;
    private $rank;
    private $email;
}
?>
