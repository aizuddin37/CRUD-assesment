<?php

namespace Database\Factories;

use App\Models\Clients;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Clients::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $quantity =1;
        return [
            'Name' =>$this->faker->text(50),
            'email'=>$this->faker->unique()->safeEmail,
             'phoneNo'=>$this->faker->randomDigit,
             'orders'=>$this->faker->text(100),
             'quantity'=>$quantity++,
            'address'=>$this->faker->text(100),
            'status'=>$this->faker->text(100)
        ];
    }
}
