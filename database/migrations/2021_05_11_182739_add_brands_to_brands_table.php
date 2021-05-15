<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBrandsToBrandsTable extends Migration
{
    private const CAR_BRANDS = [
        'Abarth', 'Alfa Romeo', 'Aston Martin', 'Audi',
        'Bentley', 'BMW', 'Bugatti',
        'Citroen', 'Cupra',
        'Dacia', 'Dodge', 'DS',
        'Ferrari', 'Fiat', 'Ford',
        'Honda', 'Hyundai',
        'Isuzu', 'Iveco',
        'Jaguar', 'Jeep',
        'Lamborghini', 'Land Rover', 'Lexus',
        'Kia',
        'Maserati', 'Mazda', 'McLaren', 'Mercedes', 'MINI', 'Mitsubishi',
        'Nissan',
        'Opel',
        'Peugeot', 'Porshe',
        'RAM', 'Renault', 'Rolls-Royce',
        'Seat', 'Skoda', 'Smart', 'Subaru', 'Suzuki',
        'Tesla', 'Toyota',
        'Volkswagen', 'Volvo'
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach(self::CAR_BRANDS as $carBrand)
            \App\Models\Brand::updateOrCreate(
                ['name' => $carBrand],
                ['name' => $carBrand]
            );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \App\Models\Brand::truncate();
    }
}
