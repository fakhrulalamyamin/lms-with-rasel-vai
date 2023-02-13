<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use App\Models\Lead;
use App\Models\Tutorial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $defaultPermission = ['lead-management', 'create-admin', 'user-management'];

        foreach ($defaultPermission as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        $this->create_user_with_role('Super Admin', 'Super Admin', 'super-admin@lms.test');
        $this->create_user_with_role('Communication', 'Communication Team', 'communication@lms.test');
        $teacher = $this->create_user_with_role('Teacher', 'Teacher', 'teacher@lms.test');
        $this->create_user_with_role('Leads', 'Lead', 'leads@lms.test');

        $course = Course::create([
            'name' => 'Laravel for Beginners',
            'description' => 'Laravel is a free and open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller architectural pattern and based on Symfony.',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1969px-Laravel.svg.png',
            'user_id' => $teacher->id
        ]);

        Lead::factory(100)->create();
        Tutorial::factory(10)->create();
    }

    private function create_user_with_role($type, $name, $email)
    {
        $role = Role::create([
            'name' => $type
        ]);

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt('password')
        ]);

        if ($type == 'Super Admin') {
            $role->givePermissionTo(Permission::all());
        } elseif ($type == 'Leads') {
            $role->givePermissionTo('lead-management');
        }

        $user->assignRole($role);

        return $user;
    }
}
