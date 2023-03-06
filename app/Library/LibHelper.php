<?php

namespace App\Library;

use App\Models\Category;
use App\Models\Client;
use App\Models\ConvertCurrencies;
use App\Models\Coupon;
use App\Models\Filter;
use App\Models\Filter_category;
use App\Models\FilterCategory;
use App\Models\PageBanner;
use App\Models\Product;
use App\Models\Product_category;
use App\Models\ProductCategory;
use App\Models\ProductFilter;
use App\Models\SectionBanner;
use App\Models\Subscriber;
use App\Models\User;

class LibHelper
{
    const COUNTRIES = array
    (
        'CH' => 'Switzerland',
        'MK' => 'Macedonia',
        'AL' => 'Albania',
        'AF' => 'Afghanistan',
        'AX' => 'Aland Islands',
        'DZ' => 'Algeria',
        'AS' => 'American Samoa',
        'AD' => 'Andorra',
        'AO' => 'Angola',
        'AI' => 'Anguilla',
        'AQ' => 'Antarctica',
        'AG' => 'Antigua And Barbuda',
        'AR' => 'Argentina',
        'AM' => 'Armenia',
        'AW' => 'Aruba',
        'AU' => 'Australia',
        'AT' => 'Austria',
        'AZ' => 'Azerbaijan',
        'BS' => 'Bahamas',
        'BH' => 'Bahrain',
        'BD' => 'Bangladesh',
        'BB' => 'Barbados',
        'BY' => 'Belarus',
        'BE' => 'Belgium',
        'BZ' => 'Belize',
        'BJ' => 'Benin',
        'BM' => 'Bermuda',
        'BT' => 'Bhutan',
        'BO' => 'Bolivia',
        'BA' => 'Bosnia And Herzegovina',
        'BW' => 'Botswana',
        'BV' => 'Bouvet Island',
        'BR' => 'Brazil',
        'IO' => 'British Indian Ocean Territory',
        'BN' => 'Brunei Darussalam',
        'BG' => 'Bulgaria',
        'BF' => 'Burkina Faso',
        'BI' => 'Burundi',
        'KH' => 'Cambodia',
        'CM' => 'Cameroon',
        'CA' => 'Canada',
        'CV' => 'Cape Verde',
        'KY' => 'Cayman Islands',
        'CF' => 'Central African Republic',
        'TD' => 'Chad',
        'CL' => 'Chile',
        'CN' => 'China',
        'CX' => 'Christmas Island',
        'CC' => 'Cocos (Keeling) Islands',
        'CO' => 'Colombia',
        'KM' => 'Comoros',
        'CG' => 'Congo',
        'CD' => 'Congo, Democratic Republic',
        'CK' => 'Cook Islands',
        'CR' => 'Costa Rica',
        'CI' => 'Cote D\'Ivoire',
        'HR' => 'Croatia',
        'CU' => 'Cuba',
        'CY' => 'Cyprus',
        'CZ' => 'Czech Republic',
        'DK' => 'Denmark',
        'DJ' => 'Djibouti',
        'DM' => 'Dominica',
        'DO' => 'Dominican Republic',
        'EC' => 'Ecuador',
        'EG' => 'Egypt',
        'SV' => 'El Salvador',
        'GQ' => 'Equatorial Guinea',
        'ER' => 'Eritrea',
        'EE' => 'Estonia',
        'ET' => 'Ethiopia',
        'FK' => 'Falkland Islands (Malvinas)',
        'FO' => 'Faroe Islands',
        'FJ' => 'Fiji',
        'FI' => 'Finland',
        'FR' => 'France',
        'GF' => 'French Guiana',
        'PF' => 'French Polynesia',
        'TF' => 'French Southern Territories',
        'GA' => 'Gabon',
        'GM' => 'Gambia',
        'GE' => 'Georgia',
        'DE' => 'Germany',
        'GH' => 'Ghana',
        'GI' => 'Gibraltar',
        'GR' => 'Greece',
        'GL' => 'Greenland',
        'GD' => 'Grenada',
        'GP' => 'Guadeloupe',
        'GU' => 'Guam',
        'GT' => 'Guatemala',
        'GG' => 'Guernsey',
        'GN' => 'Guinea',
        'GW' => 'Guinea-Bissau',
        'GY' => 'Guyana',
        'HT' => 'Haiti',
        'HM' => 'Heard Island & Mcdonald Islands',
        'VA' => 'Holy See (Vatican City State)',
        'HN' => 'Honduras',
        'HK' => 'Hong Kong',
        'HU' => 'Hungary',
        'IS' => 'Iceland',
        'IN' => 'India',
        'ID' => 'Indonesia',
        'IR' => 'Iran, Islamic Republic Of',
        'IQ' => 'Iraq',
        'IE' => 'Ireland',
        'IM' => 'Isle Of Man',
        'IL' => 'Israel',
        'IT' => 'Italy',
        'JM' => 'Jamaica',
        'JP' => 'Japan',
        'JE' => 'Jersey',
        'JO' => 'Jordan',
        'KZ' => 'Kazakhstan',
        'KE' => 'Kenya',
        'KI' => 'Kiribati',
        'KR' => 'Korea',
        'KW' => 'Kuwait',
        'KG' => 'Kyrgyzstan',
        'LA' => 'Lao People\'s Democratic Republic',
        'LV' => 'Latvia',
        'LB' => 'Lebanon',
        'LS' => 'Lesotho',
        'LR' => 'Liberia',
        'LY' => 'Libyan Arab Jamahiriya',
        'LI' => 'Liechtenstein',
        'LT' => 'Lithuania',
        'LU' => 'Luxembourg',
        'MO' => 'Macao',
        'MG' => 'Madagascar',
        'MW' => 'Malawi',
        'MY' => 'Malaysia',
        'MV' => 'Maldives',
        'ML' => 'Mali',
        'MT' => 'Malta',
        'MH' => 'Marshall Islands',
        'MQ' => 'Martinique',
        'MR' => 'Mauritania',
        'MU' => 'Mauritius',
        'YT' => 'Mayotte',
        'MX' => 'Mexico',
        'FM' => 'Micronesia, Federated States Of',
        'MD' => 'Moldova',
        'MC' => 'Monaco',
        'MN' => 'Mongolia',
        'ME' => 'Montenegro',
        'MS' => 'Montserrat',
        'MA' => 'Morocco',
        'MZ' => 'Mozambique',
        'MM' => 'Myanmar',
        'NA' => 'Namibia',
        'NR' => 'Nauru',
        'NP' => 'Nepal',
        'NL' => 'Netherlands',
        'AN' => 'Netherlands Antilles',
        'NC' => 'New Caledonia',
        'NZ' => 'New Zealand',
        'NI' => 'Nicaragua',
        'NE' => 'Niger',
        'NG' => 'Nigeria',
        'NU' => 'Niue',
        'NF' => 'Norfolk Island',
        'MP' => 'Northern Mariana Islands',
        'NO' => 'Norway',
        'OM' => 'Oman',
        'PK' => 'Pakistan',
        'PW' => 'Palau',
        'PS' => 'Palestinian Territory, Occupied',
        'PA' => 'Panama',
        'PG' => 'Papua New Guinea',
        'PY' => 'Paraguay',
        'PE' => 'Peru',
        'PH' => 'Philippines',
        'PN' => 'Pitcairn',
        'PL' => 'Poland',
        'PT' => 'Portugal',
        'PR' => 'Puerto Rico',
        'QA' => 'Qatar',
        'RE' => 'Reunion',
        'RO' => 'Romania',
        'RU' => 'Russian Federation',
        'RW' => 'Rwanda',
        'BL' => 'Saint Barthelemy',
        'SH' => 'Saint Helena',
        'KN' => 'Saint Kitts And Nevis',
        'LC' => 'Saint Lucia',
        'MF' => 'Saint Martin',
        'PM' => 'Saint Pierre And Miquelon',
        'VC' => 'Saint Vincent And Grenadines',
        'WS' => 'Samoa',
        'SM' => 'San Marino',
        'ST' => 'Sao Tome And Principe',
        'SA' => 'Saudi Arabia',
        'SN' => 'Senegal',
        'RS' => 'Serbia',
        'SC' => 'Seychelles',
        'SL' => 'Sierra Leone',
        'SG' => 'Singapore',
        'SK' => 'Slovakia',
        'SI' => 'Slovenia',
        'SB' => 'Solomon Islands',
        'SO' => 'Somalia',
        'ZA' => 'South Africa',
        'GS' => 'South Georgia And Sandwich Isl.',
        'ES' => 'Spain',
        'LK' => 'Sri Lanka',
        'SD' => 'Sudan',
        'SR' => 'Suriname',
        'SJ' => 'Svalbard And Jan Mayen',
        'SZ' => 'Swaziland',
        'SE' => 'Sweden',
        'SY' => 'Syrian Arab Republic',
        'TW' => 'Taiwan',
        'TJ' => 'Tajikistan',
        'TZ' => 'Tanzania',
        'TH' => 'Thailand',
        'TL' => 'Timor-Leste',
        'TG' => 'Togo',
        'TK' => 'Tokelau',
        'TO' => 'Tonga',
        'TT' => 'Trinidad And Tobago',
        'TN' => 'Tunisia',
        'TR' => 'Turkey',
        'TM' => 'Turkmenistan',
        'TC' => 'Turks And Caicos Islands',
        'TV' => 'Tuvalu',
        'UG' => 'Uganda',
        'UA' => 'Ukraine',
        'AE' => 'United Arab Emirates',
        'GB' => 'United Kingdom',
        'US' => 'United States',
        'UM' => 'United States Outlying Islands',
        'UY' => 'Uruguay',
        'UZ' => 'Uzbekistan',
        'VU' => 'Vanuatu',
        'VE' => 'Venezuela',
        'VN' => 'Viet Nam',
        'VG' => 'Virgin Islands, British',
        'VI' => 'Virgin Islands, U.S.',
        'WF' => 'Wallis And Futuna',
        'EH' => 'Western Sahara',
        'YE' => 'Yemen',
        'ZM' => 'Zambia',
        'ZW' => 'Zimbabwe',
    );

    static $packages = [
        'Projects' => 14.90,
        'NewUser' => 4.90,
        'Finance' => 14.90,
    ];
    const  languages = ['en', 'al', 'mk'];

    static $stripePlans = [
        'Projects' => 'plan_IwQgolxaruch62',
        'NewUser' => 'plan_IwQh1ROsBqA3ck',
        'Finance' => 'plan_IwQieJiKyaHGMk',
    ];

    static function change_status($object, $status, $page)
    {
        if ($status == 'activate') {
            $object->status = 1;
            $object->save();
        } elseif ($status == 'deactivate') {
            $object->status = 0;
            $object->save();
        } elseif ($status == 'archive') {
            $object->status = 99;
            $object->save();
        } elseif ($status == 'delete'){
            $object->delete();
        }
        return redirect()->to('/admin/'.$page)->with('success', 'Action performed successfully!');
    }


    static function checkPermissionMiddleware($function)
    {

        if (auth()->check() && auth()->user()->subscribed($function)) {
            return true;
        }
        $return = false;
        foreach (auth()->user()->subscriptions as $s) {
            if ($s->name == $function && $s->stripe_status == 'active') {
                $return = true;
            }
        }
        if (auth()->user()->onTrial($function)) {
            return true;
        }
        if (auth()->user()->subscription($function)) {
            if (auth()->user()->subscription($function)->onGracePeriod()) {
                return true;
            }
        }
        return $return;
    }

    static function checkSubscription($function, $id)
    {
        $user = User::find($id);
        if ($user->subscribed($function)) {
            return true;
        }
        $return = false;
        foreach ($user->subscriptions as $s) {
            if ($s->name == $function && $s->stripe_status == 'active') {
                $return = true;
            }
        }
        return $return;
    }

    public function getParents($id, $parentIds = [])
    {
        $category = Category::where('id', $id)->with('parent')->first();
        $parentIds[] = $category->parent_id;
        while ($category->parent_id != 0) {
            $this->getParents($category->parent_id, $parentIds);
        }
        return $parentIds;

    }

    static function countProducts($cat)
    {
        $category = Category::where('id', $cat)->where('status', 1)->first();
        $categoriesIDs = [];
        $new = [];
        if (isset($category) && $category != null) {
            if (isset($category->subcategories) && count($category->subcategories) > 0) {
                $categoriesIDs = $category->subcategories->pluck('id');

                $new = $categoriesIDs;
                foreach ($category->subcategories as $sub) {
                    if (isset($sub->subcategories) && count($sub->subcategories) > 0) {

                        $subcategoriesIDs = $sub->subcategories->pluck('id');
                        $new = $new->concat($subcategoriesIDs);
                        foreach ($sub->subcategories as $child) {
                            if (isset($child->subcategories) && count($child->subcategories) > 0) {

                                $childIDs = $child->subcategories->pluck('id');
                                $new = $new->concat($childIDs);
                            }
                        }
                    }
                }
                $new[] = $category->id;

            } else
                $new = (array)$category->id;
        }


        $prodsId = Product_category::whereIn('category_id', $new)->distinct()->pluck('product_id');

        $numProducts = count($prodsId);
        $categories = Category::where('status', 1)->get();
        $main_categories = Category::where('parent_id', 0)->where('status', 1)
            ->orderBy('menu_order', 'asc')
            ->with('parent')
            ->get();
        return $numProducts;

    }

    static function resetFilter()
    {
        $mainFilters = Filter::where('parent_id', 0)->where('status', 1)->orderBy('created_at')->get();

        session()->put('priceFrom', 0);
        session()->put('priceTo', 100000);
        session()->put('colorFilter', null);
        session()->put('sizeFilter', null);
        foreach ($mainFilters as $f) {
            session()->put(str_replace(' ', '_', LibHelper::echoJson($f->title, __('en'))), null);
        }
        session()->put('search', null);

    }

    static function clearSearch()
    {
        session()->put('search', null);
    }

    static function searchFilterProducts($cat, $subcat, $child, $subtitle)
    {
        if (session('id')) {
            session(['id' => 0]);
        }
        $priceFrom = 0;
        $priceTo = 100000;
        $colorFilter = '*';
        $sizeFilter = '*';
        $search = '';
        $orderBy = '';

//        $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']
//            === 'on' ? "https" : "http") .
//            "://" . $_SERVER['HTTP_HOST'] .
//            $_SERVER['REQUEST_URI'];
//        dd($link);

        // SET SORT
        if (session('orderBy') != null) {
            $orderBy = session('orderBy');
        }
        if (request('orderby') != null) {
            $orderBy = request('orderby');
            session(['orderBy' => $orderBy]);
        }

//        if (session('search')!=null){
        $search = session('search');
        $fromSearch = true;
//        }
        if (request('search') != null) {
            $search = request('search');
            session(['search' => $search]);
        }
        if (session('priceFrom') != null) {
            $priceFrom = session('priceFrom');
        }
        if (request('price_from') != null) {
            $priceFrom = request('price_from');
            session(['priceFrom' => $priceFrom]);
        }
        if (session('priceTo') != null) {
            $priceTo = session('priceTo');
        }
        if (request('price_to') != null) {
            $priceTo = request('price_to');
            session(['priceTo' => $priceTo]);
        }

        if (session('colorFilter') != null) {
            $colorFilter = session('colorFilter');
        }
        if (request('colorFilter') != null) {
            $colorFilter = request('colorFilter');
            session(['colorFilter' => $colorFilter]);
        }
        if (session('sizeFilter') != null) {
            $sizeFilter = session('sizeFilter');
        }
        if (request('sizeFilter') != null) {
            $sizeFilter = request('sizeFilter');
            session(['sizeFilter' => $sizeFilter]);
        }


//        //        SEARCH
//        if ($search != '' && $search != null) {
//            $products->where(function ($q) use ($search) {
//                $q->where('name', 'like', '%' . $search . '%')->orWhere('code', 'like', '%' . $search . '%');
//            })
//                ->orWhereHas('categories', function ($query) use ($search) {
//                    $query->whereHas('category', function ($quer) use ($search) {
//                        $quer->where('id',$search);
//                    });
//                });
//
//            $totalProducts->where(function ($q) use ($search) {
//                $q->where('name', 'like', '%' . $search . '%')->orWhere('code', 'like', '%' . $search . '%');
//            })
//                ->orWhereHas('categories', function ($query) use ($search) {
//                    $query->whereHas('category', function ($quer) use ($search) {
//                        $quer->where('id',$search);
//                    });
//                });
//        }


//        FILTER BY CATEGORIES
        $message = 'Selected Category is not found.';

        $prodsId = [];
        $shopSectionBanner = '';
        $bannerTitle = '';
        if ($cat != null) {
            $category = Category::where('parent_id', 0)->where('title', 'LIKE', '%' . urldecode($cat) . '%')->where('status', 1)->first();
            if ($category == null) {
                return [
                    'message' => $message
                ];
            }
            $shopSectionBanner = $category->shop_section_banner;
            $bannerTitle = $category->title;
            if ($subcat == null) {
                $categoriesIDs = [];
                if (count($category->subcategories) > 0) {
                    foreach ($category->subcategories as $subcategory) {
                        if (count($subcategory->subcategories) > 0) {
                            foreach ($subcategory->subcategories as $child) {
                                $categoriesIDs[] = $child->id;
                            }
                        }
                        $categoriesIDs[] = $subcategory->id;
                    }
                }

                $categoriesIDs[] = $category->id;

                $prodsId = Product_category::whereIn('category_id', $categoriesIDs)->pluck('product_id');


            } else {
                $subcategory = Category::where('parent_id', $category->id)->where('title', 'LIKE', '%' . urldecode($subcat) . '%')->where('status', 1)->first();
                $prodsId = [];


                if ($subcategory != null) {
                    $bannerTitle = $subcategory->title;
                    if ($child == null) {
                        $categoriesIDs = [];
                        if (count($subcategory->subcategories) > 0) {
                            $categoriesIDs = $subcategory->subcategories->pluck('id');
                        }
                        $categoriesIDs[] = $subcategory->id;

                        $prodsId = Product_category::whereIn('category_id', $categoriesIDs)->pluck('product_id');

                    } else {
                        $children = Category::where('parent_id', $subcategory->id)->where('title', 'LIKE', '%' . urldecode($child) . '%')->where('status', 1)->first();
                        if ($children == null) {
                            return [
                                'message' => $message
                            ];
                        }
                        $bannerTitle = $children->title;

                        if ($subtitle == null) {
                            $categoriesIDs = [];
                            if (count($children->subcategories) > 0) {
                                $categoriesIDs = $children->subcategories->pluck('id');
                            }
                            $categoriesIDs[] = $children->id;

                            $prodsId = Product_category::whereIn('category_id', $categoriesIDs)->pluck('product_id');

                        } else {
                            $subTitleCat = Category::where('parent_id', $children->id)->where('title', 'LIKE', '%' . urldecode($subtitle) . '%')->where('status', 1)->first();
                            if ($subTitleCat == null) {
                                return [
                                    'message' => $message
                                ];

                            }
                            $bannerTitle = $subTitleCat->title;
                            $prodsId = [];
                            $prodsId = Product_category::where('category_id', $subTitleCat->id)->pluck('product_id');
                        }

                    }
                } else {
                    return [
                        'message' => $message
                    ];
                }
            }
        }
        $products = [];
        $products = Product::query();
        $totalProducts = Product::query();
        if ($cat != null) {
            $products = $products->whereIn('id', $prodsId);
            $totalProducts = $totalProducts->whereIn('id', $prodsId);
        }


//        FILTER BY PRICE
        $min = (int)$priceFrom;
        $max = (int)$priceTo;
        if (session()->has('currency') && session('currency') == '€') {
            $currRate = ConvertCurrencies::first();
            $min = $min / (double)$currRate->eur;
            $max = $max / (double)$currRate->eur;
        }
        $products = $products->where('status', 1)->whereBetween('price', [$min, $max]);


//        SORT
        if ($orderBy != '') {
            if ($orderBy == 'price') {
                $products->orderBy('price', 'ASC');
            }
            if ($orderBy == 'price-desc') {
                $products->orderBy('price', 'DESC');
            }
            if ($orderBy == 'date') {
                $products->orderBy('created_at', 'DESC');
            }
            if ($orderBy == 'name-a-z') {
                $products->orderBy('name', 'ASC');
            }
            if ($orderBy == 'name-z-a') {
                $products->orderBy('name', 'DESC');
            }
            if ($orderBy == 'default') {
                $products->orderBy('created_at', 'DESC');
            }
        }


        //        SEARCH
        if ($search != '' && $search != null) {
            $products->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')->orWhere('code', 'like', '%' . $search . '%');
            })
                ->orWhereHas('categories', function ($query) use ($search) {
                    $query->whereHas('category', function ($quer) use ($search) {
                        $quer->where('title', 'like', '%' . $search . '%');
                    });
                })
                ->orWhereHas('myFilters', function ($query) use ($search) {
                    $query->whereHas('filter', function ($quer) use ($search) {
                        $quer->where('title', 'like', '%' . $search . '%');
                    });
                })
                ->orWhereHas('tags', function ($query) use ($search) {
                    $query->where('tag', 'like', '%' . $search . '%');
                });

            $totalProducts->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')->orWhere('code', 'like', '%' . $search . '%');
            })
                ->orWhereHas('categories', function ($query) use ($search) {
                    $query->whereHas('category', function ($quer) use ($search) {
                        $quer->where('id', $search);
                    });
                });
        }


//        IF NEW FILTER
        $filterCategory = urldecode($cat);
        $filterSubcategory = urldecode($subcat);
        $filterChildren = urldecode($child);
        $filterSubtitle = urldecode($subtitle);
        $filterCat = null;
        $filterSubcat = null;
        $filterChild = null;
        $filterSubT = null;
        $filtersFromCategory = [];
        if ($filterCategory != "") {
            $filterCat = Category::where('title', 'LIKE', '%' . $filterCategory . '%')->where('parent_id', 0)->first();
            if ($filterSubcategory != "") {
                $filterSubcat = Category::where('title', 'LIKE', '%' . $filterSubcategory . '%')->where('parent_id', $filterCat->id)->first();
                if ($filterChildren != "") {
                    $filterChild = Category::where('title', 'LIKE', '%' . $filterChildren . '%')->where('parent_id', $filterSubcat->id)->first();
                    if ($filterSubtitle != "") {
                        $filterSubT = Category::where('title', 'LIKE', '%' . $filterSubtitle . '%')->where('parent_id', $filterChild->id)->first();
                    }
                }
            }
        }
        if ($filterCat != null && $filterSubcat != null && $filterChild != null && $filterSubT != null) {
            $filtersFromCategory = $filterSubT->filters->pluck('filter_id')->toArray();
        } else if ($filterCat != null && $filterSubcat != null && $filterChild != null) {
            $filtersFromCategory = $filterChild->filters->pluck('filter_id')->toArray();
        } else if ($filterCat != null && $filterSubcat != null) {
            $filtersFromCategory = $filterSubcat->filters->pluck('filter_id')->toArray();
        } elseif ($filterCat != null) {
            $filtersFromCategory = $filterCat->filters->pluck('filter_id')->toArray();
        } else {
            $filtersFromCategory = [];
        }
        $filters = Filter::where('status', 1)->get();
        $mainFilters = [];
        if ($filtersFromCategory != []) {
            $mainFilters = Filter::where('parent_id', 0)->whereIn('id', $filtersFromCategory)->where('status', 1)->orderBy('created_at')->get();
        } else if ($filterCat == null) {
            $mainFilters = Filter::where('parent_id', 0)->where('status', 1)->orderBy('created_at')->get();
            $filtersFromCategory = 'none';
        }

        $filterValues = [];
        $selectedFilters = [];
        $filterProdIds = [];
        foreach ($mainFilters as $f) {
            $filterValue = '*';

            $filterName = str_replace(' ', '_', strtolower(LibHelper::echoJson($f->title, __('en'))));
            if (session($filterName) != null) {
                $filterValue = session($filterName);
            }
            if (request($filterName) != null) {
                $filterValue = request($filterName);
                session([$filterName => $filterValue]);
            }
            $filterValues[$filterName] = $filterValue;


            if ($filterValue != '*') {
//                $filterValue = $filterValues[str_replace(' ', '_', LibHelper::echoJson($f->title, __('en')))];

//                1-M relation
//                $str = $filterName . ':' . $filterValue . ';';
//                $products->where(function ($q) use ($str) {
//                    $q->where('filters', 'like', '%' . $str . '%');
//                });

                $filtersExploded = explode(',', $filterValue);
                foreach ($filtersExploded as $fx) {
                    if (is_numeric($fx)) {
                        $selectedFilters[] = (int)$fx;
                    }
                }

//                M-N relation
                $ids = ProductFilter::where('filter_id', $filterValue)->pluck('product_id');
                foreach ($ids as $i) {
                    if (!in_array($i, $filterProdIds)) {
                        $filterProdIds[] = $i;
                    }
                }

            }
        }
//        $myfilters = Filter::whereIn('id', $selectedFilters)->get();
//        $tr = ProductFilter::join('filters', 'filters.id', '=', 'product_filters.filter_id')
//            ->whereIn('filters.id', $selectedFilters)
//            ->selectRaw('COUNT(*) as counted,product_filters.product_id')
//            ->groupBy('product_filters.product_id')
//            ->get();
//        $max = count($selectedFilters);
//        $pIds = $tr->where('counted', $max)->pluck('product_id');
//        $products->whereIn('id', $pIds);

        $products = $products->with('myFilters');
        $products = $products->with('orderItem');

        if (isset($selectedFilters) && count($selectedFilters) > 0) {
            $products->whereHas('myFilters', function ($query) use ($selectedFilters) {
                $query->whereIn('filter_id', $selectedFilters);
            });
        }


//        $products->whereHas('orderItem', function ($query) {
//            $query->selectRaw('product_id,SUM(qty) as sumqty')
//                ->groupBy('product_id')
//                ->orderBy('sumqty', 'desc');
//
//        });


        $products = $products->
        orderBy('isBestseller', 'desc')->
        orderBy('count_ordered', 'desc')->
        where('status', 1)->with('categories')
            ->with('hasAction')->paginate(18);

        $totalProducts = $totalProducts->where('status', 1)->get();
        $countProds = count($totalProducts);
        $categories = Category::where('status', 1)->get();
        $main_categories = Category::where('parent_id', 0)->where('status', 1)
            ->orderBy('menu_order', 'asc')
            ->with('parent')
            ->get();
        $banner = PageBanner::where('page', 'shop_page')->whereStatus(1)->first();

        return [
            'banner' => $banner,
            'categories' => $categories,
            'main_categories' => $main_categories,
            'filters' => $filters,
            'mainFilters' => $mainFilters,
            'filterCategory' => $filterCategory,
            'filterSubcategory' => $filterSubcategory,
            'filterChildren' => $filterChildren,
            'filterCat' => $filterCat,
            'filterSubcat' => $filterSubcat,
            'filterChild' => $filterChild,
            'products' => $products,
            'priceFrom' => $priceFrom,
            'priceTo' => $priceTo,
            'sizeFilter' => $sizeFilter,
            'colorFilter' => $colorFilter,
            'orderBy' => $orderBy,
            'search' => $search,
            'filterValues' => $filterValues,
            'countProds' => $countProds,
            'filtersFromCategory' => $filtersFromCategory,
            'fromSearch' => $fromSearch,
            'shopSectionBanner' => $shopSectionBanner,
            'bannerTitle' => $bannerTitle
        ];


    }

    static function searchFilterProductsById($id)
    {
        if (session('id') != $id) {
            self::resetFilter();
            self::clearSearch();
        }
        session(['last_visited_url' => $_SERVER['REQUEST_URI']]);
        session(['id' => $id]);
        $priceFrom = 0;
        $priceTo = 100000;
        $colorFilter = '*';
        $sizeFilter = '*';
        $search = '';
        $orderBy = '';

        // SET SORT
        if (session('orderBy') != null) {
            $orderBy = session('orderBy');
        }
        if (request('orderby') != null) {
            $orderBy = request('orderby');
            session(['orderBy' => $orderBy]);
        }

//        if (session('search')!=null){
        $search = session('search');
//        }
        if (request('search') != null) {
            $search = request('search');
            session(['search' => $search]);
        }
        if (session('priceFrom') != null) {
            $priceFrom = session('priceFrom');
        }
        if (request('price_from') != null) {
            $priceFrom = request('price_from');
            session(['priceFrom' => $priceFrom]);
        }
        if (session('priceTo') != null) {
            $priceTo = session('priceTo');
        }
        if (request('price_to') != null) {
            $priceTo = request('price_to');
            session(['priceTo' => $priceTo]);
        }



//        FILTER BY CATEGORIES
        $message = 'Selected Category is not found.';
        $prodsId = [];

        $category = Category::where('id', $id)->where('status', 1)->with('parent')->first();
        if ($category == null) {
            return [
                'message' => $message
            ];
        }
        $bannerTitle = '';
        $bannerTitle = $category->title;
        if (isset($category->parent) && $category->parent != null) {
            if (isset($category->parent->parent) && $category->parent->parent != null) {
                if (isset($category->parent->parent->parent) && $category->parent->parent->parent != null) {
                    $shopSectionBanner = $category->parent->parent->parent->shop_section_banner;

                } else {
                    $shopSectionBanner = $category->parent->parent->shop_section_banner;
                }
            } else {
                $shopSectionBanner = $category->parent->shop_section_banner;
            }
        } else {
            $shopSectionBanner = $category->shop_section_banner;
        }

        $categoriesIDs = [];
        if (count($category->subcategories) > 0) {
            foreach ($category->subcategories as $subcategory) {
                if (count($subcategory->subcategories) > 0) {
                    foreach ($subcategory->subcategories as $child) {
                        $categoriesIDs[] = $child->id;
                    }
                }
                $categoriesIDs[] = $subcategory->id;
            }
        }

        $categoriesIDs[] = $category->id;

        $prodsId = ProductCategory::whereIn('category_id', $categoriesIDs)->pluck('product_id');


        $products = [];
        $products = Product::query();
        $totalProducts = Product::query();
        $products = $products->whereIn('id', $prodsId);
        $totalProducts = $totalProducts->whereIn('id', $prodsId);


//        FILTER BY PRICE
        $min = (int)$priceFrom;
        $max = (int)$priceTo;
        if (session()->has('currency') && session('currency') == '€') {
            $currRate = ConvertCurrencies::first();
            $min = $min / (double)$currRate->eur;
            $max = $max / (double)$currRate->eur;
        }
        $products = $products->where('status', 1)->whereBetween('price', [$min, $max]);


//        SORT
        if ($orderBy != '') {
            if ($orderBy == 'price') {
                $products->orderBy('price', 'ASC');
            }
            if ($orderBy == 'price-desc') {
                $products->orderBy('price', 'DESC');
            }
            if ($orderBy == 'date') {
                $products->orderBy('created_at', 'DESC');
            }
            if ($orderBy == 'name-a-z') {
                $products->orderBy('name', 'ASC');
            }
            if ($orderBy == 'name-z-a') {
                $products->orderBy('name', 'DESC');
            }
            if ($orderBy == 'default') {
                $products->orderBy('created_at', 'DESC');
            }
        }

//        SEARCH
        if ($search != '' && $search != null) {
            $products->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')->orWhere('code', 'like', '%' . $search . '%');
            })
                ->orWhereHas('categories', function ($query) use ($search) {
                    $query->whereHas('category', function ($quer) use ($search) {
                        $quer->where('title', 'like', '%' . $search . '%');
                    });
                });


            $totalProducts->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')->orWhere('code', 'like', '%' . $search . '%');
            });
        }

//        IF NEW FILTER

        $filterCat = Category::where('id', $id)->first();
        if ($filterCat != null) {
            $filtersFromCategory = $filterCat->filters->pluck('filter_id')->toArray();
        } else {
            $filtersFromCategory = [];
        }


        $filters = Filter::where('status', 1)->get();
        $mainFilters = [];
        if ($filtersFromCategory != []) {
            $mainFilters = Filter::where('parent_id', 0)->whereIn('id', $filtersFromCategory)->where('status', 1)->orderBy('created_at')->get();
        } else if ($filterCat == null) {
            $mainFilters = Filter::where('parent_id', 0)->where('status', 1)->orderBy('created_at')->get();
            $filtersFromCategory = 'none';
        }

        $filterValues = [];
        $selectedFilters = [];
        $filterProdIds = [];
        foreach ($mainFilters as $f) {
            $filterValue = '*';

            $filterName = str_replace(' ', '_', strtolower(LibHelper::echoJson($f->title, __('en'))));
            if (session($filterName) != null) {
                $filterValue = session($filterName);
            }
            if (request($filterName) != null) {
                $filterValue = request($filterName);
                session([$filterName => $filterValue]);
            }
            $filterValues[$filterName] = $filterValue;


            if ($filterValue != '*') {

                $filtersExploded = explode(',', $filterValue);
                foreach ($filtersExploded as $fx) {
                    if (is_numeric($fx)) {
                        $selectedFilters[] = (int)$fx;
                    }
                }

                $ids = ProductFilter::where('filter_id', $filterValue)->pluck('product_id');
                foreach ($ids as $i) {
                    if (!in_array($i, $filterProdIds)) {
                        $filterProdIds[] = $i;
                    }
                }

            }
        }

        $products = $products->with('myFilters');
        $products = $products->with('orderItem');

//        $products->whereHas('myFilters', function ($query) use ($selectedFilters) {
//            $query->whereIn('filter_id', $selectedFilters);
//        }, '=', count($selectedFilters));

        if (isset($selectedFilters) && count($selectedFilters) > 0) {
            $products->whereHas('myFilters', function ($query) use ($selectedFilters) {
                $query->whereIn('filter_id', $selectedFilters);
            });
        }

        $products = $products->
        orderBy('isBestseller', 'desc')->
        orderBy('count_ordered', 'desc')->
        where('status', 1)->with('categories')
            ->with('hasAction')->paginate(18);

        $totalProducts = $totalProducts->where('status', 1)->get();
        $countProds = count($totalProducts);
        $categories = Category::where('status', 1)->get();
        $main_categories = Category::where('parent_id', 0)->where('status', 1)
            ->orderBy('menu_order', 'asc')
            ->with('parent')
            ->get();
        $banner = PageBanner::where('page', 'shop_page')->whereStatus(1)->first();

        return [
            'banner' => $banner,
            'categories' => $categories,
            'main_categories' => $main_categories,
            'filters' => $filters,
            'mainFilters' => $mainFilters,
            'filterCat' => $filterCat,
            'products' => $products,
            'priceFrom' => $priceFrom,
            'priceTo' => $priceTo,
            'sizeFilter' => $sizeFilter,
            'colorFilter' => $colorFilter,
            'orderBy' => $orderBy,
            'search' => $search,
            'filterValues' => $filterValues,
            'countProds' => $countProds,
            'filtersFromCategory' => $filtersFromCategory,
            'shopSectionBanner' => $shopSectionBanner,
            'bannerTitle' => $bannerTitle
        ];


    }

    static function calculateDiscount($price, $coupon, $valid)
    {
        $itemPrice = $price;
        if ($coupon != null && (int)$coupon->nr > 0 && $valid == true) {
            if ($coupon->type == 1) {
                $itemPrice = $price - ($price * (float)$coupon->value / 100); //%
            } else {
                $itemPrice = $price - (float)$coupon->value; //-
            }
        }

        return $itemPrice;
    }




    static function setSelectedFilters($selectedFilters, $category)
    {
        if ($selectedFilters != null) {
            foreach ($selectedFilters as $selectedFilter) {
                $fCategory = new FilterCategory();
                $fCategory->filter_id = $selectedFilter;
                $fCategory->category_id = $category->id;
                $fCategory->status = 1;
                $fCategory->save();
            }
        }
    }

    static function getSubscribers()
    {
        return Subscriber::all();;
    }

    static function check_unique_coupon_code($id, $code)
    {
        $flag = true;
        if ($id != 0)
            $same_code_coupon = Coupon::where('id', '!=', $id)->where('code', $code)->first();
        else
            $same_code_coupon = Coupon::where('code', $code)->first();

        if ($same_code_coupon != null)
            $flag = false;

        return $flag;

    }
    static function check_client_email($id, $email)
    {
        $flag = true;
        if ($id != 0)
            $same_email_user = Client::where('id', '!=', $id)->where('email', $email)->first();
        else
            $same_email_user = Client::where('email', $email)->first();

        if ($same_email_user != null)
            $flag = false;

        return $flag;

    }


    static function check_filter_name($id, $title, $parent_id)
    {
        $flag = true;
        if ($id != 0)
            $same_name_filter = Filter::where('id', '!=', $id)->where('title', json_encode($title))->where('parent_id', $parent_id)->first();
        else
            $same_name_filter = Filter::where('title', json_encode($title))->where('parent_id', $parent_id)->first();

        if ($same_name_filter != null)
            $flag = false;

        return $flag;
    }

    static function check_category_name($id, $title, $parent_id)
    {
        $flag = true;
        if ($id != 0)
            $catSameName = Category::where('id', '!=', $id)->where('title', json_encode($title))->where('parent_id', (int)$parent_id)->first();
        else
            $catSameName = Category::where('title', json_encode($title))->where('parent_id', (int)$parent_id)->first();

        if ($catSameName != null)
            $flag = false;

        return $flag;
    }

    static function echoJson($json, $lang)
    {
        $data = (array)($json);
        $return = null;
        if (isset($data[$lang])) {
            $return = $data[$lang];
        }
        return $return;
    }


}
