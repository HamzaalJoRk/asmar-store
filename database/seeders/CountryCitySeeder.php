<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\City;
use Illuminate\Database\Seeder;

class CountryCitySeeder extends Seeder
{
    public function run(): void
    {
        $countries = [
            // سوريا
            [
                'code' => '+963',
                'sort' => 1,
                'name_ar' => 'سوريا',
                'name_en' => 'Syria',
                'cities' => [
                    ['name_ar' => 'دمشق', 'name_en' => 'Damascus'],
                    ['name_ar' => 'حلب', 'name_en' => 'Aleppo'],
                    ['name_ar' => 'حمص', 'name_en' => 'Homs'],
                    ['name_ar' => 'حماة', 'name_en' => 'Hama'],
                    ['name_ar' => 'اللاذقية', 'name_en' => 'Latakia'],
                    ['name_ar' => 'طرطوس', 'name_en' => 'Tartus'],
                    ['name_ar' => 'دير الزور', 'name_en' => 'Deir ez-Zor'],
                    ['name_ar' => 'الرقة', 'name_en' => 'Raqqa'],
                    ['name_ar' => 'الحسكة', 'name_en' => 'Al-Hasakah'],
                    ['name_ar' => 'درعا', 'name_en' => 'Daraa'],
                    ['name_ar' => 'إدلب', 'name_en' => 'Idlib'],
                    ['name_ar' => 'السويداء', 'name_en' => 'As-Suwayda'],
                    ['name_ar' => 'القنيطرة', 'name_en' => 'Quneitra'],
                    ['name_ar' => 'ريف دمشق', 'name_en' => 'Rif Dimashq']
                ]
            ],
            // السعودية
            [
                'code' => '+966',
                'sort' => 2,
                'name_ar' => 'المملكة العربية السعودية',
                'name_en' => 'Saudi Arabia',
                'cities' => [
                    ['name_ar' => 'الرياض', 'name_en' => 'Riyadh'],
                    ['name_ar' => 'جدة', 'name_en' => 'Jeddah'],
                    ['name_ar' => 'مكة المكرمة', 'name_en' => 'Makkah'],
                    ['name_ar' => 'المدينة المنورة', 'name_en' => 'Madinah'],
                    ['name_ar' => 'الدمام', 'name_en' => 'Dammam'],
                    ['name_ar' => 'الطائف', 'name_en' => 'Taif'],
                    ['name_ar' => 'تبوك', 'name_en' => 'Tabuk'],
                    ['name_ar' => 'القصيم', 'name_en' => 'Qassim'],
                    ['name_ar' => 'حائل', 'name_en' => 'Hail'],
                    ['name_ar' => 'أبها', 'name_en' => 'Abha'],
                    ['name_ar' => 'جازان', 'name_en' => 'Jazan'],
                    ['name_ar' => 'نجران', 'name_en' => 'Najran'],
                    ['name_ar' => 'الباحة', 'name_en' => 'Al Baha'],
                    ['name_ar' => 'الجوف', 'name_en' => 'Al Jouf'],
                ]
            ],
            // الإمارات
            [
                'code' => '+971',
                'sort' => 3,
                'name_ar' => 'الإمارات العربية المتحدة',
                'name_en' => 'United Arab Emirates',
                'cities' => [
                    ['name_ar' => 'دبي', 'name_en' => 'Dubai'],
                    ['name_ar' => 'أبو ظبي', 'name_en' => 'Abu Dhabi'],
                    ['name_ar' => 'الشارقة', 'name_en' => 'Sharjah'],
                    ['name_ar' => 'عجمان', 'name_en' => 'Ajman'],
                    ['name_ar' => 'رأس الخيمة', 'name_en' => 'Ras Al Khaimah'],
                    ['name_ar' => 'الفجيرة', 'name_en' => 'Fujairah'],
                    ['name_ar' => 'أم القيوين', 'name_en' => 'Umm Al Quwain'],
                    ['name_ar' => 'العين', 'name_en' => 'Al Ain'],
                ]
            ],
            // الكويت
            [
                'code' => '+965',
                'sort' => 4,
                'name_ar' => 'الكويت',
                'name_en' => 'Kuwait',
                'cities' => [
                    ['name_ar' => 'مدينة الكويت', 'name_en' => 'Kuwait City'],
                    ['name_ar' => 'حولي', 'name_en' => 'Hawally'],
                    ['name_ar' => 'الجهراء', 'name_en' => 'Al Jahra'],
                    ['name_ar' => 'الفروانية', 'name_en' => 'Al Farwaniyah'],
                    ['name_ar' => 'مبارك الكبير', 'name_en' => 'Mubarak Al-Kabeer'],
                    ['name_ar' => 'الأحمدي', 'name_en' => 'Al Ahmadi'],
                ]
            ],
            // قطر
            [
                'code' => '+974',
                'sort' => 5,
                'name_ar' => 'قطر',
                'name_en' => 'Qatar',
                'cities' => [
                    ['name_ar' => 'الدوحة', 'name_en' => 'Doha'],
                    ['name_ar' => 'الوكرة', 'name_en' => 'Al Wakrah'],
                    ['name_ar' => 'الخور', 'name_en' => 'Al Khor'],
                    ['name_ar' => 'أم صلال', 'name_en' => 'Umm Salal'],
                    ['name_ar' => 'الريان', 'name_en' => 'Al Rayyan'],
                    ['name_ar' => 'مسيعيد', 'name_en' => 'Mesaieed'],
                ]
            ],
            // البحرين
            [
                'code' => '+973',
                'sort' => 6,
                'name_ar' => 'البحرين',
                'name_en' => 'Bahrain',
                'cities' => [
                    ['name_ar' => 'المنامة', 'name_en' => 'Manama'],
                    ['name_ar' => 'المحرق', 'name_en' => 'Muharraq'],
                    ['name_ar' => 'الرفاع', 'name_en' => 'Riffa'],
                    ['name_ar' => 'مدينة عيسى', 'name_en' => 'Isa Town'],
                    ['name_ar' => 'مدينة حمد', 'name_en' => 'Hamad Town'],
                ]
            ],
            // عمان
            [
                'code' => '+968',
                'sort' => 7,
                'name_ar' => 'سلطنة عمان',
                'name_en' => 'Oman',
                'cities' => [
                    ['name_ar' => 'مسقط', 'name_en' => 'Muscat'],
                    ['name_ar' => 'صلالة', 'name_en' => 'Salalah'],
                    ['name_ar' => 'صحار', 'name_en' => 'Sohar'],
                    ['name_ar' => 'نزوى', 'name_en' => 'Nizwa'],
                    ['name_ar' => 'صور', 'name_en' => 'Sur'],
                    ['name_ar' => 'البريمي', 'name_en' => 'Al Buraimi'],
                ]
            ],
            // مصر
            [
                'code' => '+20',
                'sort' => 8,
                'name_ar' => 'مصر',
                'name_en' => 'Egypt',
                'cities' => [
                    ['name_ar' => 'القاهرة', 'name_en' => 'Cairo'],
                    ['name_ar' => 'الإسكندرية', 'name_en' => 'Alexandria'],
                    ['name_ar' => 'الجيزة', 'name_en' => 'Giza'],
                    ['name_ar' => 'شرم الشيخ', 'name_en' => 'Sharm El Sheikh'],
                    ['name_ar' => 'الغردقة', 'name_en' => 'Hurghada'],
                    ['name_ar' => 'المنصورة', 'name_en' => 'Mansoura'],
                    ['name_ar' => 'طنطا', 'name_en' => 'Tanta'],
                    ['name_ar' => 'أسيوط', 'name_en' => 'Assiut'],
                    ['name_ar' => 'الأقصر', 'name_en' => 'Luxor'],
                    ['name_ar' => 'أسوان', 'name_en' => 'Aswan'],
                    ['name_ar' => 'بورسعيد', 'name_en' => 'Port Said'],
                    ['name_ar' => 'السويس', 'name_en' => 'Suez'],
                ]
            ],
            // تركيا
            [
                'code' => '+90',
                'sort' => 9,
                'name_ar' => 'تركيا',
                'name_en' => 'Turkey',
                'cities' => [
                    ['name_ar' => 'إسطنبول', 'name_en' => 'Istanbul'],
                    ['name_ar' => 'أنقرة', 'name_en' => 'Ankara'],
                    ['name_ar' => 'إزمير', 'name_en' => 'Izmir'],
                    ['name_ar' => 'أنطاليا', 'name_en' => 'Antalya'],
                    ['name_ar' => 'بورصة', 'name_en' => 'Bursa'],
                    ['name_ar' => 'طرابزون', 'name_en' => 'Trabzon'],
                    ['name_ar' => 'قونيا', 'name_en' => 'Konya'],
                    ['name_ar' => 'أضنة', 'name_en' => 'Adana'],
                    ['name_ar' => 'ألانيا', 'name_en' => 'Alanya'],
                    ['name_ar' => 'مرسين', 'name_en' => 'Mersin'],
                ]
            ],
            // الأردن
            [
                'code' => '+962',
                'sort' => 10,
                'name_ar' => 'الأردن',
                'name_en' => 'Jordan',
                'cities' => [
                    ['name_ar' => 'عمان', 'name_en' => 'Amman'],
                    ['name_ar' => 'إربد', 'name_en' => 'Irbid'],
                    ['name_ar' => 'الزرقاء', 'name_en' => 'Zarqa'],
                    ['name_ar' => 'العقبة', 'name_en' => 'Aqaba'],
                    ['name_ar' => 'السلط', 'name_en' => 'Salt'],
                    ['name_ar' => 'المفرق', 'name_en' => 'Mafraq'],
                ]
            ],
            // لبنان
            [
                'code' => '+961',
                'sort' => 11,
                'name_ar' => 'لبنان',
                'name_en' => 'Lebanon',
                'cities' => [
                    ['name_ar' => 'بيروت', 'name_en' => 'Beirut'],
                    ['name_ar' => 'طرابلس', 'name_en' => 'Tripoli'],
                    ['name_ar' => 'صيدا', 'name_en' => 'Sidon'],
                    ['name_ar' => 'جونية', 'name_en' => 'Jounieh'],
                    ['name_ar' => 'زحلة', 'name_en' => 'Zahle'],
                    ['name_ar' => 'صور', 'name_en' => 'Tyre'],
                ]
            ],
            // العراق
            [
                'code' => '+964',
                'sort' => 12,
                'name_ar' => 'العراق',
                'name_en' => 'Iraq',
                'cities' => [
                    ['name_ar' => 'بغداد', 'name_en' => 'Baghdad'],
                    ['name_ar' => 'البصرة', 'name_en' => 'Basra'],
                    ['name_ar' => 'الموصل', 'name_en' => 'Mosul'],
                    ['name_ar' => 'أربيل', 'name_en' => 'Erbil'],
                    ['name_ar' => 'كركوك', 'name_en' => 'Kirkuk'],
                    ['name_ar' => 'النجف', 'name_en' => 'Najaf'],
                    ['name_ar' => 'كربلاء', 'name_en' => 'Karbala'],
                ]
            ],
            // اليمن
            [
                'code' => '+967',
                'sort' => 13,
                'name_ar' => 'اليمن',
                'name_en' => 'Yemen',
                'cities' => [
                    ['name_ar' => 'صنعاء', 'name_en' => 'Sanaa'],
                    ['name_ar' => 'عدن', 'name_en' => 'Aden'],
                    ['name_ar' => 'تعز', 'name_en' => 'Taiz'],
                    ['name_ar' => 'الحديدة', 'name_en' => 'Hodeidah'],
                    ['name_ar' => 'المكلا', 'name_en' => 'Mukalla'],
                    ['name_ar' => 'ذمار', 'name_en' => 'Dhamar'],
                ]
            ],
            // السودان
            [
                'code' => '+249',
                'sort' => 14,
                'name_ar' => 'السودان',
                'name_en' => 'Sudan',
                'cities' => [
                    ['name_ar' => 'الخرطوم', 'name_en' => 'Khartoum'],
                    ['name_ar' => 'أم درمان', 'name_en' => 'Omdurman'],
                    ['name_ar' => 'بورتسودان', 'name_en' => 'Port Sudan'],
                    ['name_ar' => 'القضارف', 'name_en' => 'Al Qadarif'],
                    ['name_ar' => 'نيالا', 'name_en' => 'Nyala'],
                    ['name_ar' => 'كسلا', 'name_en' => 'Kassala'],
                ]
            ],
        ];

        foreach ($countries as $countryData) {
            $country = Country::create([
                'is_active' => true,
                'sort' => $countryData['sort'],
                'code_number' => $countryData['code'],
            ]);

            $country->translations()->create([
                'locale' => 'ar',
                'title' => $countryData['name_ar']
            ]);

            $country->translations()->create([
                'locale' => 'en',
                'title' => $countryData['name_en']
            ]);

            foreach ($countryData['cities'] as $index => $cityData) {
                $city = City::create([
                    'country_id' => $country->id,
                    'is_active' => true,
                    'sort' => $index + 1
                ]);

                $city->translations()->create([
                    'locale' => 'ar',
                    'title' => $cityData['name_ar']
                ]);

                $city->translations()->create([
                    'locale' => 'en',
                    'title' => $cityData['name_en']
                ]);
            }
        }
    }
}