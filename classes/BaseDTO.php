<?php 
	
class BaseDTO
{
  private $id;
  private $createdDate;
  private $modifiedDate;
  private $createdBy;
  private $modifiedBy;
  
  public function getId()
  {
    return $this->id;
  }
 public function setId($value){
        $this->id = $value;
    }

    public function getCreatedDate()
  {
    return $this->createdDate;
  }
 public function setCreatedDate($value){
        $this->createdDate = $value;
    }

   public function getCreatedBy()
  {
    return $this->createdBy;
  }
 public function setCreatedBy($value){
        $this->createdBy = $value;
    }
  
  
}
?>
