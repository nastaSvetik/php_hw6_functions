<?php
/**
 * Created by PhpStorm.
 * User: Operator2
 * Date: 23.09.2017
 * Time: 23:09
 */
echo '<pre>';



// Task#1
// Дан массив элементов 'one', 'two', 'three', 'four', 'five', 'six', при
// помощи функции usort и анонимной функции для сортировки нужно отсортировать
// этот массив таким образом, чтобы в итоге его элементы выстроились в таком
// порядке: 'two', 'one', 'four', 'three', 'six', 'five'.
echo '<hr><h3>Task#1 </h3>';

$arr= array('one','two','three','four','five','six');

uksort($arr, function($a,$b) 
	{
		return $b-$a == 1 ? 1 : 0;
	}
);

print_r($arr);




// Task#2
// При помощи функции range создать массив целых чисел произвольной длины.
// При помощи функции array_filter и анонимной функции отфильтровать элементы
// массива таким образом, чтобы в нем остались только те элементы, которые
// делятся одновременно на 3, 2, 5 без остатка.
echo '<hr><h3>Task#2 </h3>';
$arr2 = range(random_int(1,100),random_int(1,100));
$arr2 = array_filter($arr2, function ($v){ return ($v%30==0);});
print_r($arr2);




// Task#3
//Дана строка - Walks Straight walked numbly through the destruction. Nothing
// left, no one alive.. Разбить строку на массив слов (так, чтобы не осталось
// спец.символов - , .). При помощи функции usort и анонимной функции для
// сортировки отсортировать массив таким образом, чтобы его элементы
// выстроились от самого короткого слова к самому длинному.
echo '<hr><h3>Task#3 </h3>';

$str3 = 'Walks Straight walked numbly through the destruction. Nothing left, no one alive.';
$str3 = explode(' ', str_replace(array('.',',') ,'',$str3));
usort ($str3, function ($a,$b){
    $a = strlen($a);
    $b = strlen($b);
        if ($a > $b) return 1;
        elseif ($a < $b) return -1;
        else return 0;
});
print_r($str3);




// Task#4
// Создать функцию с именем sayHello, которая принимает один аргумент -
// строку $name(указать тип аргумента). Функция должна выводить сначала
// строку Привет, $name. А затем строку, в которой будет сказанно, сколько
// раз функция была вызвана в формате Всего поздоровались $n раз. Вызвать
// функцию несколько раз с разным значением параметра.
echo '<hr><h3>Task#4 </h3>';

function sayHello($name){
  static $count = null;
  $count++;
  echo "Привет, $name".PHP_EOL;
  echo   "Всего поздоровались $count раз.".PHP_EOL;
};

sayHello('Настя');
sayHello('Вася');
sayHello('5!');




// Task#5
/* Написать функцию, которая принимает один(!) аргумент - натуральное число.
 При каждом вызове функция должна возвращать среднее арифметическое
 значение переданных в нее чисел с учетом всех предыдущих вызовов. Пример:
    echo func(1);  // 1/1 = 1
    echo func(5);  // (1+5)/2 = 3
    echo func(3);  // (1+5+3)/3 = 3
    echo func(31); // (1+5+3+31)/4 = 10
 */

echo '<hr><h3>Task#5 </h3>';
function sum_and_save($num)
{
    static $result = null;
    static $times = null;
    $times++;
    $result += $num;
    return $result/$times;
}
echo sum_and_save(1).PHP_EOL;
echo sum_and_save(5).PHP_EOL;
echo sum_and_save(3).PHP_EOL;
echo sum_and_save(31).PHP_EOL;




// Task#6
// *Дано слово, состоящее только из строчных латинских букв. Напишите функцию,
// которая проверит, является ли это слово палиндромом. Выведите да или нет.
// При решении этой задачи нельзя использовать циклы, массивы и функции
// разворота строки. Рекурсия разрешена :)

echo '<hr><h3>Task#6 </h3>';
$str6 = 'qwrwq';

function is_palindrom(string $word)
{
    static $result = null;
    static $start = -1;
    $start++;
    $end = strlen($word) -1 -$start;
    if ($start <= $end  && $word[$start] == $word[$end]){
       $result = 'Yes, its a palindrome';
       is_palindrom($word);
    }
    elseif ($start <= $end && $word[$start] != $word[$end])  {
       $result = 'No, it is not a palindrome';
    }

return $result;
}

echo (is_palindrom($str6));




// Task#7
// *7. Дано число n, десятичная запись которого не содержит нулей. Получите
// число, записанное теми же цифрами, но в противоположном порядке. При
// решении этой задачи нельзя использовать циклы, строки, массивы,
// разрешается только рекурсия и целочисленная арифметика. Функция должна
// возвращать целое число, являющееся результатом работы программы, выводить
// число по одной цифре нельзя. Можно использовать дополнительные аргументы
// для передачи данных между рекурсивными вызовами. Пример:
//   echo func(235); // 532

echo '<hr><h3>Task#7 </h3>';

function reverse_number(int $number, int $i=0)
{
	if ($number==0){return $i;}
	else {return reverse_number( $number/10, ($i*10 + $number%10));}
}

echo  reverse_number (123);


?>


