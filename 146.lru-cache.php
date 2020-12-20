<?php

class LRUCache {
    private $capacity;
    private $hashMap;

    /**
     * @param Integer $capacity
     */
    function __construct($capacity) {
        $this->capacity = $capacity;
    }
  
    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key) {
        $key = 'k_' . $key;

        // 先判断是否存在
        if (isset($this->hashMap[$key])) {
            // 获取需要返回的数据
            $ret = $this->hashMap[$key];
            // 移除当前位置
            unset($this->hashMap[$key]);
            // 重新添加到末尾
            $this->hashMap[$key] = $ret;

            return $ret;
        }

        return -1;
    }
  
    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value) {
        $key = 'k_' . $key;

        // 先判断是否存在
        if (isset($this->hashMap[$key])) {
            // 移除当前位置
            unset($this->hashMap[$key]);
        } else {
            // 如果不存在
            // 判断容量
            if (count($this->hashMap) >= $this->capacity) {
                // 超过容量上限，移除开头
                array_shift($this->hashMap);
            }
        }

        // 添加到末尾
        $this->hashMap[$key] = $value;
        return NULL;
    }
}

/**
 * Your LRUCache object will be instantiated and called as such:
 * $obj = LRUCache($capacity);
 * $ret_1 = $obj->get($key);
 * $obj->put($key, $value);
 */