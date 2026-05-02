<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tagline')->nullable();
            $table->text('bio')->nullable();
            $table->text('bio_extended')->nullable();          // paragraf tambahan untuk WhoAmI
            $table->string('photo')->nullable();               // path ke foto profil
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('location')->nullable();
            $table->string('school')->nullable();              // misal SMKN 2 Buduran
            $table->string('major')->nullable();               // misal RPL
            $table->string('class_info')->nullable();          // misal Kelas 10 (Absen 6)
            $table->json('social_links')->nullable();          // { github, linkedin, instagram, ... }
            $table->string('motto')->nullable();               // kutipan favorit
            $table->string('motto_author')->nullable();        // siapa yang bilang
            $table->string('prime_time')->nullable();          // jam produktif, misal "23:00"
            $table->string('prime_time_quote')->nullable();    // kalimat penyerta
            $table->string('current_status')->nullable();      // misal "Membangun masa depan"
            $table->json('personality_traits')->nullable();    // [{ name, value, color }]
            $table->json('hobbies')->nullable();               // [{ title, icon, desc }]
            $table->json('daily_vibe')->nullable();            // { lab_title, lab_desc }
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
