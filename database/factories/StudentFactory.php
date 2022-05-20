<?php

namespace Database\Factories;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class StudentFactory extends Factory
{
    
     protected $model = Student::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $teacher = ['Katie','Max','Steffy','Joseph'];

        $gender = $this->faker->randomElement(['M', 'F']);
        $tearcher_data = $this->faker->randomElement($teacher );

        $age_data = $this->faker->numberBetween($min = 18, $max = 24) ;
        return [
            'name' => $this->faker->name($gender),
            'gender' => $gender,
            'age' => $age_data,
            'reporting_teacher' => $tearcher_data
        ];
    }
   
}




