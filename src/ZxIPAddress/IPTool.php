<?php

namespace Halo123450\Zxipdb;

class IPTool
{
    /**
     * @param string $ip
     * @return array
     */
    public static function query($ip)
    {
        switch (true) {
            case IPv4Tool::isValidAddress($ip):
                return IPv4Tool::query($ip);
            case IPv6Tool::isValidAddress($ip):
                return IPv6Tool::query($ip);
        }
        throw new InvalidIpAddressException("Invalid IP address:{$ip}");
    }

    /**
     * 通过IP地址解析IP归属地
     * @param string $ip
     * @return array [$province_id, $city_id, $province_name, $city_name, $district_name]
     */
    public static function getLocation($ip)
    {
        $result = static::query($ip);
        return IpLocation::getLocation(
            (is_array($result) && isset($result['disp'])) ? $result['disp'] : ''
        );
    }

    /**
     * @param void
     * @return array
     */
    public static function total()
    {
        return [
            'IPv4' => IPv4Tool::total(),
            'IPv6' => IPv6Tool::total()
        ];
    }
}
