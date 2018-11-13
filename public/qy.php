<?php
/* php生成毫秒时间戳 */
function msectime()
{
    list($tmp1, $tmp2) = explode(' ', microtime());
    return (float)sprintf('%.0f', (floatval($tmp1) + floatval($tmp2)) * 1000);
}
/* 毫秒时间戳转换成日期 */
function msecdate($tag, $time)
{
    $a = substr($time,0,10);
    $b = substr($time,10);
    $date = date($tag,$a).'.'.$b;
   return $date;
}
echo msectime().'<br/><br/><br/>';
echo msecdate('Y-m-d H:i:s', msectime());






?>