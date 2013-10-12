<?php

namespace Webforge\Collections;

class TraversableCollectionTest extends \Webforge\Code\Test\Base {
  
  public function setUp() {
    $this->chainClass = __NAMESPACE__ . '\\TraversableCollection';
    parent::setUp();

    $this->elements = array('a', 'b', 'c');
    $this->collection = new TraversableCollection($this->elements);
    $this->collectiono = new TraversableCollection((object) $this->elements);
  }

  public function testIteratesOverArrays() {
    $elements = array();

    foreach ($this->collection as $key=>$el) {
      $elements[$key] = $el;
    }

    $this->assertEquals($this->elements, $elements);
  }

  public function testIteratesOverObjects() {
    $elements = array();

    foreach ($this->collectiono as $key=>$el) {
      $elements[$key] = $el;
    }

    $this->assertEquals($this->elements, $elements);
  }
}
