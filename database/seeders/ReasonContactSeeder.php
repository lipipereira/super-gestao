<?php

namespace Database\Seeders;

use App\Models\ReasonContact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReasonContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReasonContact::create(['motivo_contato'=>'Dúvida']);
        ReasonContact::create(['motivo_contato'=>'Elgio']);
        ReasonContact::create(['motivo_contato'=>'Reclamação'
]);
    }
}
