<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => 'mahendra',
            'lastname' =>'dahat',
            'email' => 'mahendra@gmail.com',
            'phone' => 9998666565,
            'company_id' => 1,
            
        ];
    }
}
