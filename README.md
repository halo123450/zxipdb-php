### Usage/使用方法
```shell script
composer require halo123450/zxipdb
```
Your code/你的业务代码
```php
$result = \Halo123450\Zxipdb\IPTool::query('8.8.8.8');
/*
$result = [
    "start" => "8.8.8.8"
    "end" => "8.8.8.8"
    "addr" => array:2 [
        0 => "美国"
        1 => "加利福尼亚州圣克拉拉县山景市谷歌公司DNS服务器"
    ]
    "disp" => "美国 加利福尼亚州圣克拉拉县山景市谷歌公司DNS服务器"
]
 */
$result = \Halo123450\Zxipdb\IPTool::query('240e:e9:8819:0:3::3f9');
/*
$result = [
    "start" => "240e:e9:8800::"
    "end" => "240e:e9:8fff:ffff::"
    "addr" => array:2 [
        0 => "中国江苏省苏州市"
        1 => "中国电信IDC"
    ]
    "disp" => "中国江苏省苏州市 中国电信IDC"
]
 */
$valid = \Halo123450\Zxipdb\IPv4Tool::isValidAddress('114.114.114.114');
/*
$valid = true;
 */
$valid = \Halo123450\Zxipdb\IPv6Tool::isValidAddress('240e:e9:8819:0:3::3f9');
/*
$valid = true;
*/

