<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // permissions for categories
        Permission::create(['name' => 'categories.index']);
        Permission::create(['name' => 'categories.create']);
        Permission::create(['name' => 'categories.edit']);
        Permission::create(['name' => 'categories.delete']);

        // permissions for Posts
        Permission::create(['name' => 'posts.index']);
        Permission::create(['name' => 'posts.create']);
        Permission::create(['name' => 'posts.edit']);
        Permission::create(['name' => 'posts.delete']);

        // permissions for Services
        Permission::create(['name' => 'services.index']);
        Permission::create(['name' => 'services.create']);
        Permission::create(['name' => 'services.edit']);
        Permission::create(['name' => 'services.delete']);

        // permissions for Projects
        Permission::create(['name' => 'projects.index']);
        Permission::create(['name' => 'projects.create']);
        Permission::create(['name' => 'projects.edit']);
        Permission::create(['name' => 'projects.delete']);

        // permissions for Teams
        Permission::create(['name' => 'teams.index']);
        Permission::create(['name' => 'teams.create']);
        Permission::create(['name' => 'teams.edit']);
        Permission::create(['name' => 'teams.delete']);

        // permissions for photos
        Permission::create(['name' => 'photos.index']);
        Permission::create(['name' => 'photos.create']);
        Permission::create(['name' => 'photos.edit']);
        Permission::create(['name' => 'photos.delete']);

        // permissions for sliders
        Permission::create(['name' => 'sliders.index']);
        Permission::create(['name' => 'sliders.create']);
        Permission::create(['name' => 'sliders.edit']);
        Permission::create(['name' => 'sliders.delete']);

        // permissions for testimonials
        Permission::create(['name' => 'testimonials.index']);
        Permission::create(['name' => 'testimonials.create']);
        Permission::create(['name' => 'testimonials.edit']);
        Permission::create(['name' => 'testimonials.delete']);

        // permissions for facts
        Permission::create(['name' => 'facts.index']);
        Permission::create(['name' => 'facts.create']);
        Permission::create(['name' => 'facts.edit']);
        Permission::create(['name' => 'facts.delete']);

        // permissions for roles
        Permission::create(['name' => 'roles.index']);
        Permission::create(['name' => 'roles.create']);
        Permission::create(['name' => 'roles.edit']);
        Permission::create(['name' => 'roles.delete']);

        // permissios for permission
        Permission::create(['name' => 'permissions.index']);

        // permissions for users
        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.create']);
        Permission::create(['name' => 'users.edit']);
        Permission::create(['name' => 'users.delete']);
    }
}
