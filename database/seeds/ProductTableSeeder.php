<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $product = new Product();
        $product->name = 'Microwave Oven';
        $product->make = "Polystar";
        $product->features = "
        20 liter microwave oven and grill function,
        Microwave input power:1200W,
        Operation Frequency:2450MHz,
        Grill Power input : 700W,
        Power Supply : 230-240 ~ 50/Hz,
        6 Microwave power leve (Microwave),
        Speedy Defrost/ Weight Defrost (meat, poultry, seafood),
        White cavity,
        Silver Housing
        ";
        $product->price = "43,000";
        $product->image = "microwave-oven-polystar-medium";
        $product->user_id = 1;
        $product->save();


        //2
        $product = new Product();
        $product->name = 'Table Gas Cooker';
        $product->make = "Polystar";
        $product->features = "
        Two Burners Gas Stove,
        Tampered Glass Top,
        With Brass burner ring,
        automatic ignition,
        Detachable pan fro easy cleaning
        ";
        $product->price = "23,000";
        $product->image = "table-gas-cooker-polystar-medium";
        $product->user_id = 2;
        $product->save();


        //3
        $product = new Product();
        $product->name = 'Washing machine';
        $product->make = "Polystar";
        $product->features = "
        12kg semi automatic washing machine,
        separate wash and spin dry tubs | built in Drain Pump,
        non detachable ltop cover for safer washing,
        washing capacity 9.8kg,
        spinning capacity 6.0kg,
        product Dim (mm) 820 X 495 X 990 mm
        ";
        $product->price = "23,000";
        $product->image = "washing-machine-polystar-medium";
        $product->user_id = 1;
        $product->save();


        //4
        $product = new Product();
        $product->name = 'Washing machine';
        $product->make = "Polystar";
        $product->features = "
        12kg semi automatic washing machine,
        separate wash and spin dry tubs | built in Drain Pump,
        non detachable ltop cover for safer washing,
        washing capacity 9.8kg,
        spinning capacity 6.0kg,
        product Dim (mm) 820 X 495 X 990 mm
        ";
        $product->price = "23,000";
        $product->image = "washing-machine-polystar-medium2";
        $product->user_id = 1;
        $product->save();


        //5
        $product = new Product();
        $product->name = 'Infinix zero 5';
        $product->make = "Infinix";
        $product->features = "
        ZERO 5,
        Helio P25 Optical Zoom,
        64GB ROM 6GB RAM,
        5.98\" FHD LTPS(2.5D) 4350mAh 
        ";
        $product->price = "67,000";
        $product->image = "infinix-zero-5-medium";
        $product->user_id = 2;
        $product->save();


        //6
        $product = new Product();
        $product->name = 'Itel S32';
        $product->make = "Itel";
        $product->features = "
        Android™ 7.0,
        5.5,
        16GB ROM + 1GB RAM: up to 32GB,
        Dual Selfie Camera 2.0MP+8.0MP/ Rear Camera 8.0MP,
        ";
        $product->price = "67,000";
        $product->image = "itel-s32-medium";
        $product->user_id = 1;
        $product->save();


        //7
        $product = new Product();
        $product->name = 'Itel S12';
        $product->make = "Itel";
        $product->features = "
        Android™ 7.0,
        5.0,
        8GB ROM + 1GB RAM: up to 32GB,
        Front Camera 2.0MP+5.0MP/Rear Camera 8.0MP AF,
        ";
        $product->price = "53,500";
        $product->image = "itel-s12-medium";
        $product->user_id = 2;
        $product->save();


        //8
        $product = new Product();
        $product->name = 'Itel A51';
        $product->make = "Itel";
        $product->features = "
        Android™ 6.0,
        5.5,
        1GB RAM+16GB ROM: up to 32GB,
        Back 5.0MP AF/Front 2.0MP,
        ";
        $product->price = "43,600";
        $product->image = "itel-a51-medium";
        $product->user_id = 1;
        $product->save();


        //9
        $product = new Product();
        $product->name = 'Itel it551';
        $product->make = "Itel";
        $product->features = "
        Dual Speaker Dirac 3D Stereo Surrounding,
        4000mAh Battery,
        16GB ROM + 2GB RAM,
        5.5” HD Display,
        Fingerprint
        ";
        $product->price = "45,000";
        $product->image = "itel-it551-medium";
        $product->user_id = 2;
        $product->save();


        //10
        $product = new Product();
        $product->name = 'Gionee A1 LITE';
        $product->make = "Gionee";
        $product->features = "
        5.3 Inch 2.5D Corning Gorilla Glass 3 Screen, 1280*720 Pixel,
        MTK6753 1.3GHz Octa Core,
        Support Touch ID,
        3GB RAM + 32GB ROM + Support 256GB TF Card Expansion,
        13 MP Back Camera + 20 MP Front Camera with Selfie Flash,
        Amigo OS 4.0 ( Based On Android 7.0 System),
        4000mAh Battery
        ";
        $product->price = "33,600";
        $product->image = "gionee-a1-lite-medium";
        $product->user_id = 1;
        $product->save();


        //11
        $product = new Product();
        $product->name = 'Midea 1.5HP Comfort Series Split Unit Air Conditioner MSAF-12CR + Installation Kit';
        $product->make = "Midea";
        $product->features = "
        1.5HP Capacity,
        Streamlined Design,
        Comfort: Faster Cooling,
        High Density Filter,
        Auto Restart,
        Turbo
        ";
        $product->price = "89,000";
        $product->image = "medea-air-conditioner-medium";
        $product->user_id = 2;
        $product->save();


        //12
        $product = new Product();
        $product->name = 'Haier Thermocool Single Door Medium Fridge - HR 185S Silver 77301-0378';
        $product->make = "Haier Thermocool";
        $product->features="
        Storage Capacity: 185 Litres,
        Direct cooling technology,
        Fully tropicalized compressor,
        Big evaporator for rapid and uniform cooling glass shelving,
        Soft freezing compartment for fish and meat,
        Toughened glass shelves
        ";
        $product->price = "89,400";
        $product->image = "haier-thermocool-fridge-medium";
        $product->user_id = 2;
        $product->save();


        //13
        $product = new Product();
        $product->name = 'Polystar Bedside Fridge Pv-TF79LS - (Silver)';
        $product->make = "Polystar";
        $product->features = "
        Superior Quality,
        Durable,
        Effective & Reliable
        ";
        $product->price = "36,555";
        $product->image = "polystar-fridge-medium";
        $product->user_id = 1;
        $product->save();


        //14
        $product = new Product();
        $product->name = 'Haier Thermocool Double Door Fridge - HRF 95 EX';
        $product->make = "Haier Thermocool";
        $product->features = "
        Model: HRF-95EX,
        Jumbo Freezer compartment,
        Material: Steel,
        Colour: White,
        Double Door,
        Direct Cool
        ";
        $product->price = "71,730";
        $product->image = "haier-thermocool-fridge-medium2";
        $product->user_id = 1;
        $product->save();


        //15
        $product = new Product();
        $product->name = 'Polystar 32" LED TV POLYSTAR + free Tv Guard';
        $product->make = "Polystar";
        $product->features = "
        Great Value For Money,
        Superior Quality,
        Effective & Reliable
        ";
        $product->price = "49,500";
        $product->image = "polystar-ty-medium";
        $product->user_id = 1;
        $product->save();


        //16
        $product = new Product();
        $product->name = 'Elepaq Generator - 1.3KVA - SV2200';
        $product->make = "Elepaq";
        $product->features = "
        Run Time per Tankful 7Hrs@75%Load,
        Dimensions (L x W x H) 460*380*330,
        Noise Level@ 7 Meters 66dB,
        Weight : 26.5
        ";
        $product->price = "34,499";
        $product->image = "elepaq-generator-medium";
        $product->user_id = 1;
        $product->save();


        //17
        $product = new Product();
        $product->name = 'Polystar Chest Freezer PV-CF260LGR';
        $product->make = "Polystar";
        $product->features = "
        Great Value For Money,
        Superior Quality,
        Effective & Reliable
        ";
        $product->price = "86,000";
        $product->image = "polystar-chest-freezer-medium";
        $product->user_id = 2;
        $product->save();


        //18
        $product = new Product();
        $product->name = 'Polystar 24 Inches LED TV';
        $product->make = "Polystar";
        $product->features = "
        Great Value For Money,
        Superior Quality,
        Effective & Reliable
        ";
        $product->price = "40,000";
        $product->image = "polystar-tv-medium2";
        $product->user_id = 1;
        $product->save();


        //19
        $product = new Product();
        $product->name = 'Medea Comfort Series Split Air Conditioner + Installation Kit';
        $product->make = "Medea";
        $product->features = "
        Streamlined Design,
        Comfort: Faster Cooling,
        High Density Filter,
        Auto Restart,
        Turbo,
        Sleep Mode
        ";
        $product->price = "81,500";
        $product->image = "medea-air-conditioner-medium2";
        $product->user_id = 1;
        $product->save();


        //20
        $product = new Product();
        $product->name = 'Polystar 1.5HP Fast Cooling, Copper Split Polystar Air Conditioner';
        $product->make = "Polystar";
        $product->features = "
        Super fast cooling,
        Low energy consumption,
        Free Installation kits,
        Two years warranty,
        ";
        $product->price = "89,800";
        $product->image = "polystar-air-conditioner-medium2";
        $product->user_id = 2;
        $product->save();
    }
}
