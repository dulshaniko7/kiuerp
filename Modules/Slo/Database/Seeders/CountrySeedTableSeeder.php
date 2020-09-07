<?php

namespace Modules\Slo\Database\Seeders;

use App\Country;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
//use Modules\Slo\Entities\Country;

class CountrySeedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");
        $countries = [
            [
                'country_id'         => 1,
                'country_name'       => 'Afghanistan',
                'country_code' => 'af',
            ],
            [
                'country_id'         => 2,
                'country_name'       => 'Albania',
                'country_code' => 'al',
            ],
            [
                'country_id'         => 3,
                'country_name'       => 'Algeria',
                'country_code' => 'dz',
            ],
            [
                'country_id'         => 4,
                'country_name'       => 'American Samoa',
                'country_code' => 'as',
            ],
            [
                'country_id'         => 5,
                'country_name'       => 'Andorra',
                'country_code' => 'ad',
            ],
            [
                'country_id'         => 6,
                'country_name'       => 'Angola',
                'country_code' => 'ao',
            ],
            [
                'country_id'         => 7,
                'country_name'       => 'Anguilla',
                'country_code' => 'ai',
            ],
            [
                'country_id'         => 8,
                'country_name'       => 'Antarctica',
                'country_code' => 'aq',
            ],
            [
                'country_id'         => 9,
                'country_name'       => 'Antigua and Barbuda',
                'country_code' => 'ag',
            ],
            [
                'country_id'         => 10,
                'country_name'       => 'Argentina',
                'country_code' => 'ar',
            ],
            [
                'country_id'         => 11,
                'country_name'       => 'Armenia',
                'country_code' => 'am',
            ],
            [
                'country_id'         => 12,
                'country_name'       => 'Aruba',
                'country_code' => 'aw',
            ],
            [
                'country_id'         => 13,
                'country_name'       => 'Australia',
                'country_code' => 'au',
            ],
            [
                'country_id'         => 14,
                'country_name'       => 'Austria',
                'country_code' => 'at',
            ],
            [
                'country_id'         => 15,
                'country_name'       => 'Azerbaijan',
                'country_code' => 'az',
            ],
            [
                'country_id'         => 16,
                'country_name'       => 'Bahamas',
                'country_code' => 'bs',
            ],
            [
                'country_id'         => 17,
                'country_name'       => 'Bahrain',
                'country_code' => 'bh',
            ],
            [
                'country_id'         => 18,
                'country_name'       => 'Bangladesh',
                'country_code' => 'bd',
            ],
            [
                'country_id'         => 19,
                'country_name'       => 'Barbados',
                'country_code' => 'bb',
            ],
            [
                'country_id'         => 20,
                'country_name'       => 'Belarus',
                'country_code' => 'by',
            ],
            [
                'country_id'         => 21,
                'country_name'       => 'Belgium',
                'country_code' => 'be',
            ],
            [
                'country_id'         => 22,
                'country_name'       => 'Belize',
                'country_code' => 'bz',
            ],
            [
                'country_id'         => 23,
                'country_name'       => 'Benin',
                'country_code' => 'bj',
            ],
            [
                'country_id'         => 24,
                'country_name'       => 'Bermuda',
                'country_code' => 'bm',
            ],
            [
                'country_id'         => 25,
                'country_name'       => 'Bhutan',
                'country_code' => 'bt',
            ],
            [
                'country_id'         => 26,
                'country_name'       => 'Bolivia',
                'country_code' => 'bo',
            ],
            [
                'country_id'         => 27,
                'country_name'       => 'Bosnia and Herzegovina',
                'country_code' => 'ba',
            ],
            [
                'country_id'         => 28,
                'country_name'       => 'Botswana',
                'country_code' => 'bw',
            ],
            [
                'country_id'         => 29,
                'country_name'       => 'Brazil',
                'country_code' => 'br',
            ],
            [
                'country_id'         => 30,
                'country_name'       => 'British Indian Ocean Territory',
                'country_code' => 'io',
            ],
            [
                'country_id'         => 31,
                'country_name'       => 'British Virgin Islands',
                'country_code' => 'vg',
            ],
            [
                'country_id'         => 32,
                'country_name'       => 'Brunei',
                'country_code' => 'bn',
            ],
            [
                'country_id'         => 33,
                'country_name'       => 'Bulgaria',
                'country_code' => 'bg',
            ],
            [
                'country_id'         => 34,
                'country_name'       => 'Burkina Faso',
                'country_code' => 'bf',
            ],
            [
                'country_id'         => 35,
                'country_name'       => 'Burundi',
                'country_code' => 'bi',
            ],
            [
                'country_id'         => 36,
                'country_name'       => 'Cambodia',
                'country_code' => 'kh',
            ],
            [
                'country_id'         => 37,
                'country_name'       => 'Cameroon',
                'country_code' => 'cm',
            ],
            [
                'country_id'         => 38,
                'country_name'       => 'Canada',
                'country_code' => 'ca',
            ],
            [
                'country_id'         => 39,
                'country_name'       => 'Cape Verde',
                'country_code' => 'cv',
            ],
            [
                'country_id'         => 40,
                'country_name'       => 'Cayman Islands',
                'country_code' => 'ky',
            ],
            [
                'country_id'         => 41,
                'country_name'       => 'Central African Republic',
                'country_code' => 'cf',
            ],
            [
                'country_id'         => 42,
                'country_name'       => 'Chad',
                'country_code' => 'td',
            ],
            [
                'country_id'         => 43,
                'country_name'       => 'Chile',
                'country_code' => 'cl',
            ],
            [
                'country_id'         => 44,
                'country_name'       => 'China',
                'country_code' => 'cn',
            ],
            [
                'country_id'         => 45,
                'country_name'       => 'Christmas Island',
                'country_code' => 'cx',
            ],
            [
                'country_id'         => 46,
                'country_name'       => 'Cocos Islands',
                'country_code' => 'cc',
            ],
            [
                'country_id'         => 47,
                'country_name'       => 'Colombia',
                'country_code' => 'co',
            ],
            [
                'country_id'         => 48,
                'country_name'       => 'Comoros',
                'country_code' => 'km',
            ],
            [
                'country_id'         => 49,
                'country_name'       => 'Cook Islands',
                'country_code' => 'ck',
            ],
            [
                'country_id'         => 50,
                'country_name'       => 'Costa Rica',
                'country_code' => 'cr',
            ],
            [
                'country_id'         => 51,
                'country_name'       => 'Croatia',
                'country_code' => 'hr',
            ],
            [
                'country_id'         => 52,
                'country_name'       => 'Cuba',
                'country_code' => 'cu',
            ],
            [
                'country_id'         => 53,
                'country_name'       => 'Curacao',
                'country_code' => 'cw',
            ],
            [
                'country_id'         => 54,
                'country_name'       => 'Cyprus',
                'country_code' => 'cy',
            ],
            [
                'country_id'         => 55,
                'country_name'       => 'Czech Republic',
                'country_code' => 'cz',
            ],
            [
                'country_id'         => 56,
                'country_name'       => 'Democratic Republic of the Congo',
                'country_code' => 'cd',
            ],
            [
                'country_id'         => 57,
                'country_name'       => 'Denmark',
                'country_code' => 'dk',
            ],
            [
                'country_id'         => 58,
                'country_name'       => 'Djibouti',
                'country_code' => 'dj',
            ],
            [
                'country_id'         => 59,
                'country_name'       => 'Dominica',
                'country_code' => 'dm',
            ],
            [
                'country_id'         => 60,
                'country_name'       => 'Dominican Republic',
                'country_code' => 'do',
            ],
            [
                'country_id'         => 61,
                'country_name'       => 'East Timor',
                'country_code' => 'tl',
            ],
            [
                'country_id'         => 62,
                'country_name'       => 'Ecuador',
                'country_code' => 'ec',
            ],
            [
                'country_id'         => 63,
                'country_name'       => 'Egypt',
                'country_code' => 'eg',
            ],
            [
                'country_id'         => 64,
                'country_name'       => 'El Salvador',
                'country_code' => 'sv',
            ],
            [
                'country_id'         => 65,
                'country_name'       => 'Equatorial Guinea',
                'country_code' => 'gq',
            ],
            [
                'country_id'         => 66,
                'country_name'       => 'Eritrea',
                'country_code' => 'er',
            ],
            [
                'country_id'         => 67,
                'country_name'       => 'Estonia',
                'country_code' => 'ee',
            ],
            [
                'country_id'         => 68,
                'country_name'       => 'Ethiopia',
                'country_code' => 'et',
            ],
            [
                'country_id'         => 69,
                'country_name'       => 'Falkland Islands',
                'country_code' => 'fk',
            ],
            [
                'country_id'         => 70,
                'country_name'       => 'Faroe Islands',
                'country_code' => 'fo',
            ],
            [
                'country_id'         => 71,
                'country_name'       => 'Fiji',
                'country_code' => 'fj',
            ],
            [
                'country_id'         => 72,
                'country_name'       => 'Finland',
                'country_code' => 'fi',
            ],
            [
                'country_id'         => 73,
                'country_name'       => 'France',
                'country_code' => 'fr',
            ],
            [
                'country_id'         => 74,
                'country_name'       => 'French Polynesia',
                'country_code' => 'pf',
            ],
            [
                'country_id'         => 75,
                'country_name'       => 'Gabon',
                'country_code' => 'ga',
            ],
            [
                'country_id'         => 76,
                'country_name'       => 'Gambia',
                'country_code' => 'gm',
            ],
            [
                'country_id'         => 77,
                'country_name'       => 'Georgia',
                'country_code' => 'ge',
            ],
            [
                'country_id'         => 78,
                'country_name'       => 'Germany',
                'country_code' => 'de',
            ],
            [
                'country_id'         => 79,
                'country_name'       => 'Ghana',
                'country_code' => 'gh',
            ],
            [
                'country_id'         => 80,
                'country_name'       => 'Gibraltar',
                'country_code' => 'gi',
            ],
            [
                'country_id'         => 81,
                'country_name'       => 'Greece',
                'country_code' => 'gr',
            ],
            [
                'country_id'         => 82,
                'country_name'       => 'Greenland',
                'country_code' => 'gl',
            ],
            [
                'country_id'         => 83,
                'country_name'       => 'Grenada',
                'country_code' => 'gd',
            ],
            [
                'country_id'         => 84,
                'country_name'       => 'Guam',
                'country_code' => 'gu',
            ],
            [
                'country_id'         => 85,
                'country_name'       => 'Guatemala',
                'country_code' => 'gt',
            ],
            [
                'country_id'         => 86,
                'country_name'       => 'Guernsey',
                'country_code' => 'gg',
            ],
            [
                'country_id'         => 87,
                'country_name'       => 'Guinea',
                'country_code' => 'gn',
            ],
            [
                'country_id'         => 88,
                'country_name'       => 'Guinea-Bissau',
                'country_code' => 'gw',
            ],
            [
                'country_id'         => 89,
                'country_name'       => 'Guyana',
                'country_code' => 'gy',
            ],
            [
                'country_id'         => 90,
                'country_name'       => 'Haiti',
                'country_code' => 'ht',
            ],
            [
                'country_id'         => 91,
                'country_name'       => 'Honduras',
                'country_code' => 'hn',
            ],
            [
                'country_id'         => 92,
                'country_name'       => 'Hong Kong',
                'country_code' => 'hk',
            ],
            [
                'country_id'         => 93,
                'country_name'       => 'Hungary',
                'country_code' => 'hu',
            ],
            [
                'country_id'         => 94,
                'country_name'       => 'Iceland',
                'country_code' => 'is',
            ],
            [
                'country_id'         => 95,
                'country_name'       => 'India',
                'country_code' => 'in',
            ],
            [
                'country_id'         => 96,
                'country_name'       => 'Indonesia',
                'country_code' => 'country_id',
            ],
            [
                'country_id'         => 97,
                'country_name'       => 'Iran',
                'country_code' => 'ir',
            ],
            [
                'country_id'         => 98,
                'country_name'       => 'Iraq',
                'country_code' => 'iq',
            ],
            [
                'country_id'         => 99,
                'country_name'       => 'Ireland',
                'country_code' => 'ie',
            ],
            [
                'country_id'         => 100,
                'country_name'       => 'Isle of Man',
                'country_code' => 'im',
            ],
            [
                'country_id'         => 101,
                'country_name'       => 'Israel',
                'country_code' => 'il',
            ],
            [
                'country_id'         => 102,
                'country_name'       => 'Italy',
                'country_code' => 'it',
            ],
            [
                'country_id'         => 103,
                'country_name'       => 'Ivory Coast',
                'country_code' => 'ci',
            ],
            [
                'country_id'         => 104,
                'country_name'       => 'Jamaica',
                'country_code' => 'jm',
            ],
            [
                'country_id'         => 105,
                'country_name'       => 'Japan',
                'country_code' => 'jp',
            ],
            [
                'country_id'         => 106,
                'country_name'       => 'Jersey',
                'country_code' => 'je',
            ],
            [
                'country_id'         => 107,
                'country_name'       => 'Jordan',
                'country_code' => 'jo',
            ],
            [
                'country_id'         => 108,
                'country_name'       => 'Kazakhstan',
                'country_code' => 'kz',
            ],
            [
                'country_id'         => 109,
                'country_name'       => 'Kenya',
                'country_code' => 'ke',
            ],
            [
                'country_id'         => 110,
                'country_name'       => 'Kiribati',
                'country_code' => 'ki',
            ],
            [
                'country_id'         => 111,
                'country_name'       => 'Kosovo',
                'country_code' => 'xk',
            ],
            [
                'country_id'         => 112,
                'country_name'       => 'Kuwait',
                'country_code' => 'kw',
            ],
            [
                'country_id'         => 113,
                'country_name'       => 'Kyrgyzstan',
                'country_code' => 'kg',
            ],
            [
                'country_id'         => 114,
                'country_name'       => 'Laos',
                'country_code' => 'la',
            ],
            [
                'country_id'         => 115,
                'country_name'       => 'Latvia',
                'country_code' => 'lv',
            ],
            [
                'country_id'         => 116,
                'country_name'       => 'Lebanon',
                'country_code' => 'lb',
            ],
            [
                'country_id'         => 117,
                'country_name'       => 'Lesotho',
                'country_code' => 'ls',
            ],
            [
                'country_id'         => 118,
                'country_name'       => 'Liberia',
                'country_code' => 'lr',
            ],
            [
                'country_id'         => 119,
                'country_name'       => 'Libya',
                'country_code' => 'ly',
            ],
            [
                'country_id'         => 120,
                'country_name'       => 'Liechtenstein',
                'country_code' => 'li',
            ],
            [
                'country_id'         => 121,
                'country_name'       => 'Lithuania',
                'country_code' => 'lt',
            ],
            [
                'country_id'         => 122,
                'country_name'       => 'Luxembourg',
                'country_code' => 'lu',
            ],
            [
                'country_id'         => 123,
                'country_name'       => 'Macau',
                'country_code' => 'mo',
            ],
            [
                'country_id'         => 124,
                'country_name'       => 'North Macedonia',
                'country_code' => 'mk',
            ],
            [
                'country_id'         => 125,
                'country_name'       => 'Madagascar',
                'country_code' => 'mg',
            ],
            [
                'country_id'         => 126,
                'country_name'       => 'Malawi',
                'country_code' => 'mw',
            ],
            [
                'country_id'         => 127,
                'country_name'       => 'Malaysia',
                'country_code' => 'my',
            ],
            [
                'country_id'         => 128,
                'country_name'       => 'Maldives',
                'country_code' => 'mv',
            ],
            [
                'country_id'         => 129,
                'country_name'       => 'Mali',
                'country_code' => 'ml',
            ],
            [
                'country_id'         => 130,
                'country_name'       => 'Malta',
                'country_code' => 'mt',
            ],
            [
                'country_id'         => 131,
                'country_name'       => 'Marshall Islands',
                'country_code' => 'mh',
            ],
            [
                'country_id'         => 132,
                'country_name'       => 'Mauritania',
                'country_code' => 'mr',
            ],
            [
                'country_id'         => 133,
                'country_name'       => 'Mauritius',
                'country_code' => 'mu',
            ],
            [
                'country_id'         => 134,
                'country_name'       => 'Mayotte',
                'country_code' => 'yt',
            ],
            [
                'country_id'         => 135,
                'country_name'       => 'Mexico',
                'country_code' => 'mx',
            ],
            [
                'country_id'         => 136,
                'country_name'       => 'Micronesia',
                'country_code' => 'fm',
            ],
            [
                'country_id'         => 137,
                'country_name'       => 'Moldova',
                'country_code' => 'md',
            ],
            [
                'country_id'         => 138,
                'country_name'       => 'Monaco',
                'country_code' => 'mc',
            ],
            [
                'country_id'         => 139,
                'country_name'       => 'Mongolia',
                'country_code' => 'mn',
            ],
            [
                'country_id'         => 140,
                'country_name'       => 'Montenegro',
                'country_code' => 'me',
            ],
            [
                'country_id'         => 141,
                'country_name'       => 'Montserrat',
                'country_code' => 'ms',
            ],
            [
                'country_id'         => 142,
                'country_name'       => 'Morocco',
                'country_code' => 'ma',
            ],
            [
                'country_id'         => 143,
                'country_name'       => 'Mozambique',
                'country_code' => 'mz',
            ],
            [
                'country_id'         => 144,
                'country_name'       => 'Myanmar',
                'country_code' => 'mm',
            ],
            [
                'country_id'         => 145,
                'country_name'       => 'Namibia',
                'country_code' => 'na',
            ],
            [
                'country_id'         => 146,
                'country_name'       => 'Nauru',
                'country_code' => 'nr',
            ],
            [
                'country_id'         => 147,
                'country_name'       => 'Nepal',
                'country_code' => 'np',
            ],
            [
                'country_id'         => 148,
                'country_name'       => 'Netherlands',
                'country_code' => 'nl',
            ],
            [
                'country_id'         => 149,
                'country_name'       => 'Netherlands Antilles',
                'country_code' => 'an',
            ],
            [
                'country_id'         => 150,
                'country_name'       => 'New Caledonia',
                'country_code' => 'nc',
            ],
            [
                'country_id'         => 151,
                'country_name'       => 'New Zealand',
                'country_code' => 'nz',
            ],
            [
                'country_id'         => 152,
                'country_name'       => 'Nicaragua',
                'country_code' => 'ni',
            ],
            [
                'country_id'         => 153,
                'country_name'       => 'Niger',
                'country_code' => 'ne',
            ],
            [
                'country_id'         => 154,
                'country_name'       => 'Nigeria',
                'country_code' => 'ng',
            ],
            [
                'country_id'         => 155,
                'country_name'       => 'Niue',
                'country_code' => 'nu',
            ],
            [
                'country_id'         => 156,
                'country_name'       => 'North Korea',
                'country_code' => 'kp',
            ],
            [
                'country_id'         => 157,
                'country_name'       => 'Northern Mariana Islands',
                'country_code' => 'mp',
            ],
            [
                'country_id'         => 158,
                'country_name'       => 'Norway',
                'country_code' => 'no',
            ],
            [
                'country_id'         => 159,
                'country_name'       => 'Oman',
                'country_code' => 'om',
            ],
            [
                'country_id'         => 160,
                'country_name'       => 'Pakistan',
                'country_code' => 'pk',
            ],
            [
                'country_id'         => 161,
                'country_name'       => 'Palau',
                'country_code' => 'pw',
            ],
            [
                'country_id'         => 162,
                'country_name'       => 'Palestine',
                'country_code' => 'ps',
            ],
            [
                'country_id'         => 163,
                'country_name'       => 'Panama',
                'country_code' => 'pa',
            ],
            [
                'country_id'         => 164,
                'country_name'       => 'Papua New Guinea',
                'country_code' => 'pg',
            ],
            [
                'country_id'         => 165,
                'country_name'       => 'Paraguay',
                'country_code' => 'py',
            ],
            [
                'country_id'         => 166,
                'country_name'       => 'Peru',
                'country_code' => 'pe',
            ],
            [
                'country_id'         => 167,
                'country_name'       => 'Philippines',
                'country_code' => 'ph',
            ],
            [
                'country_id'         => 168,
                'country_name'       => 'Pitcairn',
                'country_code' => 'pn',
            ],
            [
                'country_id'         => 169,
                'country_name'       => 'Poland',
                'country_code' => 'pl',
            ],
            [
                'country_id'         => 170,
                'country_name'       => 'Portugal',
                'country_code' => 'pt',
            ],
            [
                'country_id'         => 171,
                'country_name'       => 'Puerto Rico',
                'country_code' => 'pr',
            ],
            [
                'country_id'         => 172,
                'country_name'       => 'Qatar',
                'country_code' => 'qa',
            ],
            [
                'country_id'         => 173,
                'country_name'       => 'Republic of the Congo',
                'country_code' => 'cg',
            ],
            [
                'country_id'         => 174,
                'country_name'       => 'Reunion',
                'country_code' => 're',
            ],
            [
                'country_id'         => 175,
                'country_name'       => 'Romania',
                'country_code' => 'ro',
            ],
            [
                'country_id'         => 176,
                'country_name'       => 'Russia',
                'country_code' => 'ru',
            ],
            [
                'country_id'         => 177,
                'country_name'       => 'Rwanda',
                'country_code' => 'rw',
            ],
            [
                'country_id'         => 178,
                'country_name'       => 'Saint Barthelemy',
                'country_code' => 'bl',
            ],
            [
                'country_id'         => 179,
                'country_name'       => 'Saint Helena',
                'country_code' => 'sh',
            ],
            [
                'country_id'         => 180,
                'country_name'       => 'Saint Kitts and Nevis',
                'country_code' => 'kn',
            ],
            [
                'country_id'         => 181,
                'country_name'       => 'Saint Lucia',
                'country_code' => 'lc',
            ],
            [
                'country_id'         => 182,
                'country_name'       => 'Saint Martin',
                'country_code' => 'mf',
            ],
            [
                'country_id'         => 183,
                'country_name'       => 'Saint Pierre and Miquelon',
                'country_code' => 'pm',
            ],
            [
                'country_id'         => 184,
                'country_name'       => 'Saint Vincent and the Grenadines',
                'country_code' => 'vc',
            ],
            [
                'country_id'         => 185,
                'country_name'       => 'Samoa',
                'country_code' => 'ws',
            ],
            [
                'country_id'         => 186,
                'country_name'       => 'San Marino',
                'country_code' => 'sm',
            ],
            [
                'country_id'         => 187,
                'country_name'       => 'Sao Tome and Principe',
                'country_code' => 'st',
            ],
            [
                'country_id'         => 188,
                'country_name'       => 'Saudi Arabia',
                'country_code' => 'sa',
            ],
            [
                'country_id'         => 189,
                'country_name'       => 'Senegal',
                'country_code' => 'sn',
            ],
            [
                'country_id'         => 190,
                'country_name'       => 'Serbia',
                'country_code' => 'rs',
            ],
            [
                'country_id'         => 191,
                'country_name'       => 'Seychelles',
                'country_code' => 'sc',
            ],
            [
                'country_id'         => 192,
                'country_name'       => 'Sierra Leone',
                'country_code' => 'sl',
            ],
            [
                'country_id'         => 193,
                'country_name'       => 'Singapore',
                'country_code' => 'sg',
            ],
            [
                'country_id'         => 194,
                'country_name'       => 'Sint Maarten',
                'country_code' => 'sx',
            ],
            [
                'country_id'         => 195,
                'country_name'       => 'Slovakia',
                'country_code' => 'sk',
            ],
            [
                'country_id'         => 196,
                'country_name'       => 'Slovenia',
                'country_code' => 'si',
            ],
            [
                'country_id'         => 197,
                'country_name'       => 'Solomon Islands',
                'country_code' => 'sb',
            ],
            [
                'country_id'         => 198,
                'country_name'       => 'Somalia',
                'country_code' => 'so',
            ],
            [
                'country_id'         => 199,
                'country_name'       => 'South Africa',
                'country_code' => 'za',
            ],
            [
                'country_id'         => 200,
                'country_name'       => 'South Korea',
                'country_code' => 'kr',
            ],
            [
                'country_id'         => 201,
                'country_name'       => 'South Sudan',
                'country_code' => 'ss',
            ],
            [
                'country_id'         => 202,
                'country_name'       => 'Spain',
                'country_code' => 'es',
            ],
            [
                'country_id'         => 203,
                'country_name'       => 'Sri Lanka',
                'country_code' => 'lk',
            ],
            [
                'country_id'         => 204,
                'country_name'       => 'Sudan',
                'country_code' => 'sd',
            ],
            [
                'country_id'         => 205,
                'country_name'       => 'Suriname',
                'country_code' => 'sr',
            ],
            [
                'country_id'         => 206,
                'country_name'       => 'Svalbard and Jan Mayen',
                'country_code' => 'sj',
            ],
            [
                'country_id'         => 207,
                'country_name'       => 'Swaziland',
                'country_code' => 'sz',
            ],
            [
                'country_id'         => 208,
                'country_name'       => 'Sweden',
                'country_code' => 'se',
            ],
            [
                'country_id'         => 209,
                'country_name'       => 'Switzerland',
                'country_code' => 'ch',
            ],
            [
                'country_id'         => 210,
                'country_name'       => 'Syria',
                'country_code' => 'sy',
            ],
            [
                'country_id'         => 211,
                'country_name'       => 'Taiwan',
                'country_code' => 'tw',
            ],
            [
                'country_id'         => 212,
                'country_name'       => 'Tajikistan',
                'country_code' => 'tj',
            ],
            [
                'country_id'         => 213,
                'country_name'       => 'Tanzania',
                'country_code' => 'tz',
            ],
            [
                'country_id'         => 214,
                'country_name'       => 'Thailand',
                'country_code' => 'th',
            ],
            [
                'country_id'         => 215,
                'country_name'       => 'Togo',
                'country_code' => 'tg',
            ],
            [
                'country_id'         => 216,
                'country_name'       => 'Tokelau',
                'country_code' => 'tk',
            ],
            [
                'country_id'         => 217,
                'country_name'       => 'Tonga',
                'country_code' => 'to',
            ],
            [
                'country_id'         => 218,
                'country_name'       => 'Trinidad and Tobago',
                'country_code' => 'tt',
            ],
            [
                'country_id'         => 219,
                'country_name'       => 'Tunisia',
                'country_code' => 'tn',
            ],
            [
                'country_id'         => 220,
                'country_name'       => 'Turkey',
                'country_code' => 'tr',
            ],
            [
                'country_id'         => 221,
                'country_name'       => 'Turkmenistan',
                'country_code' => 'tm',
            ],
            [
                'country_id'         => 222,
                'country_name'       => 'Turks and Caicos Islands',
                'country_code' => 'tc',
            ],
            [
                'country_id'         => 223,
                'country_name'       => 'Tuvalu',
                'country_code' => 'tv',
            ],
            [
                'country_id'         => 224,
                'country_name'       => 'U.S. Virgin Islands',
                'country_code' => 'vi',
            ],
            [
                'country_id'         => 225,
                'country_name'       => 'Uganda',
                'country_code' => 'ug',
            ],
            [
                'country_id'         => 226,
                'country_name'       => 'Ukraine',
                'country_code' => 'ua',
            ],
            [
                'country_id'         => 227,
                'country_name'       => 'United Arab Emirates',
                'country_code' => 'ae',
            ],
            [
                'country_id'         => 228,
                'country_name'       => 'United Kingdom',
                'country_code' => 'gb',
            ],
            [
                'country_id'         => 229,
                'country_name'       => 'United States',
                'country_code' => 'us',
            ],
            [
                'country_id'         => 230,
                'country_name'       => 'Uruguay',
                'country_code' => 'uy',
            ],
            [
                'country_id'         => 231,
                'country_name'       => 'Uzbekistan',
                'country_code' => 'uz',
            ],
            [
                'country_id'         => 232,
                'country_name'       => 'Vanuatu',
                'country_code' => 'vu',
            ],
            [
                'country_id'         => 233,
                'country_name'       => 'Vatican',
                'country_code' => 'va',
            ],
            [
                'country_id'         => 234,
                'country_name'       => 'Venezuela',
                'country_code' => 've',
            ],
            [
                'country_id'         => 235,
                'country_name'       => 'Vietnam',
                'country_code' => 'vn',
            ],
            [
                'country_id'         => 236,
                'country_name'       => 'Wallis and Futuna',
                'country_code' => 'wf',
            ],
            [
                'country_id'         => 237,
                'country_name'       => 'Western Sahara',
                'country_code' => 'eh',
            ],
            [
                'country_id'         => 238,
                'country_name'       => 'Yemen',
                'country_code' => 'ye',
            ],
            [
                'country_id'         => 239,
                'country_name'       => 'Zambia',
                'country_code' => 'zm',
            ],
            [
                'country_id'         => 240,
                'country_name'       => 'Zimbabwe',
                'country_code' => 'zw',
            ],
        ];

      //  Country::insert($countries);
Country::insert($countries);
    }
}
