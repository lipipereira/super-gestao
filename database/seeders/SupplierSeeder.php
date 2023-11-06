<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SupplierModel;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Instanciado o objeto
        $supplier = new SupplierModel();
        $supplier->nome = 'Fornecedor 1';
        $supplier->site = 'Fornecedor1.com';
        $supplier->uf = 'CE';
        $supplier->email = 'Fornecedor1@gmial.com';
        $supplier->save();

        // O método create(atenção para o atributo fillable da classe)
        SupplierModel::create([
            'nome'=>'Fornecedor 2',
            'site'=>'fornecedor2.com.br',
            'uf'=>'BA',
            'email'=>'fornecedor2@gmial.com'
        ]);

        //Insert
        DB::table('fornecedores')->insert([
            'nome'=>'Fornecedor 3',
            'site'=>'fornecedor3.com.br',
            'uf'=>'PB',
            'email'=>'fornecedor3@gmial.com'
        ]);
    }
}
