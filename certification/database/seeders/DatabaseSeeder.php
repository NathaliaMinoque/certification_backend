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
                'author' => 'Kusuma',
                'published_year' => '2022',
                'loan_status' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

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
            ]
        ]);

        DB::table('loan')->insert([
            [
                'id' => '1',
                'id_member' => '1',
                'borrowed_date' => now(),
                'due_date' => now(),
                'returned_date' => now(),
                'loan_status' => '0',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '2',
                'id_member' => '2',
                'borrowed_date' => now(),
                'due_date' => now(),
                'returned_date' => now(),
                'loan_status' => '0',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '3',
                'id_member' => '1',
                'borrowed_date' => now(),
                'due_date' => now(),
                'returned_date' => now(),
                'loan_status' => '0',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

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
                'id_loan' => '2',
                'id_book' => '3',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '4',
                'id_loan' => '3',
                'id_book' => '3',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);


    }
}
