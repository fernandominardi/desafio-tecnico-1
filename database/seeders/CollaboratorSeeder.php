<?php

namespace Database\Seeders;

use App\Models\Collaborator;
use App\Models\Country;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PHPUnit\Framework\Constraint\Count;

class CollaboratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creamos dos grupos de Colaboradores que forman parte del mismo Equipo y el mismo País.

        $team1 = Team::factory()->create();
        $country1 = Country::factory()->create();

        Collaborator::factory()->count(5)->create([
            'team_id' => $team1->id,
            'country_id' => $country1->id,
        ]);

        $team2 = Team::factory()->create();
        $country2 = Country::factory()->create();

        Collaborator::factory()->count(6)->create([
            'team_id' => $team2->id,
            'country_id' => $country2->id,
        ]);
    }
}
