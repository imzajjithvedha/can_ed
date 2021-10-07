<?php

use Illuminate\Database\Seeder;

class WebsiteInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('website_information')->insert([
           'name' => 'Study in Canada',
           'mantra' => 'The best Canadian universities',
           'address_1' => '1051 Blvd Decarie',
           'address_2' => 'P.O. Box: 53555 NORGATE',
           'address_3' => 'Montreal - Qc.',
           'address_4' => 'Canada',
           'address_5' => 'Postal Code: H4L 3M0',
           'telephone' => '+1-514-557-7856 (From the rest of the world)',
           'email' => 'info@studyingincanada.org',
           'website_url' => 'https://www.studyingincanada.org',
           'facebook' => 'https://www.facebook.com',
           'google' => 'https://www.google.com',
           'you_tube' => 'https://www.youtube.com',
           'instagram' => 'https://www.instagram.com',
           'twitter' => 'https://www.twitter.com'
        ]);
    }
}
