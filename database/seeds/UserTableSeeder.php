<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'administrator',
            'username' => 'administrator',
            'password' => 'user',
            'role_id' => 1
        ]);

        App\User::create([
            'name' => 'ppic',
            'username' => 'ppic',
            'password' => 'user',
            'role_id' => 2
        ]);

        App\User::create([
            'name' => 'produksi',
            'username' => 'produksi',
            'password' => 'user',
            'role_id' => 3
        ]);

        App\Barang::create([
            'jenis' => 'test',
        ]);

        App\Bahan::create([
            'bahan' => 'test',
            'qty' => 12,
            'barang_id' => 1,
        ]);

        App\ReturPenjualan::create([
            'po' => 'wadaw',
            'tanggal' => '2021/02/02',
            'retur' => 'aawd',
            'customer' => 'awdawd',
            'qty' => 121,
            'satuan' => 'awdwad',
            'keterangan' => 'adadaw',
            'harga_jual' => 12313,
            'total' => 12313 * 121,
            'barang_id' => 1,
            'status' => 3
        ]);
    }
}
