<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreCountryRequest;
use App\Http\Requests\V1\UpdateCountryRequest;
use App\Http\Resources\V1\CountryCollection;
use App\Http\Resources\V1\CountryResource;
use App\Models\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CountryCollection(Country::paginate(15));
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        return new CountryResource($country);
    }
}
