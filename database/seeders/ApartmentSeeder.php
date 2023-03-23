<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Apartment;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartments = config('apartments');

        foreach ($apartments as $apartment) {
            $newApartment = new Apartment();
            $newApartment->title = $apartments['title'];
            $newApartment->description = $apartments['description'];
            $newApartment->room_n = $apartments['room_n'];
            $newApartment->bed_n = $apartments['bed_n'];
            $newApartment->bath_n = $apartments['bath_n'];
            $newApartment->square_meters = $apartments['square_meters'];
            $newApartment->visible = $apartments['visible'];
            $newApartment->address = $apartments['address'];
            $newApartment->latitude = $apartments['latitude'];
            $newApartment->longitude = $apartments['longitude'];
            $newApartment->cover_image = $apartments['cover_image'];
            $newApartment->slug = Apartment::generateSlug($newApartment->title);
            $newApartment->save();
        }
    }
}