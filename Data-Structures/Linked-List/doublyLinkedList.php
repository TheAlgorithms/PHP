<?php

class Node{
    public $val;
    public $next;
    public $prev;
    public function __construct($val)
    {
        $this->val=$val;
        $this->next=null;
        $this->prev=null;
    }
}



class DoublyLinkedList{
    public $head;
    public $tail;
    public $length;

    public function __construct()
    {
        $this->head=null;
        $this->tail=null;
        $this->length=0;
    }

    public function push($value){
        $newNode=new Node($value);
        if (!$this->head){
            $this->head=$newNode;
            $this->tail=$newNode;
        }else{
            $this->tail->next=$newNode;
            $newNode->prev=$this->tail;
            $this->tail=$newNode;
        }

        ++$this->length;
        return $this;
    }

    public function pop(){
        if (!$this->head){
            return false;
        }
        $poppedNode=$this->tail;
        if ($this->length==1){
            $this->head=null;
            $this->tail=null;
        }else{
            $this->tail=$poppedNode->prev;
            $this->tail->next=null;
            $poppedNode->prev=null;
        }
        --$this->length;
        return $poppedNode;
    }

    public function shift(){
        if (!$this->head)return false;
        $oldHead=$this->head;
        if ($this->length==1){
            $this->head=null;
            $this->tail=null;
        }else{
            $this->head=$oldHead->next;
            $this->head->prev=null;
            $oldHead->next=null;
        }
        --$this->length;
        return $oldHead;


    }

    public function unShift($vale){
        $newNode=new Node($vale);
        if (!$this->head) {
            $this->head=$newNode;
            $this->tail=$newNode;
        }else{
            $this->head->prev=$newNode;
            $newNode->next=$this->head;
            $this->head=$newNode;
        }
        ++$this->length;
        return $this;
    }

    public function get($index){
        if ($index <0||$index>=$this->length)return false;
        $halfOfLength=$this->length/2;
        if ($index<$halfOfLength){
            $counter=0;
            $current=$this->head;
            while ($counter !==$index){
                ++$counter;
                $current=$current->next;
            }
        }else{
            $counter=$this->length-1;
            $current=$this->tail;
            while ($counter !==$index){
                --$counter;
                $current=$current->prev;
            }
        }


        return $current;
    }

    public function set($index,$value){
        $node=$this->get($index);
        $node->val=$value;
        return true;
    }

    public function insert ($index,$value){
        if ($index<0|| $index>$this->length) return false;
        if ($index==0) return!!$this->unShift($value);
        if ($index==$this->length) return  !!$this->push($value);

        $newNode=new Node($value);
        $beforeNode=$this->get($index-1);
        $afterNode=$beforeNode->next;

        $newNode->next=$afterNode;
        $newNode->prev=$beforeNode;
        $beforeNode->next=$newNode;
        $afterNode->prev=$newNode;
        ++$this->length;
        return true;
    }

    public function remove($index){
        if ($index<0|| $index>=$this->length) return false;
        if ($index==0) return $this->shift();
        if ($index==$this->length-1) return $this->pop();

        $removedNode=$this->get($index);
        $beforeNode=$removedNode->prev;
        $afterNode=$removedNode->next;

        $beforeNode->next=$afterNode;
        $afterNode->prev=$beforeNode;

        $removedNode->next=$removedNode->prev=null;
        --$this->length;
        return  $removedNode;
    }


}

