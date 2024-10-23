<?php

namespace Modules\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Category\Models\CategoryType;

class CategoryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Xây dựng & sửa chữa',
                'machine_name' => 'xay_dung_sua_chua',
            ],
            [
                'name' => 'Vận tải & giao nhận',
                'machine_name' => 'van_tai_giao_nhan',
            ],
            [
                'name' => 'Lao động thủ công',
                'machine_name' => 'lao_dong_thu_cong',
            ],
            [
                'name' => 'Cơ khí & kỹ thuật',
                'machine_name' => 'co_khi_ky_thuat',
            ],
            [
                'name' => 'Điện & điện tử',
                'machine_name' => 'dien_dien_tu',
            ],
            [
                'name' => 'Chăm sóc gia đình',
                'machine_name' => 'cham_soc_gia_dinh',
            ],
            [
                'name' => 'Nông nghiệp & chăn nuôi',
                'machine_name' => 'nong_nghiep_chan_nuoi',
            ],
            [
                'name' => 'Công nghệ thông tin',
                'machine_name' => 'cong_nghe_thong_tin',
            ],
            [
                'name' => 'Dịch vụ cá nhân',
                'machine_name' => 'dich_vu_ca_nhan',
            ],
            [
                'name' => 'Giáo dục đào tạo',
                'machine_name' => 'giao_duc_dao_tao',
            ],
            [
                'name' => 'Thực phẩm & nhà hàng',
                'machine_name' => 'thuc_pham_nha_hang',
            ],
        ];
        foreach ($data as $type) {
            $notExist = CategoryType::where('machine_name', $type['machine_name'])->doesntExist();
            if ($notExist) {
                CategoryType::create($type);
            }
        }

    }
}
