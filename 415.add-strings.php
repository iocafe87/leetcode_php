<?php

/**
 * 模拟竖式加法
 * @param String $num1
 * @param String $num2
 * @return String
 */
function addStrings($num1, $num2) {
    // 进位
    $carry = 0;
    // 每一位数加法总和
    $sum = 0;

    // 如果其中任何一个数为0
    // 则直接返回另外一个
    if ($num1 == '0') return $num2;
    if ($num2 == '0') return $num1;

    // 获取两个字符串长度
    $len1 = strlen($num1);
    $len2 = strlen($num2);

    // 两个字符串的迭代变量，从最末尾下标开始
    $i1 = $len1 - 1;
    $i2 = $len2 - 1;

    // 结果字符串
    $return = '';

    // 遍历。只要仍然存在下标、进位
    while ($i1 >= 0 || $i2 >= 0 || $carry) {
        // 将上一次循环的进位，加上
        $sum = $carry;

        // 字符串1
        if ($i1 >= 0) {
            $sum += substr($num1, $i1, 1);
            $i1--;
        }

        // 字符串2
        if ($i2 >= 0) {
            $sum += substr($num2, $i2, 1);
            $i2--;
        }

        // 计算进位
        // 如果两个数sum大于10
        // 取整数位
        $carry = floor($sum / 10);
        // 取余数
        $return = $sum % 10 . $return;
    }

    return $return;

}

echo addStrings('123', '6678');