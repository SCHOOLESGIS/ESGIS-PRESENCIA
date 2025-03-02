<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'John', 'surname' => 'Doe', 'email' => 'john.doe@example.com', 'password' => bcrypt('password'), 'role' => 'admin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Chris', 'surname' => 'Brown', 'email' => 'chris.brown@example.com', 'password' => bcrypt('password'), 'role' => 'admin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Laura', 'surname' => 'Moore', 'email' => 'laura.moore@example.com', 'password' => bcrypt('password'), 'role' => 'admin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Michael', 'surname' => 'Johnson', 'email' => 'michael.johnson@example.com', 'password' => bcrypt('password'), 'role' => 'enseignant', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Emily', 'surname' => 'Williams', 'email' => 'emily.williams@example.com', 'password' => bcrypt('password'), 'role' => 'enseignant', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'David', 'surname' => 'Davis', 'email' => 'david.davis@example.com', 'password' => bcrypt('password'), 'role' => 'enseignant', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'James', 'surname' => 'Wilson', 'email' => 'james.wilson@example.com', 'password' => bcrypt('password'), 'role' => 'enseignant', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Sophia', 'surname' => 'Jackson', 'email' => 'sophia.jackson@example.com', 'password' => bcrypt('password'), 'role' => 'enseignant', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Ethan', 'surname' => 'Clark', 'email' => 'ethan.clark@example.com', 'password' => bcrypt('password'), 'role' => 'enseignant', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Olivia', 'surname' => 'Anderson', 'email' => 'olivia.anderson@example.com', 'password' => bcrypt('password'), 'role' => 'enseignant', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Isabella', 'surname' => 'Harris', 'email' => 'isabella.harris@example.com', 'password' => bcrypt('password'), 'role' => 'enseignant', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Benjamin', 'surname' => 'Young', 'email' => 'benjamin.young@example.com', 'password' => bcrypt('password'), 'role' => 'enseignant', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Charlotte', 'surname' => 'Walker', 'email' => 'charlotte.walker@example.com', 'password' => bcrypt('password'), 'role' => 'enseignant', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'William', 'surname' => 'White', 'email' => 'william.white@example.com', 'password' => bcrypt('password'), 'role' => 'enseignant', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Matthew', 'surname' => 'Taylor', 'email' => 'matthew.taylor@example.com', 'password' => bcrypt('password'), 'role' => 'enseignant', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Alexander', 'surname' => 'Roberts', 'email' => 'alexander.roberts@example.com', 'password' => bcrypt('password'), 'role' => 'enseignant', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Daniel', 'surname' => 'Thomas', 'email' => 'daniel.thomas@example.com', 'password' => bcrypt('password'), 'role' => 'enseignant', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Sarah', 'surname' => 'Miller', 'email' => 'sarah.miller@example.com', 'password' => bcrypt('password'), 'role' => 'enseignant', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Benjamin', 'surname' => 'Moore', 'email' => 'benjamin.moore@example.com', 'password' => bcrypt('password'), 'role' => 'enseignant', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'bend', 'surname' => 'do', 'email' => 'bend.do@example.com', 'password' => bcrypt('password'), 'role' => 'enseignant', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
            sleep(1);
        }

        $filieres = [
            ['filiere_name' => 'Informatique', 'filiere_level' => 'Licence'],
            ['filiere_name' => 'Informatique', 'filiere_level' => 'Master'],
            ['filiere_name' => 'Réseau et Télécom', 'filiere_level' => 'Licence'],
            ['filiere_name' => 'Réseau et Télécom', 'filiere_level' => 'Master'],
            ['filiere_name' => 'Systèmes Embarqués', 'filiere_level' => 'Licence'],
            ['filiere_name' => 'Systèmes Embarqués', 'filiere_level' => 'Master'],
            ['filiere_name' => 'Développement Web', 'filiere_level' => 'Licence'],
            ['filiere_name' => 'Développement Web', 'filiere_level' => 'Master'],
            ['filiere_name' => 'Intelligence Artificielle', 'filiere_level' => 'Licence'],
            ['filiere_name' => 'Intelligence Artificielle', 'filiere_level' => 'Master'],
            ['filiere_name' => 'Robotique', 'filiere_level' => 'Licence'],
            ['filiere_name' => 'Robotique', 'filiere_level' => 'Master'],
            ['filiere_name' => 'Big Data', 'filiere_level' => 'Licence'],
            ['filiere_name' => 'Big Data', 'filiere_level' => 'Master'],
            ['filiere_name' => 'Cybersécurité', 'filiere_level' => 'Licence'],
            ['filiere_name' => 'Cybersécurité', 'filiere_level' => 'Master'],
            ['filiere_name' => 'Game Development', 'filiere_level' => 'Licence'],
            ['filiere_name' => 'Game Development', 'filiere_level' => 'Master'],
            ['filiere_name' => 'Data Science', 'filiere_level' => 'Licence'],
            ['filiere_name' => 'Data Science', 'filiere_level' => 'Master'],
        ];

        foreach ($filieres as $filiere) {
            DB::table('filieres')->insert($filiere);
        }

        $modules = [
            ['module_name' => 'Introduction à la Programmation', 'module_code' => 'INF101', 'module_hours' => 30, 'description' => 'Apprentissage des bases de la programmation.', 'filiere_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_name' => 'Mathématiques Discrètes', 'module_code' => 'INF102', 'module_hours' => 20,'description' => 'Introduction aux mathématiques discrètes.', 'filiere_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_name' => 'Algorithmes et Structures de Données', 'module_code' => 'INF103', 'module_hours' => 30,'description' => 'Étude des structures de données et des algorithmes de base.', 'filiere_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_name' => 'Réseaux Informatiques', 'module_code' => 'NET101', 'module_hours' => 30,'description' => 'Introduction aux réseaux informatiques et à leur architecture.', 'filiere_id' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_name' => 'Sécurité des Systèmes', 'module_code' => 'SEC101', 'module_hours' => 10,'description' => 'Principes de la cybersécurité et protection des systèmes.', 'filiere_id' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_name' => 'Bases de Données', 'module_code' => 'DB101', 'module_hours' => 30,'description' => 'Apprentissage des bases de données relationnelles.', 'filiere_id' => 6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_name' => 'Développement Web', 'module_code' => 'WEB101', 'module_hours' => 30,'description' => 'Introduction au développement d\'applications web.', 'filiere_id' => 7, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_name' => 'Développement Mobile', 'module_code' => 'MOB101', 'module_hours' => 30, 'description' => 'Création d\'applications mobiles pour iOS et Android.', 'filiere_id' => 8, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_name' => 'Intelligence Artificielle', 'module_code' => 'AI101', 'module_hours' => 30,'description' => 'Introduction à l\'intelligence artificielle et aux algorithmes d\'apprentissage.', 'filiere_id' => 9, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_name' => 'Apprentissage Automatique', 'module_code' => 'ML101', 'module_hours' => 30,'description' => 'Étude des techniques de machine learning.', 'filiere_id' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_name' => 'Robotique', 'module_code' => 'ROB101', 'module_hours' => 30,'description' => 'Fondamentaux de la robotique et contrôle des robots.', 'filiere_id' => 11, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_name' => 'Systèmes Embarqués', 'module_code' => 'EMB101', 'module_hours' => 30,'description' => 'Introduction aux systèmes embarqués et à la programmation de bas niveau.', 'filiere_id' => 12, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_name' => 'Game Development', 'module_code' => 'GAME101', 'module_hours' => 30,'description' => 'Introduction à la création de jeux vidéo.', 'filiere_id' => 13, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_name' => 'Data Science', 'module_code' => 'DS101', 'module_hours' => 30,'description' => 'Introduction à la science des données et à l\'analyse de données.', 'filiere_id' => 14, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_name' => 'Big Data', 'module_code' => 'BD101', 'module_hours' => 30,'description' => 'Étude des techniques de traitement des grandes quantités de données.', 'filiere_id' => 15, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_name' => 'Cybersécurité', 'module_code' => 'SEC201', 'module_hours' => 30,'description' => 'Approfondissement des concepts de sécurité des systèmes informatiques.', 'filiere_id' => 16, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_name' => 'Cloud Computing', 'module_code' => 'CLOUD101', 'module_hours' => 30,'description' => 'Introduction au cloud computing et aux architectures distribuées.', 'filiere_id' => 17, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_name' => 'Blockchain', 'module_code' => 'BC101', 'module_hours' => 45,'description' => 'Comprendre les technologies blockchain et leur application.', 'filiere_id' => 18, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_name' => 'DevOps', 'module_code' => 'DEVOPS101', 'module_hours' => 30,'description' => 'Pratiques de développement logiciel et d\'opérations (DevOps).', 'filiere_id' => 19, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_name' => 'Hacking', 'module_code' => 'HACK101', 'module_hours' => 30,'description' => 'Pratiques de piratages et de teste de pénétration système.', 'filiere_id' => 20, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        foreach ($modules as $module) {
            DB::table('modules')->insert($module);
        }

        $enseignants = [
            ['user_id' => 1, 'speciality' => 'Informatique', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 2, 'speciality' => 'Réseaux et Télécom', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 3, 'speciality' => 'Cybersécurité', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 4, 'speciality' => 'Systèmes Embarqués', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 5, 'speciality' => 'Intelligence Artificielle', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 6, 'speciality' => 'Big Data', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 7, 'speciality' => 'Robotique', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 8, 'speciality' => 'Développement Web', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 9, 'speciality' => 'Développement Mobile', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 10, 'speciality' => 'Game Development', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 11, 'speciality' => 'Data Science', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 12, 'speciality' => 'Cloud Computing', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 13, 'speciality' => 'Blockchain', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 14, 'speciality' => 'DevOps', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 15, 'speciality' => 'Systèmes Embarqués', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 16, 'speciality' => 'Machine Learning', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 17, 'speciality' => 'Informatique', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 18, 'speciality' => 'Réseaux et Télécom', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 19, 'speciality' => 'Cybersécurité', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 20, 'speciality' => 'Data Science', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        foreach ($enseignants as $enseignant) {
            DB::table('enseignants')->insert($enseignant);
        }

        $rapports = [
            ['enseignant_id' => 1, 'hour_number' => 40, 'absence_number' => 2, 'justification_number' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['enseignant_id' => 2, 'hour_number' => 35, 'absence_number' => 1, 'justification_number' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['enseignant_id' => 3, 'hour_number' => 38, 'absence_number' => 3, 'justification_number' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['enseignant_id' => 4, 'hour_number' => 45, 'absence_number' => 0, 'justification_number' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['enseignant_id' => 5, 'hour_number' => 40, 'absence_number' => 1, 'justification_number' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['enseignant_id' => 6, 'hour_number' => 37, 'absence_number' => 2, 'justification_number' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['enseignant_id' => 7, 'hour_number' => 42, 'absence_number' => 1, 'justification_number' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['enseignant_id' => 8, 'hour_number' => 44, 'absence_number' => 0, 'justification_number' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['enseignant_id' => 9, 'hour_number' => 39, 'absence_number' => 2, 'justification_number' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['enseignant_id' => 10, 'hour_number' => 41, 'absence_number' => 1, 'justification_number' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['enseignant_id' => 11, 'hour_number' => 38, 'absence_number' => 3, 'justification_number' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['enseignant_id' => 12, 'hour_number' => 43, 'absence_number' => 0, 'justification_number' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['enseignant_id' => 13, 'hour_number' => 40, 'absence_number' => 2, 'justification_number' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['enseignant_id' => 14, 'hour_number' => 36, 'absence_number' => 1, 'justification_number' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['enseignant_id' => 15, 'hour_number' => 41, 'absence_number' => 2, 'justification_number' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['enseignant_id' => 16, 'hour_number' => 40, 'absence_number' => 1, 'justification_number' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['enseignant_id' => 17, 'hour_number' => 42, 'absence_number' => 1, 'justification_number' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['enseignant_id' => 18, 'hour_number' => 39, 'absence_number' => 2, 'justification_number' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['enseignant_id' => 19, 'hour_number' => 38, 'absence_number' => 0, 'justification_number' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['enseignant_id' => 20, 'hour_number' => 43, 'absence_number' => 3, 'justification_number' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        foreach ($rapports as $rapport) {
            DB::table('rapports')->insert($rapport);
        }

        $emargements = [
            ['module_id' => 1, 'enseignant_id' => 1, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 2, 'enseignant_id' => 2, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 3, 'enseignant_id' => 3, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 4, 'enseignant_id' => 4, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 5, 'enseignant_id' => 5, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 6, 'enseignant_id' => 6, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 7, 'enseignant_id' => 7, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 8, 'enseignant_id' => 8, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 9, 'enseignant_id' => 9, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 10, 'enseignant_id' => 10, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 11, 'enseignant_id' => 11, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 12, 'enseignant_id' => 12, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 13, 'enseignant_id' => 13, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 14, 'enseignant_id' => 14, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 15, 'enseignant_id' => 15, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 16, 'enseignant_id' => 16, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 17, 'enseignant_id' => 17, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 18, 'enseignant_id' => 18, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 19, 'enseignant_id' => 19, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 20, 'enseignant_id' => 20, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 1, 'enseignant_id' => 1, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 2, 'enseignant_id' => 2, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 3, 'enseignant_id' => 3, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 4, 'enseignant_id' => 4, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 5, 'enseignant_id' => 5, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 6, 'enseignant_id' => 6, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 7, 'enseignant_id' => 7, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 8, 'enseignant_id' => 8, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 9, 'enseignant_id' => 9, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 10, 'enseignant_id' => 10, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 11, 'enseignant_id' => 11, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 12, 'enseignant_id' => 12, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 13, 'enseignant_id' => 13, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 14, 'enseignant_id' => 14, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 15, 'enseignant_id' => 15, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 16, 'enseignant_id' => 16, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 17, 'enseignant_id' => 17, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 18, 'enseignant_id' => 18, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 19, 'enseignant_id' => 19, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 20, 'enseignant_id' => 20, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 1, 'enseignant_id' => 1, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 2, 'enseignant_id' => 2, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 3, 'enseignant_id' => 3, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 4, 'enseignant_id' => 4, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 5, 'enseignant_id' => 5, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 6, 'enseignant_id' => 6, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 7, 'enseignant_id' => 7, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 8, 'enseignant_id' => 8, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 9, 'enseignant_id' => 9, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 10, 'enseignant_id' => 10, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 11, 'enseignant_id' => 11, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 12, 'enseignant_id' => 12, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 13, 'enseignant_id' => 13, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 14, 'enseignant_id' => 14, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 15, 'enseignant_id' => 15, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 16, 'enseignant_id' => 16, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 17, 'enseignant_id' => 17, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 18, 'enseignant_id' => 18, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 19, 'enseignant_id' => 19, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 20, 'enseignant_id' => 20, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 1, 'enseignant_id' => 1, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 2, 'enseignant_id' => 2, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 3, 'enseignant_id' => 3, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 4, 'enseignant_id' => 4, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 5, 'enseignant_id' => 5, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 6, 'enseignant_id' => 6, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 7, 'enseignant_id' => 7, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 8, 'enseignant_id' => 8, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 9, 'enseignant_id' => 9, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 10, 'enseignant_id' => 10, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 11, 'enseignant_id' => 11, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 12, 'enseignant_id' => 12, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 13, 'enseignant_id' => 13, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 14, 'enseignant_id' => 14, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 15, 'enseignant_id' => 15, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 16, 'enseignant_id' => 16, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 17, 'enseignant_id' => 17, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 18, 'enseignant_id' => 18, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 19, 'enseignant_id' => 19, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 20, 'enseignant_id' => 20, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 1, 'enseignant_id' => 1, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 2, 'enseignant_id' => 2, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 3, 'enseignant_id' => 3, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 4, 'enseignant_id' => 4, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 5, 'enseignant_id' => 5, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 6, 'enseignant_id' => 6, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 7, 'enseignant_id' => 7, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 8, 'enseignant_id' => 8, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 9, 'enseignant_id' => 9, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 10, 'enseignant_id' => 10, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 11, 'enseignant_id' => 11, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 12, 'enseignant_id' => 12, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 13, 'enseignant_id' => 13, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 14, 'enseignant_id' => 14, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 15, 'enseignant_id' => 15, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 16, 'enseignant_id' => 16, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 17, 'enseignant_id' => 17, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 18, 'enseignant_id' => 18, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 19, 'enseignant_id' => 19, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'COCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['module_id' => 20, 'enseignant_id' => 20, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'DECOCHE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        foreach ($emargements as $emargement) {
            DB::table('emargements')->insert($emargement);
        }
    }
}
