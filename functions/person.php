<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of person
 *
 * @author christianheiler
 */
class person {
    private $name;
    private $lastName;
    private $dob;
    private $result;
    private $id;

    public function getId() {
        return $this->id;
    }

        
    function __construct($id) {
        $this->result['code'] = 200;
        $this->result['msg'] = "ok";
        $this->id = $id;
        
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getDob() {
        return $this->dob;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
        return $this;
    }

    public function setDob($day, $month, $year) {
        $this->dob['day'] = $day;
        $this->dob['month'] = $month;
        $this->dob['year'] = $year;
        return $this;
    }
    
    public function age(){
        //get age from date or birthdate
        $age = (date("md", date("U", mktime(0, 0, 0, $this->dob['month'], $this->dob['day'], $this->dob['year']))) > date("md")
            ? ((date("Y") - $this->dob['year']) - 1)
            : (date("Y") - $this->dob['year']));
        return $age;
    }
    


    
    
}
