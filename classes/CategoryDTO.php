<?php 
 require_once('BaseDTO.php');
class CategoryDTO extends BaseDTO
{
  private $name;
  private $code;

public function setName($value){
        $this->name = $value;
    }
   
	public function setCode($value){
        $this->code = $value;
    }
 
  public function getName()
  {
    return $this->name;
  }
  public function getCode()
  {
    return $this->code ;
  }
}
?>