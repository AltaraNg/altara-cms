<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $category = new Category();
        $category->name = 'Freezers';
        $category->save();
        //2
        $category = new Category();
        $category->name = 'Fridges';
        $category->save();
        //3
        $category = new Category();
        $category->name = 'Washing Machines';
        $category->save();
        //4
        $category = new Category();
        $category->name = 'Generators';
        $category->save();
        //5
        $category = new Category();
        $category->name = 'Fans';
        $category->save();
        //6
        $category = new Category();
        $category->name = 'Cookers';
        $category->save();
        //7
        $category = new Category();
        $category->name = 'Air Conditioners';
        $category->save();
        //8
        $category = new Category();
        $category->name = 'Ovens';
        $category->save();
        //9
        $category = new Category();
        $category->name = 'Sewing Machines';
        $category->save();
        //10
        $category = new Category();
        $category->name = 'Televisions';
        $category->save();
        //11
        $category = new Category();
        $category->name = 'Phones';
        $category->save();
        //12
        $category = new Category();
        $category->name = 'Water Dispensers';
        $category->save();
        //13
        $category = new Category();
        $category->name = 'Home Theaters';
        $category->save();
        //14
        $category = new Category();
        $category->name = 'Laptop Computers';
        $category->save();
        
    }
}
