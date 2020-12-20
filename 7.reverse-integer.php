<?php

/**
 * 给出一个 32 位的有符号整数，你需要将这个整数中每位上的数字进行反转。
 * 假设我们的环境只能存储得下 32 位的有符号整数，则其数值范围为 [−2^31,  2^31 − 1]。请根据这个假设，如果反转后整数溢出那么就返回 0。
 * @param Integer $x
 * @return Integer
 */
function reverse($x) {
    // -2^31 = -2147483648
    // 2^31-1 = 2147483647
    $max = pow(2, 31) - 1;
    $min = pow(-2, 31);

    // 结果
    $ret = 0;

    // 不断除以10，取余数
    while ($x != 0) {
        // 小数点后的一位
        $re = $x % 10;
        // 小数点前
        $x = intval($x / 10);
        // 倒转
        $ret = $ret * 10 + $re;

        if ($ret > $max || $ret < $min) {
            return 0;
        }
    }

    return $ret;
}


echo reverse(-2147483643);