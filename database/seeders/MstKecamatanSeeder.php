<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstKecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mst_kecamatan')->insert([
            ['id' => 1, 'nama' => 'Babakan Madang', 'latitude' => -6.571154174, 'longitude' => 106.8695454, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 2, 'nama' => 'Bojong Gede', 'latitude' => -6.477156841, 'longitude' => 106.7991247, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 3, 'nama' => 'Caringin', 'latitude' => -6.730039055, 'longitude' => 106.8546, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 4, 'nama' => 'Cariu', 'latitude' => -6.519772772, 'longitude' => 107.135436, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 5, 'nama' => 'Ciampea', 'latitude' => -6.578944896, 'longitude' => 106.7019724, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 6, 'nama' => 'Ciawi', 'latitude' => -6.701756095, 'longitude' => 106.8819489, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 7, 'nama' => 'Cibinong', 'latitude' => -6.482436464, 'longitude' => 106.8383272, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 8, 'nama' => 'Cibungbulang', 'latitude' => -6.57685851, 'longitude' => 106.6566211, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 9, 'nama' => 'Cigombong', 'latitude' => -6.747128239, 'longitude' => 106.795828, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 10, 'nama' => 'Cigudeg', 'latitude' => -6.509322743, 'longitude' => 106.5564835, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 11, 'nama' => 'Cijeruk', 'latitude' => -6.681489833, 'longitude' => 106.7856695, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 12, 'nama' => 'Cileungsi', 'latitude' => -6.398162032, 'longitude' => 106.9818978, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 13, 'nama' => 'Ciomas', 'latitude' => -6.608905964, 'longitude' => 106.7597987, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 14, 'nama' => 'Cisarua', 'latitude' => -6.70841256, 'longitude' => 106.962275, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 15, 'nama' => 'Ciseeng', 'latitude' => -6.45910014, 'longitude' => 106.6793089, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 16, 'nama' => 'Citeureup', 'latitude' => -6.520958169, 'longitude' => 106.8872969, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 17, 'nama' => 'Dramaga', 'latitude' => -6.586460232, 'longitude' => 106.7348777, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 18, 'nama' => 'Gunung Putri', 'latitude' => -6.388649099, 'longitude' => 106.9377983, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 19, 'nama' => 'Gunung Sindur', 'latitude' => -6.386377618, 'longitude' => 106.6835726, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 20, 'nama' => 'Jasinga', 'latitude' => -6.4695343, 'longitude' => 106.4473287, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 21, 'nama' => 'Jonggol', 'latitude' => -6.508173916, 'longitude' => 107.0282682, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 22, 'nama' => 'Kemang', 'latitude' => -6.507119018, 'longitude' => 106.7372581, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 23, 'nama' => 'Klapanunggal', 'latitude' => -6.483306278, 'longitude' => 106.9525772, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 24, 'nama' => 'Leuwiliang', 'latitude' => -6.645276474, 'longitude' => 106.6077755, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 25, 'nama' => 'Leuwisadeng', 'latitude' => -6.574267341, 'longitude' => 106.589731, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 26, 'nama' => 'Megamendung', 'latitude' => -6.675826922, 'longitude' => 106.8947793, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 27, 'nama' => 'Nanggung', 'latitude' => -6.661338533, 'longitude' => 106.5440489, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 28, 'nama' => 'Pamijahan', 'latitude' => -6.677206749, 'longitude' => 106.656327, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 29, 'nama' => 'Parung', 'latitude' => -6.440336688, 'longitude' => 106.7171389, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 30, 'nama' => 'Parung Panjang', 'latitude' => -6.373200099, 'longitude' => 106.5539654, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 31, 'nama' => 'Ranca Bungur', 'latitude' => -6.520005141, 'longitude' => 106.7162116, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 32, 'nama' => 'Rumpin', 'latitude' => -6.451117094, 'longitude' => 106.6285044, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 33, 'nama' => 'Sukajaya', 'latitude' => -6.647602381, 'longitude' => 106.4662203, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 34, 'nama' => 'Sukamakmur', 'latitude' => -6.586319372, 'longitude' => 106.9904, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 35, 'nama' => 'Sukaraja', 'latitude' => -6.576923212, 'longitude' => 106.8411207, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 36, 'nama' => 'Tajurhalang', 'latitude' => -6.472847319, 'longitude' => 106.7590827, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 37, 'nama' => 'Tamansari', 'latitude' => -6.667422416, 'longitude' => 106.7429133, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 38, 'nama' => 'Tanjungsari', 'latitude' => -6.615179024, 'longitude' => 107.1373918, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 39, 'nama' => 'Tenjo', 'latitude' => -6.372892209, 'longitude' => 106.4716877, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
            ['id' => 40, 'nama' => 'Tenjolaya', 'latitude' => -6.65311745, 'longitude' => 106.7063658, 'created_at' => now(), 'updated_at' => now(), 'created_by' => null, 'updated_by' => null, 'deleted_by' => null],
        ]);
    }
}
