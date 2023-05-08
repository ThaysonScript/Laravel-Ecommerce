<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();   // chave primaria autoIncrement e unsgined
            $table->string('nome'); // nome de produto tipo string
            $table->text('descricao');  // descricao longa de produto do tipo text
            $table->decimal('preco', 10, 2);    // preco de produto tipo decima 10 numeros sendo 2 decimais
            $table->string('slug'); // slug do produto tipo string [ slug == tratamento de urls ]
            $table->string('imagem')->nullable();   // imagem do produto tipo string e podera ser vazia

            // DEFININDO CHAVE ESTRANGEIRA
                // maneira antiga
                    /*
                    $table->unsignedBigInteger('user_id');
                    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
                    */

                // maneira atual
                    $table->foreignId('user_id')->constrained()
                    ->onDelete('cascade')->onUpdate('cascade');  // tabela users vem antes de tabela atual

                    $table->foreignId('categoria_id')->constrained()
                    ->onDelete('cascade')->onUpdate('cascade'); // tabela categorias vem antes de tabela atual

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
