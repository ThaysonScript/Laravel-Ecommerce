<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $nome = fake()->unique()->sentence();

        return [
            'nome' => $nome,
            'descricao' => fake()->paragraph(),
            'preco' => fake()->randomNumber(2),
            'slug' => Str::slug($nome),   // criar url amigavel
            'imagem' => fake()->imageUrl(400, 400),
            'user_id' => User::all('id')->random(),
            'categoria_id' => Categoria::all('id')->random(),
        ];
    }
}
