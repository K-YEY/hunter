<?php
namespace App\Models;

use Illuminate\Support\Facades\Storage;

class Country
{
    protected static $countries;

    public static function loadCountries()
    {
        if (is_null(self::$countries)) {
            $json = Storage::disk('local')->get('storage/app/public/countries.json');
            self::$countries = collect(json_decode($json, true));
        }
    }

    public static function getCountryByCode($code)
    {
        self::loadCountries();
        return self::$countries->firstWhere('code', $code);
    }

    public static function getAllCountries()
    {
        self::loadCountries();
        return self::$countries;
    }
}
