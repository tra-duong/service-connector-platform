<?php

namespace Modules\Province\Tests\Feature;

use Tests\TestCase;
use Modules\Province\Http\Controllers\ProvinceController;
use Modules\Province\App\Services\Interfaces\CityServiceInterface;
use Modules\Province\App\Services\Interfaces\DistrictServiceInterface;
use Modules\Province\App\Services\Interfaces\WardServiceInterface;
use Illuminate\Http\Response;
use Mockery;

class ProvinceControllerTest extends TestCase
{
  protected $cityService;
  protected $districtService;
  protected $wardService;
  protected $controller;

  protected function setUp(): void
  {
    parent::setUp();

    $this->cityService = Mockery::mock(CityServiceInterface::class);
    $this->districtService = Mockery::mock(DistrictServiceInterface::class);
    $this->wardService = Mockery::mock(WardServiceInterface::class);

    $this->controller = new ProvinceController(
      $this->cityService,
      $this->districtService,
      $this->wardService
    );
  }

  public function testGetAllCities()
  {
    $expectedResponse = new Response(['cities' => []], 200);

    $this->cityService
      ->shouldReceive('getAllCities')
      ->once()
      ->andReturn($expectedResponse);

    $response = $this->controller->getAllCities();

    $this->assertEquals(200, $response->getStatusCode());
    $this->assertArrayHasKey('cities', $response->getOriginalContent());
  }

  public function testGetCityById()
  {
    $cityId = 1;
    $expectedResponse = new Response(['id' => $cityId, 'name' => 'City Name'], 200);

    $this->cityService
      ->shouldReceive('getCity')
      ->once()
      ->with($cityId)
      ->andReturn($expectedResponse);

    $response = $this->controller->getCityById($cityId);

    $this->assertEquals(200, $response->getStatusCode());
    $this->assertEquals($cityId, $response->getOriginalContent()['id']);
  }

  public function testGetAllDistrictsByCity()
  {
    $cityId = 1;
    $expectedResponse = new Response(['districts' => []], 200);

    $this->cityService
      ->shouldReceive('getDistricts')
      ->once()
      ->with($cityId)
      ->andReturn($expectedResponse);

    $response = $this->controller->getAllDistrictsByCity($cityId);

    $this->assertEquals(200, $response->getStatusCode());
    $this->assertArrayHasKey('districts', $response->getOriginalContent());
  }

  public function testGetAllWardsByCity()
  {
    $cityId = 1;
    $expectedResponse = new Response(['wards' => []], 200);

    $this->cityService
      ->shouldReceive('getWards')
      ->once()
      ->with($cityId)
      ->andReturn($expectedResponse);

    $response = $this->controller->getAllWardsByCity($cityId);

    $this->assertEquals(200, $response->getStatusCode());
    $this->assertArrayHasKey('wards', $response->getOriginalContent());
  }

  public function testGetCityByDistrictId()
  {
    $districtId = 1;
    $expectedResponse = new Response(['city_id' => 1], 200);

    $this->districtService
      ->shouldReceive('getCity')
      ->once()
      ->with($districtId)
      ->andReturn($expectedResponse);

    $response = $this->controller->getCityByDistrictId($districtId);

    $this->assertEquals(200, $response->getStatusCode());
    $this->assertEquals(1, $response->getOriginalContent()['city_id']);
  }

  // Tiếp tục viết test cho các phương thức còn lại...

  protected function tearDown(): void
  {
    Mockery::close();
  }
}
