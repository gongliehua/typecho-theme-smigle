<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

/**
 * 计算字符串宽度（解决中英文问题）
 */
if (!function_exists('wchar_strlen')) {
    function wchar_strlen($string)
    {
        // 宽度
        $len = 0;
        // 计算最后1个中文字符已经截取到第几位了
        $endLen = 0;
        // 被截取字符串的长度
        $strLen = strlen($string);
        // 循环字符串长度去截取
        for ($i = 0; $i < $strLen; $i++) {
            // 没有字符串可截取就跳出去
            if (!isset($string[$i])) {
                break;
            }
            if (ord($string[$i]) >= 128) {
                $endLen++;
                if ($endLen == 3) {
                    $len += 2;
                    $endLen = 0;
                }
            } else {
                $len++;
            }
        }
        return $len;
    }
}

/**
 * 等宽字符截取（解决中英文字符串截取宽度问题）
 * 用法 str_limit($string, x*2, '...') 其中2表示一个中文字符的宽度,也就是说以中文字符长度为准
 * @param $string
 * @param $length
 * @param string $end
 * @return string
 */
if (!function_exists('wchar_limit')) {
    function wchar_limit($string, $length, $end = '...')
    {
        // 已经截取的字符串
        $str = '';
        // 已经截取到的长度
        $len = 0;
        // 计算最后1个中文字符已经截取到第几位了
        $endLen = 0;
        // 被截取字符串的长度
        $strLen = strlen($string);
        // 循环字符串长度去截取
        for ($i = 0; $i < $strLen; $i++) {
            // 没有字符串可截取就跳出去
            if (!isset($string[$i])) {
                break;
            }
            // 如果已经截取完成(中文字符可能直接进2位,所以这里要写>=号)
            if ($len >= $length) {
                break;
            }
            // 把截取到字符拼接到另一个变量,计算该字符是中文字还是英文字,如果是中文字需截取到3位才能算2个长度(也就是说最后1个字符的长度可能超出了预料的长度)
            $str .= $string[$i];
            if (ord($string[$i]) >= 128) {
                $endLen++;
                if ($endLen == 3) {
                    $len += 2;
                    $endLen = 0;
                }
            } else {
                $len++;
            }
        }

        // 上面截取最后1个字符可能超出预算,因为最后1个字符可能是中文
        // 所以最多超出2个位(3位表示1个中文字符),1个中文字符等于2个字母长度,误差也就是1个字母长度
        // 这里也就没必去为了整个长度就1个字母长度的误差,再次计算,性能不划算(后面有时间看看再怎么优化把,其实已经满足现在的需求了,有取就有舍的道理,如反过来想,如果截取的最后一个字符是中文,那么原本却只要1的字母的长度,那么最后一个中文字符就得丢掉,也就会丢一个字母长度)

        // 处理被截取的字符串长度 大于 截取的长度,后面拼接...
        if (isset($string[$i + 1])) {
            $str .= $end;
        }
        return $str;
    }
}

// handle Read more
if (!function_exists('handleReadMore')) {
    function handleReadMore($content, $limit = 92)
    {
        //@ob_end_clean();
        // fix剔除标签后文字间距
        $content = preg_replace('/<\/.+?>/', '$0 ', $content);
        // 多个空格做一个空格处理
        $content = preg_replace('/\s+/', ' ', trim(strip_tags($content)));
        // 按字符长度回显
        echo wchar_limit($content, $limit * 2, '');
        //exit;
    }
}
