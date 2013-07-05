<?php

namespace Webforge\Collections;

class ArrayCollectionTest extends \Webforge\Code\Test\Base {
  
  public function setUp() {
    $this->chainClass = 'Webforge\\Collections\\ArrayCollection';
    parent::setUp();

    $this->collection = new ArrayCollection(array(1,2,4,3));
  }

  public function testItImplementsTheDoctrineCollectionInterface() {
    $this->assertInstanceOf('\Doctrine\Common\Collections\Collection', $this->collection);
  }

  public function testGetElementsIsAliasOfToArray() {
    $this->assertEquals(
      $this->collection->getElements(),
      $this->collection->toArray()
    );
  }

  public function testSetElementsReplacesTheElementsIntheCollection() {
    $values = range(1,8);
    $this->assertEquals(
      new ArrayCollection($values),
      $this->collection->setElements($values)
    );
  }

  public function testSortCanBeCalledWithAnComparisonCallbackThatReordersTheElementsIntheCollection() {
    $this->collection->sortBy(function ($a, $b) {
      return strcmp($a,$b);
    });
    
    $this->assertEquals(
      array(1,2,3,4),
      $this->collection->getElements()
    );
  }
}
