# functions
useful functions, some pattern exploration, some recursion, some just for the fun of it.

# freqCount()
// # The array has 2 1's at level 0, 2 1's at level 1, 3 1's at level 2 and one 1 at level 3.
$inputArray = [1, 4, [1], [1, 1, [1, 4, 1, 1,[1]]], 1];
$result = [];
$nesting = 0;
print_r(freqCount($inputArray, 1));

# abacaba()
// echo abacaba(18);

# iterativeFactorial()
// print(iterativeFactorial(20));

# recursiveFactorial()
// print(recursiveFactorial(20));

# arraySearchRecursive()
$haystack = array (
    array("Volvo",22,18, array("Land Rover",17,15)),
    array("BMW",15,13, array("Saab",5,2),array("Saab",5,2),array("Saab",5,2),),
    array("Saab",5,2),
    array("Land Rover",17,15, 23, 17, 5028, 156486486, array("Saab",5,2),array("Saab",5,2),array("Saab",array("banana",5,2),5,2),)
  );
$needle = "banana";

(arraySearchRecursive($needle, $haystack)) ? print("A banana was found.") : print("sorry no bananas");
// print_r($haystack);
