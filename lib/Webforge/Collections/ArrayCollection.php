<?php

namespace Webforge\Collections;

use Closure;
use Psc\Doctrine\Helper as DoctrineHelper;
use Doctrine\Common\Collections\Collection;

class ArrayCollection extends \Doctrine\Common\Collections\ArrayCollection implements Collection {
  
  /**
   * Reorders the collection with an callback comparison function
   * 
   * @param Closure $criteria function ($a, $b) should return 0 for equality of $a nd $b, 1 for $a greater than $b otherwise -1
   */
  public function sortBy($criteria) {
    if ($criteria instanceof Closure) {
      $elements = $this->getElements();
      usort($elements, $criteria);
      $this->setElements($elements);
    }

    return $this;
  }
  
  /**
   * Replaces all elements in the collection with the given elements
   */
  public function setElements(Array $elements) {
    // workaround doctrines private variable:
    $this->clear();
    foreach ($elements as $key=>$value) {
      $this->set($key, $value);
    }
    return $this;
  }
  
  /**
   * return array
   */
  public function getElements() {
    return $this->toArray();
  }
}
