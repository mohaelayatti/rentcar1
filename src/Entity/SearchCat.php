<?php

namespace App\Entity;

use phpDocumentor\Reflection\Types\Integer;

class SearchCat
{
    
    /**
     * @var integer
     */
    private $cat;

    
    public function getCat()
    {
        return $this->cat;
    }
    public function setCat($cat): self
    {
        $this->cat = $cat;
        return $this;
    }
}
