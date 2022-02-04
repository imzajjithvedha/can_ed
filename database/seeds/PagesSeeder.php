<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
           'name' => 'about_us',
           'title' => 'About us',
           'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Donec pretium vulputate sapien nec sagittis aliquam malesuada bibendum arcu. Pellentesque sit amet porttitor eget dolor morbi. Consequat id porta nibh venenatis cras sed felis eget. Sed tempus urna et pharetra pharetra massa massa. Ac auctor augue mauris augue neque gravida. Eu sem integer vitae justo eget magna fermentum iaculis eu. Ipsum suspendisse ultrices gravida dictum fusce ut placerat orci nulla. Integer malesuada nunc vel risus commodo viverra maecenas accumsan. Quam elementum pulvinar etiam non. Id faucibus nisl tincidunt eget nullam non nisi. Fermentum odio eu feugiat pretium nibh ipsum consequat. Lectus vestibulum mattis ullamcorper velit sed ullamcorper. Tincidunt ornare massa eget egestas purus. Malesuada fames ac turpis egestas sed tempus urna. Arcu dui vivamus arcu felis bibendum ut. Sed pulvinar proin gravida hendrerit lectus. Ornare arcu dui vivamus arcu felis bibendum ut tristique et.</p>',
           'user_id' => 1,
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now(),
        ]);

        DB::table('pages')->insert([
            'name' => 'faq',
            'title' => 'Frequently asked questions',
            'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Donec pretium vulputate sapien nec sagittis aliquam malesuada bibendum arcu. Pellentesque sit amet porttitor eget dolor morbi. Consequat id porta nibh venenatis cras sed felis eget. Sed tempus urna et pharetra pharetra massa massa. Ac auctor augue mauris augue neque gravida. Eu sem integer vitae justo eget magna fermentum iaculis eu. Ipsum suspendisse ultrices gravida dictum fusce ut placerat orci nulla. Integer malesuada nunc vel risus commodo viverra maecenas accumsan. Quam elementum pulvinar etiam non. Id faucibus nisl tincidunt eget nullam non nisi. Fermentum odio eu feugiat pretium nibh ipsum consequat. Lectus vestibulum mattis ullamcorper velit sed ullamcorper. Tincidunt ornare massa eget egestas purus. Malesuada fames ac turpis egestas sed tempus urna. Arcu dui vivamus arcu felis bibendum ut. Sed pulvinar proin gravida hendrerit lectus. Ornare arcu dui vivamus arcu felis bibendum ut tristique et.</p>',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
         ]);

         DB::table('pages')->insert([
            'name' => 'privacy_policy',
            'title' => 'Privacy policy',
            'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Donec pretium vulputate sapien nec sagittis aliquam malesuada bibendum arcu. Pellentesque sit amet porttitor eget dolor morbi. Consequat id porta nibh venenatis cras sed felis eget. Sed tempus urna et pharetra pharetra massa massa. Ac auctor augue mauris augue neque gravida. Eu sem integer vitae justo eget magna fermentum iaculis eu. Ipsum suspendisse ultrices gravida dictum fusce ut placerat orci nulla. Integer malesuada nunc vel risus commodo viverra maecenas accumsan. Quam elementum pulvinar etiam non. Id faucibus nisl tincidunt eget nullam non nisi. Fermentum odio eu feugiat pretium nibh ipsum consequat. Lectus vestibulum mattis ullamcorper velit sed ullamcorper. Tincidunt ornare massa eget egestas purus. Malesuada fames ac turpis egestas sed tempus urna. Arcu dui vivamus arcu felis bibendum ut. Sed pulvinar proin gravida hendrerit lectus. Ornare arcu dui vivamus arcu felis bibendum ut tristique et.</p>',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
         ]);

         DB::table('pages')->insert([
            'name' => 'disclaimer',
            'title' => 'Disclaimer',
            'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Donec pretium vulputate sapien nec sagittis aliquam malesuada bibendum arcu. Pellentesque sit amet porttitor eget dolor morbi. Consequat id porta nibh venenatis cras sed felis eget. Sed tempus urna et pharetra pharetra massa massa. Ac auctor augue mauris augue neque gravida. Eu sem integer vitae justo eget magna fermentum iaculis eu. Ipsum suspendisse ultrices gravida dictum fusce ut placerat orci nulla. Integer malesuada nunc vel risus commodo viverra maecenas accumsan. Quam elementum pulvinar etiam non. Id faucibus nisl tincidunt eget nullam non nisi. Fermentum odio eu feugiat pretium nibh ipsum consequat. Lectus vestibulum mattis ullamcorper velit sed ullamcorper. Tincidunt ornare massa eget egestas purus. Malesuada fames ac turpis egestas sed tempus urna. Arcu dui vivamus arcu felis bibendum ut. Sed pulvinar proin gravida hendrerit lectus. Ornare arcu dui vivamus arcu felis bibendum ut tristique et.</p>',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
         ]);

         DB::table('pages')->insert([
            'name' => 'meet_our_team',
            'title' => 'Meet our team',
            'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Donec pretium vulputate sapien nec sagittis aliquam malesuada bibendum arcu. Pellentesque sit amet porttitor eget dolor morbi. Consequat id porta nibh venenatis cras sed felis eget. Sed tempus urna et pharetra pharetra massa massa. Ac auctor augue mauris augue neque gravida. Eu sem integer vitae justo eget magna fermentum iaculis eu. Ipsum suspendisse ultrices gravida dictum fusce ut placerat orci nulla. Integer malesuada nunc vel risus commodo viverra maecenas accumsan. Quam elementum pulvinar etiam non. Id faucibus nisl tincidunt eget nullam non nisi. Fermentum odio eu feugiat pretium nibh ipsum consequat. Lectus vestibulum mattis ullamcorper velit sed ullamcorper. Tincidunt ornare massa eget egestas purus. Malesuada fames ac turpis egestas sed tempus urna. Arcu dui vivamus arcu felis bibendum ut. Sed pulvinar proin gravida hendrerit lectus. Ornare arcu dui vivamus arcu felis bibendum ut tristique et.</p>',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
         ]);

         DB::table('pages')->insert([
            'name' => 'our_sponsors',
            'title' => 'Our sponsors',
            'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Donec pretium vulputate sapien nec sagittis aliquam malesuada bibendum arcu. Pellentesque sit amet porttitor eget dolor morbi. Consequat id porta nibh venenatis cras sed felis eget. Sed tempus urna et pharetra pharetra massa massa. Ac auctor augue mauris augue neque gravida. Eu sem integer vitae justo eget magna fermentum iaculis eu. Ipsum suspendisse ultrices gravida dictum fusce ut placerat orci nulla. Integer malesuada nunc vel risus commodo viverra maecenas accumsan. Quam elementum pulvinar etiam non. Id faucibus nisl tincidunt eget nullam non nisi. Fermentum odio eu feugiat pretium nibh ipsum consequat. Lectus vestibulum mattis ullamcorper velit sed ullamcorper. Tincidunt ornare massa eget egestas purus. Malesuada fames ac turpis egestas sed tempus urna. Arcu dui vivamus arcu felis bibendum ut. Sed pulvinar proin gravida hendrerit lectus. Ornare arcu dui vivamus arcu felis bibendum ut tristique et.</p>',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
         ]);

         DB::table('pages')->insert([
            'name' => 'how_these_career_came_about',
            'title' => 'How these careers came about',
            'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Donec pretium vulputate sapien nec sagittis aliquam malesuada bibendum arcu. Pellentesque sit amet porttitor eget dolor morbi. Consequat id porta nibh venenatis cras sed felis eget. Sed tempus urna et pharetra pharetra massa massa. Ac auctor augue mauris augue neque gravida. Eu sem integer vitae justo eget magna fermentum iaculis eu. Ipsum suspendisse ultrices gravida dictum fusce ut placerat orci nulla. Integer malesuada nunc vel risus commodo viverra maecenas accumsan. Quam elementum pulvinar etiam non. Id faucibus nisl tincidunt eget nullam non nisi. Fermentum odio eu feugiat pretium nibh ipsum consequat. Lectus vestibulum mattis ullamcorper velit sed ullamcorper. Tincidunt ornare massa eget egestas purus. Malesuada fames ac turpis egestas sed tempus urna. Arcu dui vivamus arcu felis bibendum ut. Sed pulvinar proin gravida hendrerit lectus. Ornare arcu dui vivamus arcu felis bibendum ut tristique et.</p>',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
         ]);

         DB::table('pages')->insert([
            'name' => 'suggestions',
            'title' => 'Comments / suggestions',
            'description' => '<p><strong>This page is available only in English and French, the official languages of Canada, because it pertains to Canadian laws.</strong></p>

            <p>keeping in mind that (the road to success is always under construction - Lily Tomlin):</p>
            
            <p>- do you have any comments about our website or suggestions on improvements that could be made?</p>
            
            <p>- do you have any comments about our services or any suggestions on how to improve them?</p>
            
            <p>&nbsp;</p>
            
            <p>This website is designed and intended to help you find great Canadian products, services and companies. We want you 100% comfortable using it, so feel free to contact us with your ideas. We would be happy to hear from you. alternatively, fill in the secure form below.</p>
            
            <p><strong>Thank you</strong></p>
            
            <p><strong>The Canadian team</strong></p>',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
         ]);

         DB::table('pages')->insert([
            'name' => 'cookies',
            'title' => 'Cookies policy',
            'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Donec pretium vulputate sapien nec sagittis aliquam malesuada bibendum arcu. Pellentesque sit amet porttitor eget dolor morbi. Consequat id porta nibh venenatis cras sed felis eget. Sed tempus urna et pharetra pharetra massa massa. Ac auctor augue mauris augue neque gravida. Eu sem integer vitae justo eget magna fermentum iaculis eu. Ipsum suspendisse ultrices gravida dictum fusce ut placerat orci nulla. Integer malesuada nunc vel risus commodo viverra maecenas accumsan. Quam elementum pulvinar etiam non. Id faucibus nisl tincidunt eget nullam non nisi. Fermentum odio eu feugiat pretium nibh ipsum consequat. Lectus vestibulum mattis ullamcorper velit sed ullamcorper. Tincidunt ornare massa eget egestas purus. Malesuada fames ac turpis egestas sed tempus urna. Arcu dui vivamus arcu felis bibendum ut. Sed pulvinar proin gravida hendrerit lectus. Ornare arcu dui vivamus arcu felis bibendum ut tristique et.</p>',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
         ]);

         DB::table('pages')->insert([
            'name' => 'programs',
            'title' => 'Programs',
            'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Donec pretium vulputate sapien nec sagittis aliquam malesuada bibendum arcu. Pellentesque sit amet porttitor eget dolor morbi. Consequat id porta nibh venenatis cras sed felis eget. Sed tempus urna et pharetra pharetra massa massa. Ac auctor augue mauris augue neque gravida. Eu sem integer vitae justo eget magna fermentum iaculis eu. Ipsum suspendisse ultrices gravida dictum fusce ut placerat orci nulla. Integer malesuada nunc vel risus commodo viverra maecenas accumsan. Quam elementum pulvinar etiam non. Id faucibus nisl tincidunt eget nullam non nisi. Fermentum odio eu feugiat pretium nibh ipsum consequat. Lectus vestibulum mattis ullamcorper velit sed ullamcorper. Tincidunt ornare massa eget egestas purus. Malesuada fames ac turpis egestas sed tempus urna. Arcu dui vivamus arcu felis bibendum ut. Sed pulvinar proin gravida hendrerit lectus. Ornare arcu dui vivamus arcu felis bibendum ut tristique et.</p>',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
         ]);

         DB::table('pages')->insert([
            'name' => 'terms_of_use',
            'title' => 'Terms of use',
            'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Donec pretium vulputate sapien nec sagittis aliquam malesuada bibendum arcu. Pellentesque sit amet porttitor eget dolor morbi. Consequat id porta nibh venenatis cras sed felis eget. Sed tempus urna et pharetra pharetra massa massa. Ac auctor augue mauris augue neque gravida. Eu sem integer vitae justo eget magna fermentum iaculis eu. Ipsum suspendisse ultrices gravida dictum fusce ut placerat orci nulla. Integer malesuada nunc vel risus commodo viverra maecenas accumsan. Quam elementum pulvinar etiam non. Id faucibus nisl tincidunt eget nullam non nisi. Fermentum odio eu feugiat pretium nibh ipsum consequat. Lectus vestibulum mattis ullamcorper velit sed ullamcorper. Tincidunt ornare massa eget egestas purus. Malesuada fames ac turpis egestas sed tempus urna. Arcu dui vivamus arcu felis bibendum ut. Sed pulvinar proin gravida hendrerit lectus. Ornare arcu dui vivamus arcu felis bibendum ut tristique et.</p>',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
         ]);
    }
}
