<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Faker\Factory as Faker;


class LeaveRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $leaveTypes = [
            'Sick Leave', 
            'Casual Leave', 
            'Maternity Leave', 
            'Paternity Leave', 
            'Annual Leave'
        ];
        $reasons = [
            'Personal vacation',
            'Medical appointment',
            'Family emergency',
            'Sick leave',
            'Jury duty',
            'Bereavement leave',
            'Professional development',
            'Paid time off',
            'Parental leave',
            'Other personal reasons'
        ];
        $requests = [];
        //  
        for ($j = 0; $j < 50; $j++) {
            $startDate = Carbon::now()->subDays(rand(1, 30));
            $endDate = $startDate->copy()->addDays(rand(1, 14)); // End date is after start date

            $requests[] = [
                'employee_name' => $faker->name,
                'leave_type' => $leaveTypes[array_rand($leaveTypes)],
                'start_date' => $startDate->format('Y-m-d'),
                'end_date' => $endDate->format('Y-m-d'),
                'reason' => $reasons[array_rand($reasons)],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('leave_requests')->insert($requests);
    }
}
