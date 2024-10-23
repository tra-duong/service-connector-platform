<?php

namespace Modules\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Category\Models\Category;
use Modules\Category\Models\CategoryType;
use Modules\Common\Helpers\StringHelper;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'xay_dung_sua_chua' => [
                'Thợ điện',
                'Thợ nước',
                'Thợ xây',
                'Thợ hàn',
                'Thợ điện lạnh',
                'Thợ mộc',
                'Thợ sơn',
            ],
            'van_tai_giao_nhan' => [
                'Chuyển nhà, văn phòng',
                'Giao hàng nhanh',
            ],
            'lao_dong_thu_cong' => [
                'Bốc xếp',
                'Đóng gói',
            ],
            'co_khi_ky_thuat' => [
                'Sửa xe',
            ],
            'dien_dien_tu' => [
                'Lắp camera',
            ],
            'cham_soc_gia_dinh' => [
                'Giúp việc',
                'Trông trẻ',
                'Chăm sóc người già',
                'Chăm sóc người bệnh',
            ],
            'nong_nghiep_chan_nuoi' => [
                'Chăm sóc cây trồng',
                'Thu hoạch',
                'Chế biến nông sản',
            ],
            'cong_nghe_thong_tin' => [
                'Sửa máy tính',
                'Cài đặt phần mềm',
                'Hỗ trợ kỹ thuật máy tính',
                'Lắp đặt mạng',
            ],
            'dich_vu_ca_nhan' => [
                'Cắt tóc',
                'Chăm sóc da, Spa',
            ],
            'giao_duc_dao_tao' => [
                'Gia sư',
                'Dạy nghề',
                'Dạy ngoại ngữ',
            ],
            'thuc_pham_nha_hang' => [
                'Nấu ăn gia đình',
                'Nấu ăn tiệc',
                'Đầu bếp, pha chế',
            ],
        ];
        foreach ($data as $parentSlug => $categories) {
            if ($categoryType = CategoryType::where('machine_name', $parentSlug)->first()) {
                foreach ($categories as $categoryName) {
                    $slug = StringHelper::buildMachineName($categoryName);
                    // Not exists, create it.
                    if (Category::where('slug', $slug)->doesntExist()) {
                        Category::create([
                            'name' => $categoryName,
                            'slug' => $slug,
                            'type' => $categoryType->id,
                        ]);
                    }
                }
            }
        }
    }
}
