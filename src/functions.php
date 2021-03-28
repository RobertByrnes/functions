<?php

declare(strict_types=1);

class Functions
{
    /**
     * Counts the number of elements holding a search parameter at each level
     * of a multidimensional numeric array.
     * Returns an array where the keys represent the level of nesting and the 
     * value is the count of the search parameter.
     * The search parameter may be of type integer or float.
     * 
     * @param array $array
     * @param $searchParam
     * @return array
     */
    public function freqCount(array $array, $searchParam, $nesting=0, &$results=[]) : array
    {
        if (!isset($results[$nesting])) {
            $results[$nesting] = 0;
        }

        foreach($array as $value) {
            if(is_array($value)) {
                $this->freqCount($value, $searchParam, $nesting+1, $results); 
            } else {
                if($value == $searchParam) {
                    $results[$nesting]++;
                }
            } 
        }
        return $results;
    }


    /**
     * Counts the number of elements holding a search parameter at each level
     * of a multidimensional numeric array.
     * Returns an array where each key holds an array with the level of nesting at
     * 0 and at 1 is the count of the search parameter.
     * The search parameter may be of type integer or float.
     * 
     * @param array $array
     * @param $searchParam
     * @return array
     */
    public function freqCountToKeyIsArray($array, $searchParam, $nesting=0, &$results=[])
    {
        if (!isset($results[$nesting])) {
            $results[$nesting] = [$nesting, 0];
        }
        foreach ($array as $value) {
            if (is_array($value)) {
                $this->freqCountToKeyIsArray($value, $searchParam, $nesting+1, $results);
            } else {
                if ($value == $searchParam) {
                    $results[$nesting][1]++;
                }
            }
        }
        return $results;
    }


    /**
     * ABACABA is a fractal recursive pattern, this pattern naturally occurs
     * in plants and snail shells, also in art, music
     * and poetry.  This public  takes an integer and returns the pattern as a string.
     * It gets quite long even after a few iterations.
     *
     * @param integer $inputNumber
     * @return string
     */
    public function abacaba($inputNumber) : string
    {
        $alphabet = "A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z";
        $testArray = explode(',', $alphabet);
        $inputNumber--;
        $pattern = $testArray[$inputNumber];
        if($inputNumber <= 0) {
            return $pattern;
        }
        else {
            return $this->abacaba($inputNumber).$pattern.$this->abacaba($inputNumber);
        }
    }

    public function iterativeFactorial($number) {
        $factorial=$number;
        $number--;
        while($number>0) {
            $factorial*=$number;
            $number--;
            // print("[+] Memory peak: ".memory_get_peak_usage()." bytes\n");
            // print("[+] Memory used: ".memory_get_usage()." bytes\n");
        }
        return number_format($factorial, 0);
    }


    public function recursiveFactorial($number, $factorial=TRUE)
    {
        if ($number<=0) {
            return number_format($factorial, 0);
        } else {
            // print("[+] Memory peak: ".memory_get_peak_usage()." bytes\n");
            // print("[+] Memory used: ".memory_get_usage()." bytes\n");
            return $this->recursiveFactorial($number-1, $factorial*$number);
        }
    }



    public function arraySearchRecursive($needle, $haystack)
    {
        // print("[+] Memory used: ".memory_get_peak_usage()." bytes\n");
        foreach($haystack as $index => $value) {
            if ($value == $needle) {
                return $value;
            }
            if (is_array($value)) {
                $result = arraySearchRecursive($needle, $value);
                if ($result != FALSE) {
                    return $result;
                }
            }
        }
        return FALSE;
    }

}