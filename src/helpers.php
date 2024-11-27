<?php

declare(strict_types=1);

use Rinvex\Country\CountryLoader;
use Rinvex\Country\CurrencyLoader;

if (! function_exists('country')) {
    /**
     * Get the country by it's ISO 3166-1 alpha-2.
     *
     * @param string $code
     * @param bool   $hydrate
     *
     * @return \Rinvex\Country\Country|array
     */
    function country($code, $hydrate = true)
    {
        return CountryLoader::country($code, $hydrate);
    }
}

if (! function_exists('countries')) {
    /**
     * Get all countries short-listed.
     *
     * @param bool $longlist
     * @param bool $hydrate
     *
     * @return array
     */
    function countries($longlist = false, $hydrate = false)
    {
        return CountryLoader::countries($longlist, $hydrate);
    }
}

if (! function_exists('currencies')) {
    /**
     * Get all currencies short-listed.
     *
     * @param bool $longlist
     *
     * @return array
     */
    function currencies($longlist = false)
    {
        return CurrencyLoader::currencies($longlist);
    }
}

if (! function_exists('countryByFullName')) {
    /**
     * @param string $countryName
     * @param string $langCode
     * @return null|\Rinvex\Country\Country
     * @throws \Rinvex\Country\CountryLoaderException
     */
    function countryByFullName(
        string $countryName,
        string $langCode = 'en'
    ): null|\Rinvex\Country\Country {

        $countries = CountryLoader::countries(true, true);

        /** @var \Rinvex\Country\Country $country */
        foreach ($countries as $country) {
            if (strtolower($country->getTranslation($langCode)['common']) == strtolower($countryName)) {
                return $country;
            }
        }

        return null;
    }
}
