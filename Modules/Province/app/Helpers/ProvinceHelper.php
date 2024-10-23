<?php

namespace Modules\Province\Helpers;

class ProvinceHelper
{
    const NORTH_REGION = 1;

    const MIDDLE_REGION = 2;

    const SOUTH_REGION = 3;

    private static $cityByRegions = [
        self::NORTH_REGION => [
            'Bắc Giang',
            'Bắc Kạn',
            'Bắc Ninh',
            'Cao Bằng',
            'Điện Biên',
            'Hà Giang',
            'Hà Nam',
            'Hà Nội',
            'Hòa Bình',
            'Hưng Yên',
            'Hải Dương',
            'Hải Phòng',
            'Lai Châu',
            'Lào Cai',
            'Lạng Sơn',
            'Nam Định',
            'Ninh Bình',
            'Phú Thọ',
            'Quảng Ninh',
            'Sơn La',
            'Thái Bình',
            'Thái Nguyên',
            'Tuyên Quang',
            'Vĩnh Phúc',
            'Yên Bái',
        ],
        self::MIDDLE_REGION => [
            'Bình Thuận',
            'Bình Định',
            'Đà Nẵng',
            'Đắk Lắk',
            'Đắk Nông',
            'Gia Lai',
            'Hà Tĩnh',
            'Khánh Hòa',
            'Kon Tum',
            'Lâm Đồng',
            'Nghệ An',
            'Ninh Thuận',
            'Phú Yên',
            'Quảng Bình',
            'Quảng Nam',
            'Quảng Ngãi',
            'Quảng Trị',
            'Thanh Hóa',
            'Thừa Thiên - Huế',
        ],
        self::SOUTH_REGION => [
            'An Giang',
            'Bà Rịa Vũng Tàu',
            'Bình Dương',
            'Bình Phước',
            'Bạc Liêu',
            'Bến Tre',
            'Cà Mau',
            'Cần Thơ',
            'Đồng Nai',
            'Đồng Tháp',
            'Hậu Giang',
            'Kiên Giang',
            'Long An',
            'Sóc Trăng',
            'TP. Hồ Chí Minh',
            'Tiền Giang',
            'Trà Vinh',
            'Tây Ninh',
            'Vĩnh Long',
        ],
    ];

    public static function getRegions()
    {
        return [
            self::NORTH_REGION => 'Miền Bắc',
            self::MIDDLE_REGION => 'Miền Bắc',
            self::SOUTH_REGION => 'Miền Nam',
        ];
    }

    public static function getRegionByCity(string $name)
    {
        foreach (self::$cityByRegions as $region => $names) {
            if (in_array($name, $names)) {
                return $region;
            }
        }

        return null;
    }
}
