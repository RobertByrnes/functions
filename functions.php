<?php
declare(strict_types=1);


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
function freqCount(array $array, $searchParam) : array
{
	$count = count(array_keys($array, $searchParam));
	(!isset($GLOBALS['result'][$GLOBALS['nesting']])) ?
		$GLOBALS['result'][$GLOBALS['nesting']] = $count : $GLOBALS['result'][$GLOBALS['nesting']] += $count;

	foreach($array as $key => $value) {
		if(is_array($value)) { $keysOfInterest[] = $key;}    
	}

	if (isset($keysOfInterest)) {
		(count($keysOfInterest) == 1) ? $goodGrammar = "array" : $goodGrammar = "arrays";
		print("[+] ".count($keysOfInterest)." sub ".$goodGrammar." found in level >> ".$GLOBALS['nesting']."\n");
	}
	
	if(!empty($keysOfInterest)) {	
		foreach($keysOfInterest as $keyToInvestigate => $newArray) {
			$GLOBALS['nesting']++;
			freqCount($array[$newArray], $searchParam);	
			$GLOBALS['nesting']--;
		}
	}
	return $GLOBALS['result'];
}



function abacaba($inputNumber)
{
    $inputNumber--;
    $pattern = BUILD_ARRAY[$inputNumber];
    if($inputNumber <= 0) {
        return $pattern;
    }
    else {
        return abacaba($inputNumber).$pattern.abacaba($inputNumber);
    }
}



function iterativeFactorial($number) {
    $factorial=$number;
    $number--;
    while($number>0) {
        $factorial*=$number;
        $number--;
        print("[+] Memory used: ".memory_get_peak_usage()." bytes\n");
    }
    return $factorial;
}



function recursiveFactorial($number, $factorial=TRUE)
{
    if ($number<=0) {
        return $factorial;
    } else {
        print("[+] Memory used: ".memory_get_peak_usage()." bytes\n");
        return recursiveFactorial($number-1, $factorial*$number);
    }
}



function arraySearchRecursive($needle, $haystack)
{
    print("[+] Memory used: ".memory_get_peak_usage()." bytes\n");
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

