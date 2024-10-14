<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $inserts = [
            [
                'id'   => \App\Models\Store::ID_TRIPODES,
                'name' => 'Tripodes.cl',
                'key'  => 'TRIPODES',
                'url'  => 'https://www.tripodes.cl',
                'sitemap' => 'sitemap.xml',
            ],
            [
                'id'   => \App\Models\Store::ID_SONY,
                'name' => 'Sony Store CL',
                'key'  => 'SONY',
                'url'  => 'https://store.sony.cl',
                'sitemap' => 'sitemap.xml',
            ],

        ];

        \DB::transaction(function () use ($inserts) {
            foreach ($inserts as $insert) {
                $store = \App\Models\Store::create($insert);
            }
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
