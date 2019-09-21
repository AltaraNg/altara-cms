<?php

use Illuminate\Database\Seeder;
use App\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $brand = new Brand();
        $brand->name = 'Polystar';
        $brand->save();
        //2
        $brand = new Brand();
        $brand->name = 'Infinix';
        $brand->save();
        //3
        $brand = new Brand();
        $brand->name = 'Itel';
        $brand->save();
        //4
        $brand = new Brand();
        $brand->name = 'Gionee';
        $brand->save();
        //5
        $brand = new Brand();
        $brand->name = 'Elepaq';
        $brand->save();
        //6
        $brand = new Brand();
        $brand->name = 'Haier Thermocool';
        $brand->save();
        //7
        $brand = new Brand();
        $brand->name = 'Century';
        $brand->save();
        //8
        $brand = new Brand();
        $brand->name = 'Tiger';
        $brand->save();
        //9
        $brand = new Brand();
        $brand->name = 'Sumo Premium';
        $brand->save();
        //10
        $brand = new Brand();
        $brand->name = 'Tecno';
        $brand->save();
        //11
        $brand = new Brand();
        $brand->name = 'Fero';
        $brand->save();
        //12
        $brand = new Brand();
        $brand->name = 'Vigitab';
        $brand->save();
        //13
        $brand = new Brand();
        $brand->name = 'Ox';
        $brand->save();
        //14
        $brand = new Brand();
        $brand->name = 'Hp';
        $brand->save();
        
    }
}
