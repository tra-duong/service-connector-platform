<?php

namespace Modules\Province\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Modules\Common\Helpers\StringHelper;
use Modules\Province\Helpers\ProvinceHelper;
use Modules\Province\Models\City;
use Modules\Province\Models\District;
use Modules\Province\Models\Ward;

class ProvinceSeeder extends Seeder
{
    const HCMC_PHONE_CODE = 28;

    const PROVINCE_OPEN_API = 'https://provinces.open-api.vn/api/?depth=3';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Provinces API.
        $response = Http::get(self::PROVINCE_OPEN_API);
        if ($response->status() !== 200) {
            Log::error('Call province API error!');

            return;
        }
        $jsonData = $response->json();
        // Check if table is empty -> insert all.
        foreach ($jsonData as $city) {
            $theCity = $this->seedCity($city);
            foreach ($city['districts'] as $district) {
                $theDistrict = $this->seedDistrict($district, $theCity);
                foreach ($district['wards'] as $ward) {
                    $this->seedWard($ward, $theDistrict);
                }
            }
        }
        $filePath = module_path('Province', 'assets/province_data.json');
        file_put_contents($filePath, json_encode($jsonData));
    }

    /**
     * Seed City
     */
    public function seedCity(array $city): City
    {
        $cleanName = $city['name'];
        if ($city['phone_code'] === self::HCMC_PHONE_CODE) {
            $cleanName = str_replace(['Thành phố'], 'TP.', $cleanName);
        } else {
            $cleanName = str_replace(['Thành phố', 'Tỉnh'], '', $cleanName);
        }
        $cleanName = trim($cleanName);

        return City::firstOrCreate(
            ['name' => $cleanName],
            [
                'name' => $cleanName,
                'machine_name' => StringHelper::buildMachineName($cleanName),
                'region' => ProvinceHelper::getRegionByCity($cleanName),
                'type' => $city['division_type'],
                'phone_code' => $city['phone_code'],
            ]
        );
    }

    /**
     * Seed District
     */
    public function seedDistrict(array $district, City $city): District
    {
        $cleanName = trim($district['name']);

        return District::firstOrCreate(
            ['name' => $cleanName],
            [
                'name' => $cleanName,
                'machine_name' => StringHelper::buildMachineName($cleanName),
                'city_id' => $city->id,
            ]
        );
    }

    /**
     * Seed ward.
     */
    public function seedWard(array $ward, District $district): Ward
    {
        $cleanName = trim($ward['name']);

        return Ward::firstOrCreate(
            ['name' => $cleanName],
            [
                'name' => $cleanName,
                'machine_name' => StringHelper::buildMachineName($cleanName),
                'district_id' => $district->id,
            ]
        );
    }
}
