<?php
        namespace App\Entity;
       
  class DateSearch
        {

        /**
        * @var datetime | null
        */
           private $minDate;
        /**
        * @var datetime | null
        */
           private $maxDate;
        
   public function getMinDate()
   {
      return $this->minDate;
   }
   public function setMinDate(\DateTime $minDate): self
   {
      $this->minDate = $minDate;
      return $this;
   }
   
     public function getMaxDate()
   {
      return $this->maxDate;
   }
   public function setMaxDate(\DateTime $maxDate): self
   {
      $this->maxDate = $maxDate;
      return $this;
   }
  
        
   }