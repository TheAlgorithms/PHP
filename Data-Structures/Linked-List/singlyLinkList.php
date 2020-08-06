<?php

class Node{
    public $val;
    public $next;
    public function __construct($val)
    {
        $this->val=$val;
        $this->next=null;
    }
}


class SinglyLinkedList{
    public $head;
    public $tail;
    public $length;
    public function __construct(){
        $this->head=0;
        $this->tail=0;
        $this->length=0;
    }

    public function push($value){
        $newNode=New Node($value);
        if (!$this->head){
            $this->head=$newNode;
            $this->tail=$newNode;
        }else{
            $this->tail->next=$newNode;
            $this->tail=$newNode;
        }
        ++$this->length;

        return $this;
    }

    public function pop(){
        if (!$this->head){
            return null;
        }

        $current=$this->head;
        $newTail=$current;
        while ($current->next){
            $newTail=$current;
            $current=$current->next;
        }
        $this->tail=$newTail;
        $this->tail->next=null;

        --$this->length;
        if ($this->length==0){
            $this->head=null;
            $this->tail=null;
        }
        return $current;


    }

    public function shift(){
        if (!$this->head){
            return null;
        }
        $oldHead=$this->head;
        $this->head=$this->head->next;
        --$this->length;
        if ($this->length==0){
            $this->tail=null;
        }
        return $oldHead;
    }

    public function unShift($value){

        $newNode=new Node($value);
        if (!$this->head){
            $this->head=$newNode;
            $this->tail=$this->head;
        }else{
            $newNode->next=$this->head;
            $this->head=$newNode;
        }

        ++$this->length;
        return $this;
    }

    public function get($index){
        if ($index>$this->length||$index<0){
            return null;
        }

        $counter=0;
        $current=$this->head;

        while ($counter !==$index){
            $current=$current->next;
            ++$counter;
        }
        return $current;
    }

    public function set($index,$value){
        $foundNode=$this->get($index);
        if ($foundNode){
            $foundNode->val=$value;
            return true;
        }
        return false;
    }

    public function insert($index,$value){
        if ($index<0||$index>$this->length)return false;
        if ($index==$this->length) return !!$this->push($value);
        if ($index==0) return !!$this->unShift($value);

        $newNode=New Node($value);
        $prev=$this->get($index-1);
        $temp=$prev->next;
        $prev->next=$newNode;
        $newNode->next=$temp;
        ++$this->length;
        return  true;
    }

    public function remove($index){
        if ($index<0||$index>$this->length){
            return false;
        }
        if ($index==0) return $this->shift();
        if ($index==$this->length-1) return $this->pop();

        $prev=$this->get($index-1);
        $removed=$prev->next;
        $prev->next=$removed->next;
        return $removed;

    }

    public function reverse(){
        $node=$this->head;
        $this->head=$this->tail;
        $this->tail=$node;

        $next=null;
        $prev=null;
        for ($i=0;$i<$this->length;$i++){
            $next=$node->next;
            $node->next=$prev;
            $prev=$node;
            $node=$next;
        }
        return $this;

    }

}


