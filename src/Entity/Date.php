<?php

namespace App\Entity;

class Date
{

    /**
     * @var datetime | null
     */
    private $date;
    
    public function getDate()
    {
        return $this->date;
    }
    public function setDate(\DateTime $date): self
    {
        $this->date = $date;
        return $this;
    }

  
}
