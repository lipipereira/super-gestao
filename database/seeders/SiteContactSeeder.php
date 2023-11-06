<?php

namespace Database\Seeders;

use App\Models\SiteContactModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteContactModel::factory()->count(100)->create();

        /*
        SiteContactModel::create([
            'nome'=>'Sistema Super gestão',
            'telefone'=>'88988683996',
            'email'=>'super@gmail.com',
            'motivo_contato'=>2,
            'mensagem'=>'Teste de seeder'
        ]);
        */
    }
}
