<?php

namespace App\Http\Controllers\Api;

use App\Contracts\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Addresses\StoreAddressFormRequest;
use App\Models\Address;
use App\Models\City;
use App\Http\Resources\Addresses\CityResource;
use App\Http\Resources\Addresses\CountryResource;
use App\Models\Country;

class AddressController extends Controller
{
    public function store(StoreAddressFormRequest $request)
    {
        $validatedData = $request->validated();

        $address = Address::create($validatedData);

        return ApiResponse::success(['message' => 'Address created successfully', 'data' => $address]);
    }

    public function allCities()
    {
        $cities = City::all();
        return ApiResponse::success(['cities' => CityResource::collection($cities)]);
    }
    public function allCountries()
    {
        $country = Country::with('cities')->get();
        return ApiResponse::success(['countries' => CountryResource::collection($country)]);
    }
}
