<?php

namespace Database\Seeders;

use App\Models\User;
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
            ['name' => 'John', 'surname' => 'Doe', 'email' => 'john.doe@example.com', 'password' => bcrypt('password'), 'role' => 'admin'],
            ['name' => 'Jane', 'surname' => 'Smith', 'email' => 'jane.smith@example.com', 'password' => bcrypt('password'), 'role' => 'user'],
            ['name' => 'Michael', 'surname' => 'Johnson', 'email' => 'michael.johnson@example.com', 'password' => bcrypt('password'), 'role' => 'moderator'],
            ['name' => 'Emily', 'surname' => 'Williams', 'email' => 'emily.williams@example.com', 'password' => bcrypt('password'), 'role' => 'user'],
            ['name' => 'Chris', 'surname' => 'Brown', 'email' => 'chris.brown@example.com', 'password' => bcrypt('password'), 'role' => 'admin'],
            ['name' => 'David', 'surname' => 'Davis', 'email' => 'david.davis@example.com', 'password' => bcrypt('password'), 'role' => 'user'],
            ['name' => 'Sarah', 'surname' => 'Miller', 'email' => 'sarah.miller@example.com', 'password' => bcrypt('password'), 'role' => 'moderator'],
            ['name' => 'James', 'surname' => 'Wilson', 'email' => 'james.wilson@example.com', 'password' => bcrypt('password'), 'role' => 'user'],
            ['name' => 'Laura', 'surname' => 'Moore', 'email' => 'laura.moore@example.com', 'password' => bcrypt('password'), 'role' => 'admin'],
            ['name' => 'Matthew', 'surname' => 'Taylor', 'email' => 'matthew.taylor@example.com', 'password' => bcrypt('password'), 'role' => 'user'],
            ['name' => 'Olivia', 'surname' => 'Anderson', 'email' => 'olivia.anderson@example.com', 'password' => bcrypt('password'), 'role' => 'moderator'],
            ['name' => 'Daniel', 'surname' => 'Thomas', 'email' => 'daniel.thomas@example.com', 'password' => bcrypt('password'), 'role' => 'user'],
            ['name' => 'Sophia', 'surname' => 'Jackson', 'email' => 'sophia.jackson@example.com', 'password' => bcrypt('password'), 'role' => 'admin'],
            ['name' => 'William', 'surname' => 'White', 'email' => 'william.white@example.com', 'password' => bcrypt('password'), 'role' => 'user'],
            ['name' => 'Isabella', 'surname' => 'Harris', 'email' => 'isabella.harris@example.com', 'password' => bcrypt('password'), 'role' => 'moderator'],
            ['name' => 'Ethan', 'surname' => 'Clark', 'email' => 'ethan.clark@example.com', 'password' => bcrypt('password'), 'role' => 'user'],
            ['name' => 'Mia', 'surname' => 'Lewis', 'email' => 'mia.lewis@example.com', 'password' => bcrypt('password'), 'role' => 'admin'],
            ['name' => 'Alexander', 'surname' => 'Roberts', 'email' => 'alexander.roberts@example.com', 'password' => bcrypt('password'), 'role' => 'user'],
            ['name' => 'Charlotte', 'surname' => 'Walker', 'email' => 'charlotte.walker@example.com', 'password' => bcrypt('password'), 'role' => 'moderator'],
            ['name' => 'Benjamin', 'surname' => 'Young', 'email' => 'benjamin.young@example.com', 'password' => bcrypt('password'), 'role' => 'user'],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
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
            ['module_name' => 'Introduction à la Programmation', 'module_code' => 'INF101', 'description' => 'Apprentissage des bases de la programmation.', 'filiere_id' => 1],
            ['module_name' => 'Mathématiques Discrètes', 'module_code' => 'INF102', 'description' => 'Introduction aux mathématiques discrètes.', 'filiere_id' => 1],
            ['module_name' => 'Algorithmes et Structures de Données', 'module_code' => 'INF103', 'description' => 'Étude des structures de données et des algorithmes de base.', 'filiere_id' => 1],
            ['module_name' => 'Réseaux Informatiques', 'module_code' => 'NET101', 'description' => 'Introduction aux réseaux informatiques et à leur architecture.', 'filiere_id' => 2],
            ['module_name' => 'Sécurité des Systèmes', 'module_code' => 'SEC101', 'description' => 'Principes de la cybersécurité et protection des systèmes.', 'filiere_id' => 2],
            ['module_name' => 'Bases de Données', 'module_code' => 'DB101', 'description' => 'Apprentissage des bases de données relationnelles.', 'filiere_id' => 1],
            ['module_name' => 'Développement Web', 'module_code' => 'WEB101', 'description' => 'Introduction au développement d\'applications web.', 'filiere_id' => 1],
            ['module_name' => 'Développement Mobile', 'module_code' => 'MOB101', 'description' => 'Création d\'applications mobiles pour iOS et Android.', 'filiere_id' => 1],
            ['module_name' => 'Intelligence Artificielle', 'module_code' => 'AI101', 'description' => 'Introduction à l\'intelligence artificielle et aux algorithmes d\'apprentissage.', 'filiere_id' => 3],
            ['module_name' => 'Apprentissage Automatique', 'module_code' => 'ML101', 'description' => 'Étude des techniques de machine learning.', 'filiere_id' => 3],
            ['module_name' => 'Robotique', 'module_code' => 'ROB101', 'description' => 'Fondamentaux de la robotique et contrôle des robots.', 'filiere_id' => 4],
            ['module_name' => 'Systèmes Embarqués', 'module_code' => 'EMB101', 'description' => 'Introduction aux systèmes embarqués et à la programmation de bas niveau.', 'filiere_id' => 4],
            ['module_name' => 'Game Development', 'module_code' => 'GAME101', 'description' => 'Introduction à la création de jeux vidéo.', 'filiere_id' => 5],
            ['module_name' => 'Data Science', 'module_code' => 'DS101', 'description' => 'Introduction à la science des données et à l\'analyse de données.', 'filiere_id' => 5],
            ['module_name' => 'Big Data', 'module_code' => 'BD101', 'description' => 'Étude des techniques de traitement des grandes quantités de données.', 'filiere_id' => 5],
            ['module_name' => 'Cybersécurité', 'module_code' => 'SEC201', 'description' => 'Approfondissement des concepts de sécurité des systèmes informatiques.', 'filiere_id' => 2],
            ['module_name' => 'Cloud Computing', 'module_code' => 'CLOUD101', 'description' => 'Introduction au cloud computing et aux architectures distribuées.', 'filiere_id' => 2],
            ['module_name' => 'Blockchain', 'module_code' => 'BC101', 'description' => 'Comprendre les technologies blockchain et leur application.', 'filiere_id' => 3],
            ['module_name' => 'DevOps', 'module_code' => 'DEVOPS101', 'description' => 'Pratiques de développement logiciel et d\'opérations (DevOps).', 'filiere_id' => 1],
        ];

        foreach ($modules as $module) {
            DB::table('modules')->insert($module);
        }

        $enseignants = [
            ['user_id' => 1, 'matricule' => 'ENS001', 'speciality' => 'Informatique'],
            ['user_id' => 2, 'matricule' => 'ENS002', 'speciality' => 'Réseaux et Télécom'],
            ['user_id' => 3, 'matricule' => 'ENS003', 'speciality' => 'Cybersécurité'],
            ['user_id' => 4, 'matricule' => 'ENS004', 'speciality' => 'Systèmes Embarqués'],
            ['user_id' => 5, 'matricule' => 'ENS005', 'speciality' => 'Intelligence Artificielle'],
            ['user_id' => 6, 'matricule' => 'ENS006', 'speciality' => 'Big Data'],
            ['user_id' => 7, 'matricule' => 'ENS007', 'speciality' => 'Robotique'],
            ['user_id' => 8, 'matricule' => 'ENS008', 'speciality' => 'Développement Web'],
            ['user_id' => 9, 'matricule' => 'ENS009', 'speciality' => 'Développement Mobile'],
            ['user_id' => 10, 'matricule' => 'ENS010', 'speciality' => 'Game Development'],
            ['user_id' => 11, 'matricule' => 'ENS011', 'speciality' => 'Data Science'],
            ['user_id' => 12, 'matricule' => 'ENS012', 'speciality' => 'Cloud Computing'],
            ['user_id' => 13, 'matricule' => 'ENS013', 'speciality' => 'Blockchain'],
            ['user_id' => 14, 'matricule' => 'ENS014', 'speciality' => 'DevOps'],
            ['user_id' => 15, 'matricule' => 'ENS015', 'speciality' => 'Systèmes Embarqués'],
            ['user_id' => 16, 'matricule' => 'ENS016', 'speciality' => 'Machine Learning'],
            ['user_id' => 17, 'matricule' => 'ENS017', 'speciality' => 'Informatique'],
            ['user_id' => 18, 'matricule' => 'ENS018', 'speciality' => 'Réseaux et Télécom'],
            ['user_id' => 19, 'matricule' => 'ENS019', 'speciality' => 'Cybersécurité'],
            ['user_id' => 20, 'matricule' => 'ENS020', 'speciality' => 'Data Science'],
        ];

        foreach ($enseignants as $enseignant) {
            DB::table('enseignants')->insert($enseignant);
        }

        $rapports = [
            ['enseignant_id' => 1, 'hour_number' => 40, 'absence_number' => 2, 'justification_number' => 1],
            ['enseignant_id' => 2, 'hour_number' => 35, 'absence_number' => 1, 'justification_number' => 0],
            ['enseignant_id' => 3, 'hour_number' => 38, 'absence_number' => 3, 'justification_number' => 2],
            ['enseignant_id' => 4, 'hour_number' => 45, 'absence_number' => 0, 'justification_number' => 0],
            ['enseignant_id' => 5, 'hour_number' => 40, 'absence_number' => 1, 'justification_number' => 1],
            ['enseignant_id' => 6, 'hour_number' => 37, 'absence_number' => 2, 'justification_number' => 1],
            ['enseignant_id' => 7, 'hour_number' => 42, 'absence_number' => 1, 'justification_number' => 1],
            ['enseignant_id' => 8, 'hour_number' => 44, 'absence_number' => 0, 'justification_number' => 0],
            ['enseignant_id' => 9, 'hour_number' => 39, 'absence_number' => 2, 'justification_number' => 0],
            ['enseignant_id' => 10, 'hour_number' => 41, 'absence_number' => 1, 'justification_number' => 1],
            ['enseignant_id' => 11, 'hour_number' => 38, 'absence_number' => 3, 'justification_number' => 1],
            ['enseignant_id' => 12, 'hour_number' => 43, 'absence_number' => 0, 'justification_number' => 0],
            ['enseignant_id' => 13, 'hour_number' => 40, 'absence_number' => 2, 'justification_number' => 1],
            ['enseignant_id' => 14, 'hour_number' => 36, 'absence_number' => 1, 'justification_number' => 0],
            ['enseignant_id' => 15, 'hour_number' => 41, 'absence_number' => 2, 'justification_number' => 2],
            ['enseignant_id' => 16, 'hour_number' => 40, 'absence_number' => 1, 'justification_number' => 0],
            ['enseignant_id' => 17, 'hour_number' => 42, 'absence_number' => 1, 'justification_number' => 1],
            ['enseignant_id' => 18, 'hour_number' => 39, 'absence_number' => 2, 'justification_number' => 1],
            ['enseignant_id' => 19, 'hour_number' => 38, 'absence_number' => 0, 'justification_number' => 0],
            ['enseignant_id' => 20, 'hour_number' => 43, 'absence_number' => 3, 'justification_number' => 2],
        ];

        foreach ($rapports as $rapport) {
            DB::table('rapports')->insert($rapport);
        }

        $absences = [
            ['enseignant_id' => 1, 'module_id' => 1, 'absence_date' => '2025-02-01', 'status' => 'JUSTIFIE'],
            ['enseignant_id' => 2, 'module_id' => 2, 'absence_date' => '2025-02-02', 'status' => 'NON_JUSTIFIE'],
            ['enseignant_id' => 3, 'module_id' => 3, 'absence_date' => '2025-02-03', 'status' => 'JUSTIFIE'],
            ['enseignant_id' => 4, 'module_id' => 4, 'absence_date' => '2025-02-04', 'status' => 'NON_JUSTIFIE'],
            ['enseignant_id' => 5, 'module_id' => 5, 'absence_date' => '2025-02-05', 'status' => 'JUSTIFIE'],
            ['enseignant_id' => 6, 'module_id' => 6, 'absence_date' => '2025-02-06', 'status' => 'NON_JUSTIFIE'],
            ['enseignant_id' => 7, 'module_id' => 7, 'absence_date' => '2025-02-07', 'status' => 'JUSTIFIE'],
            ['enseignant_id' => 8, 'module_id' => 8, 'absence_date' => '2025-02-08', 'status' => 'NON_JUSTIFIE'],
            ['enseignant_id' => 9, 'module_id' => 9, 'absence_date' => '2025-02-09', 'status' => 'JUSTIFIE'],
            ['enseignant_id' => 10, 'module_id' => 10, 'absence_date' => '2025-02-10', 'status' => 'NON_JUSTIFIE'],
            ['enseignant_id' => 11, 'module_id' => 11, 'absence_date' => '2025-02-11', 'status' => 'JUSTIFIE'],
            ['enseignant_id' => 12, 'module_id' => 12, 'absence_date' => '2025-02-12', 'status' => 'NON_JUSTIFIE'],
            ['enseignant_id' => 13, 'module_id' => 13, 'absence_date' => '2025-02-13', 'status' => 'JUSTIFIE'],
            ['enseignant_id' => 14, 'module_id' => 14, 'absence_date' => '2025-02-14', 'status' => 'NON_JUSTIFIE'],
            ['enseignant_id' => 15, 'module_id' => 15, 'absence_date' => '2025-02-15', 'status' => 'JUSTIFIE'],
            ['enseignant_id' => 16, 'module_id' => 16, 'absence_date' => '2025-02-16', 'status' => 'NON_JUSTIFIE'],
            ['enseignant_id' => 17, 'module_id' => 17, 'absence_date' => '2025-02-17', 'status' => 'JUSTIFIE'],
            ['enseignant_id' => 18, 'module_id' => 18, 'absence_date' => '2025-02-18', 'status' => 'NON_JUSTIFIE'],
            ['enseignant_id' => 19, 'module_id' => 19, 'absence_date' => '2025-02-19', 'status' => 'JUSTIFIE'],
            ['enseignant_id' => 20, 'module_id' => 4, 'absence_date' => '2025-02-20', 'status' => 'NON_JUSTIFIE'],
        ];

        foreach ($absences as $absence) {
            DB::table('absences')->insert($absence);
        }

        $justifications = [
            ['absence_id' => 1, 'type' => 'Maladie', 'doc' => 'maladie_01.pdf'],
            ['absence_id' => 2, 'type' => 'Voyage', 'doc' => 'voyage_02.pdf'],
            ['absence_id' => 3, 'type' => 'Urgence familiale', 'doc' => 'urgence_03.pdf'],
            ['absence_id' => 4, 'type' => 'Maladie', 'doc' => 'maladie_04.pdf'],
            ['absence_id' => 5, 'type' => 'Voyage', 'doc' => 'voyage_05.pdf'],
            ['absence_id' => 6, 'type' => 'Maladie', 'doc' => 'maladie_06.pdf'],
            ['absence_id' => 7, 'type' => 'Urgence familiale', 'doc' => 'urgence_07.pdf'],
            ['absence_id' => 8, 'type' => 'Voyage', 'doc' => 'voyage_08.pdf'],
            ['absence_id' => 9, 'type' => 'Maladie', 'doc' => 'maladie_09.pdf'],
            ['absence_id' => 10, 'type' => 'Urgence familiale', 'doc' => 'urgence_10.pdf'],
            ['absence_id' => 11, 'type' => 'Voyage', 'doc' => 'voyage_11.pdf'],
            ['absence_id' => 12, 'type' => 'Maladie', 'doc' => 'maladie_12.pdf'],
            ['absence_id' => 13, 'type' => 'Urgence familiale', 'doc' => 'urgence_13.pdf'],
            ['absence_id' => 14, 'type' => 'Voyage', 'doc' => 'voyage_14.pdf'],
            ['absence_id' => 15, 'type' => 'Maladie', 'doc' => 'maladie_15.pdf'],
            ['absence_id' => 16, 'type' => 'Urgence familiale', 'doc' => 'urgence_16.pdf'],
            ['absence_id' => 17, 'type' => 'Voyage', 'doc' => 'voyage_17.pdf'],
            ['absence_id' => 18, 'type' => 'Maladie', 'doc' => 'maladie_18.pdf'],
            ['absence_id' => 19, 'type' => 'Urgence familiale', 'doc' => 'urgence_19.pdf'],
            ['absence_id' => 20, 'type' => 'Voyage', 'doc' => 'voyage_20.pdf'],
        ];

        foreach ($justifications as $justification) {
            DB::table('justifications')->insert($justification);
        }

        $cours = [
            ['module_id' => 1, 'enseignant_id' => 1, 'filiere_id' => 1, 'cour_date' => '2025-02-01', 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'VALIDE'],
            ['module_id' => 2, 'enseignant_id' => 2, 'filiere_id' => 1, 'cour_date' => '2025-02-02', 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'NON_VALIDE'],
            ['module_id' => 3, 'enseignant_id' => 3, 'filiere_id' => 2, 'cour_date' => '2025-02-03', 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'VALIDE'],
            ['module_id' => 4, 'enseignant_id' => 4, 'filiere_id' => 2, 'cour_date' => '2025-02-04', 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'NON_VALIDE'],
            ['module_id' => 5, 'enseignant_id' => 5, 'filiere_id' => 3, 'cour_date' => '2025-02-05', 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'VALIDE'],
            ['module_id' => 6, 'enseignant_id' => 6, 'filiere_id' => 3, 'cour_date' => '2025-02-06', 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'NON_VALIDE'],
            ['module_id' => 7, 'enseignant_id' => 7, 'filiere_id' => 4, 'cour_date' => '2025-02-07', 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'VALIDE'],
            ['module_id' => 8, 'enseignant_id' => 8, 'filiere_id' => 4, 'cour_date' => '2025-02-08', 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'NON_VALIDE'],
            ['module_id' => 9, 'enseignant_id' => 9, 'filiere_id' => 5, 'cour_date' => '2025-02-09', 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'VALIDE'],
            ['module_id' => 10, 'enseignant_id' => 10, 'filiere_id' => 5, 'cour_date' => '2025-02-10', 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'NON_VALIDE'],
            ['module_id' => 11, 'enseignant_id' => 11, 'filiere_id' => 6, 'cour_date' => '2025-02-11', 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'VALIDE'],
            ['module_id' => 12, 'enseignant_id' => 12, 'filiere_id' => 6, 'cour_date' => '2025-02-12', 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'NON_VALIDE'],
            ['module_id' => 13, 'enseignant_id' => 13, 'filiere_id' => 7, 'cour_date' => '2025-02-13', 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'VALIDE'],
            ['module_id' => 14, 'enseignant_id' => 14, 'filiere_id' => 7, 'cour_date' => '2025-02-14', 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'NON_VALIDE'],
            ['module_id' => 15, 'enseignant_id' => 15, 'filiere_id' => 8, 'cour_date' => '2025-02-15', 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'VALIDE'],
            ['module_id' => 16, 'enseignant_id' => 16, 'filiere_id' => 8, 'cour_date' => '2025-02-16', 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'NON_VALIDE'],
            ['module_id' => 17, 'enseignant_id' => 17, 'filiere_id' => 9, 'cour_date' => '2025-02-17', 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'VALIDE'],
            ['module_id' => 18, 'enseignant_id' => 18, 'filiere_id' => 9, 'cour_date' => '2025-02-18', 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'NON_VALIDE'],
            ['module_id' => 19, 'enseignant_id' => 19, 'filiere_id' => 10, 'cour_date' => '2025-02-19', 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'VALIDE'],
            ['module_id' => 3, 'enseignant_id' => 20, 'filiere_id' => 10, 'cour_date' => '2025-02-20', 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'NON_VALIDE'],
        ];

        foreach ($cours as $cour) {
            DB::table('cours')->insert($cour);
        }

        $emargements = [
            ['cour_id' => 1, 'enseignant_id' => 1, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'COCHE'],
            ['cour_id' => 2, 'enseignant_id' => 2, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'DECOCHE'],
            ['cour_id' => 3, 'enseignant_id' => 3, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'COCHE'],
            ['cour_id' => 4, 'enseignant_id' => 4, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'DECOCHE'],
            ['cour_id' => 5, 'enseignant_id' => 5, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'COCHE'],
            ['cour_id' => 6, 'enseignant_id' => 6, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'DECOCHE'],
            ['cour_id' => 7, 'enseignant_id' => 7, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'COCHE'],
            ['cour_id' => 8, 'enseignant_id' => 8, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'DECOCHE'],
            ['cour_id' => 9, 'enseignant_id' => 9, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'COCHE'],
            ['cour_id' => 10, 'enseignant_id' => 10, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'DECOCHE'],
            ['cour_id' => 11, 'enseignant_id' => 11, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'COCHE'],
            ['cour_id' => 12, 'enseignant_id' => 12, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'DECOCHE'],
            ['cour_id' => 13, 'enseignant_id' => 13, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'COCHE'],
            ['cour_id' => 14, 'enseignant_id' => 14, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'DECOCHE'],
            ['cour_id' => 15, 'enseignant_id' => 15, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'COCHE'],
            ['cour_id' => 16, 'enseignant_id' => 16, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'DECOCHE'],
            ['cour_id' => 17, 'enseignant_id' => 17, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'COCHE'],
            ['cour_id' => 18, 'enseignant_id' => 18, 'begin_hour' => '14:00:00', 'end_hour' => '16:00:00', 'status' => 'DECOCHE'],
            ['cour_id' => 19, 'enseignant_id' => 19, 'begin_hour' => '08:00:00', 'end_hour' => '10:00:00', 'status' => 'COCHE'],
            ['cour_id' => 20, 'enseignant_id' => 20, 'begin_hour' => '10:00:00', 'end_hour' => '12:00:00', 'status' => 'DECOCHE'],
        ];

        foreach ($emargements as $emargement) {
            DB::table('emargements')->insert($emargement);
        }
    }
}
