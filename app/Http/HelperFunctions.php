<?php

class HelperFunction{
    public function mixer($array1,$array2){
        $mixed=array();
        for($i=0;i<=count($array1);$i++){
            $temp=$array1[$i]+" "+$array2[$i];
            array_push($mixed,$temp);
        }
        return $mixed;
    }
}