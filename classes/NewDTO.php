<?php 
require_once('BaseDTO.php');
class NewDTO extends BaseDTO
{
  private $title;
  private $thumbnail;
  private $shortDescription;
  private $content;
  private $viewCount;
  private $likeNew;
  private $commentCount;

	public function setTitle($value){
        $this->title = $value;
    }
    public function setThumbnail($value){
        $this->thumbnail = $value;
    }
	public function setShortDescription($value){
        $this->shortDescription = $value;
    }
	public function setContent($value){
        $this->content = $value;
    }
    	public function setView($value){
        $this->viewCount = $value;
    }
    	public function setLike($value){
        $this->likeNew = $value;
    }
    	public function setComment($value){
        $this->commentCount = $value;
    }
  
  public function getTitle()
  {
    return $this->title;
  }
 
  public function getThumbnail()
  {
    return  $this->thumbnail;
  }
 
  public function getContent()
  {
    return $this->content;
  }
  public function getShortDes()
  {
    return $this->shortDescription ;
  }
  public function getView()
  {
    return $this->viewCount ;
  }
  public function getLike()
  {
    return $this->likeNew ;
  }
  public function getComment()
  {
    return $this->commentCount ;
  }
}
?>