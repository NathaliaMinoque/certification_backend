<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // mengisi database book
        DB::table('book')->insert([
            [
                'id' => '1',
                'title' => 'Buku Membaca',
                'author' => 'Minoque',
                'published_year' => '2023',
                'loan_status' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '2',
                'title' => 'Buku Menulis',
                'author' => 'Nathalia',
                'published_year' => '2023',
                'loan_status' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '3',
                'title' => 'Buku Mewarna',
                'author' => 'Zefanya',
                'published_year' => '2022',
                'loan_status' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '4',
                'title' => 'Buku Menyanyi',
                'author' => 'Kusuma',
                'published_year' => '2022',
                'loan_status' => '0',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '5',
                'title' => 'Buku Pepak',
                'author' => 'Feli',
                'published_year' => '2022',
                'loan_status' => '0',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '6',
                'title' => 'Buku Kamus',
                'author' => 'Putri',
                'published_year' => '2022',
                'loan_status' => '0',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '7',
                'title' => 'Buku Primbon',
                'author' => 'Dyah',
                'published_year' => '2022',
                'loan_status' => '0',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // mengisi database member
        DB::table('member')->insert([
            [
                'id' => '1',
                'name' => 'Abednego',
                'address' => 'Pagu',
                'phone' => '08126485023',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '2',
                'name' => 'Salma',
                'address' => 'Pare',
                'phone' => '08126485053',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '3',
                'name' => 'Budi',
                'address' => 'Pare',
                'phone' => '08126485053',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '4',
                'name' => 'Suherman',
                'address' => 'Pare',
                'phone' => '08126485053',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '5',
                'name' => 'Joko',
                'address' => 'Pare',
                'phone' => '08126485053',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // mengisi database loan
        DB::table('loan')->insert([
            [
                'id' => '1',
                'id_member' => '1',
                'borrowed_date' => '2023-01-06',
                'due_date' => '2023-01-13',
                'returned_date' => now(),
                'loan_status' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '2',
                'id_member' => '2',
                'borrowed_date' => '2023-01-07',
                'due_date' => '2023-01-14',
                'returned_date' => now(),
                'loan_status' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '3',
                'id_member' => '3',
                'borrowed_date' => '2023-01-06',
                'due_date' => '2023-01-13',
                'returned_date' => now(),
                'loan_status' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // mengisi database detail_loan
        DB::table('detail_loan')->insert([
            [
                'id' => '1',
                'id_loan' => '1',
                'id_book' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '2',
                'id_loan' => '2',
                'id_book' => '2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '3',
                'id_loan' => '3',
                'id_book' => '3',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);


    }
}
