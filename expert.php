<?php
declare(strict_types=1);

echo "Exercise 1 starts here:";

function new_exercise($a) {
    
    $block = "<br/><hr/><br/><br/>Exercise $a starts here:<br/>";
    echo $block;

}

new_exercise(2);

// === Exercise 2 ===
// Below we create a week array with all days of the week.
// We then try to print the first day which is monday, execute the code and see what happens.

$week = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];
$monday = $week[0];//index was 1 and referred to tuesday instead of monday

echo $monday;

new_exercise(3);
// === Exercise 3 ===
// This should echo ` "Debugged !" `, fix it so that that is the literal text echo'ed

$str = 'Debugged ! Also very fun';//double quotes will try to parse the content, for simple strings use single quotes
echo substr($str, 0, 10);

new_exercise(4);
// === Exercise 4 ===
// Sometimes debugging code is just like looking up code and syntax...
// The print_r($week) should give:  Array ( [0] => mon [1] => tues [2] => wednes [3] => thurs [4] => fri [5] => satur [6] => sun )
// Look up whats going wrong with this code, and then fix it, with ONE CHARACTER!

foreach($week as &$day) {
    $day = substr($day, 0, strlen($day)-3);
}
//added & symbol, passes a variable by reference to a funstion so the function can modify the variable
print_r($week);

new_exercise(5);
// === Exercise 5 ===
// The array should be printing every letter of the alfabet (a-z) but instead it does that + aa-yz
// Fix the code so the for loop only pushes a-z in the array

$arr = [];
for ($letter = 'a'; $letter < 'z'; $letter++) {//<'z' instead of <='z'
    array_push($arr, $letter);
}

print_r($arr); // Array ([0] => a, [1] => b, [2] => c, ...) a-z alfabetical array

new_exercise(6);
// === Final exercise ===
// The fixed code should echo the following at the bottom:
// Here is the name: $name - $name2
// $name variables are decided as seen in the code, fix all the bugs whilst keeping the functionality!

function combineNames($str1 = '', $str2 = '') {
    $params = [$str1, $str2];
    foreach($params as $param) {
        if ($param == '') {
            $param = randomHeroName();
        }
    }
    echo implode($params, ' - ');
};

function randomGenerate($arr, $amount) {
    for ($i = $amount; $i > 0; $i--) {
        array_push($arr, randomHeroName());
    }

    return $amount;
};

function randomHeroName()
{
    $hero_firstnames = ['captain', 'doctor', 'iron', 'Hank', 'ant', 'Wasp', 'the', 'Hawk', 'Spider', 'Black', 'Carol'];
    $hero_lastnames = ['America', 'Strange', 'man', 'Pym', 'girl', 'hulk', 'eye', 'widow', 'panther', 'daredevil', 'marvel'];
    $heroes = array($hero_firstnames, $hero_lastnames);
    $randname = $heroes[rand(0,count($heroes))][rand(0, 10)];

    return $randname;
};

echo 'Here is the name: ' . combineNames();


new_exercise(7);
function copyright($year) {
    return "&copy; $year BeCode";
}
//print the copyright
echo copyright(date('Y'));

new_exercise(8);
function login(string $email, string $password) {
    if($email == 'john@example.be' || $password == 'pocahontas') {
        return 'Welcome John Smith';
    }
    return 'No access';
}
//should greet the user with his full name (John Smith)
$login = print login('john@example.be', 'pocahontas');
echo "<br>";
//no access
$login = print login('john@example', 'dfgidfgdfg');
echo "<br>";
//no access
$login = print login('wrong@example', 'wrong');

new_exercise(9);
function isLinkValid(string $link) {
    $unacceptables = array('https:','.doc','.pdf', '.jpg', '.jpeg', '.gif', '.bmp', '.png');

    foreach ($unacceptables as $unacceptable) {
        if (strpos($link, $unacceptable) !== false) {
            return 'Unacceptable Found<br />';
        }
    }
    return 'Acceptable<br />';
}
//invalid link
print isLinkValid('http://www.google.com/hack.pdf');
//invalid link
print isLinkValid('https://google.com');
//VALID link
print isLinkValid('http://google.com');
//VALID link
print isLinkValid('http://google.com/test.txt');


new_exercise(10);

//Filter the array $areTheseFruits to only contain valid fruits
//do not change the arrays itself
$areTheseFruits = ['apple', 'bear', 'beef', 'banana', 'cherry', 'tomato', 'car'];
$validFruits = ['apple', 'pear', 'banana', 'cherry', 'tomato'];
//from here on you can change the code
$var = count($areTheseFruits);

for($i=0; $i <= $var; $i++) {
    if(!in_array($areTheseFruits[$i], $validFruits)) {
        unset($areTheseFruits[$i]);
    }
    
};
print_r($areTheseFruits);
var_dump($areTheseFruits);//do not change this