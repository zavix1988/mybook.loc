<?php

/**
 * обертка над print_r()
 * для отладки
 * @param $arr
 */
function debug($arr){
	echo '<pre>'.print_r($arr, true).'</pre>';
}

/**
 * Функция переадресации
 *
 * @param bool $http
 */
function redirect($http = false){
    if($http){
        $redirect = $http;
    }else{
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
    }
    header("Location: $redirect");
    die;
}

/**
 * Проверка данных из формы
 *
 * @param $value
 * @return string
 */
function form_check($value)
{
    if (isset($value) && !empty($value)) {
        $result = trim(htmlspecialchars($value));
    }else{
        $result = '';
    }
    return $result;
}

/**
 * Функция транслитерации (для генерации ЧПУ)
 * @param $s
 * @return mixed|string|string[]|null
 */
function translit($s) {
    $s = (string) $s; // преобразуем в строковое значение
    $s = strip_tags($s); // убираем HTML-теги
    $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
    $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
    $s = trim($s); // убираем пробелы в начале и конце строки
    $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
    $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
    $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
    $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
    return $s; // возвращаем результат
}