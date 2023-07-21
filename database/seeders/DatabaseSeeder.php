<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\TipoEvento;
use App\Models\TipoUsuario;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        TipoUsuario::factory()->create([
            'nombre_tipo_usuario' => 'Administrador',
        ]);
        TipoUsuario::factory()->create([
            'nombre_tipo_usuario' => 'Docente',
        ]);
        TipoUsuario::factory()->create([
            'nombre_tipo_usuario' => 'Estudiante',
        ]);

        User::factory()->create([
            'name' => 'ADMIN',
            'email' => 'admin@info.com',
            'password' => Hash::make('password'),
            'tipo_usuario_id' => '1',
        ]);

        User::factory()->create([
            'name' => 'DOCENTE',
            'email' => 'docente@info.com',
            'password' => Hash::make('password'),
            'tipo_usuario_id' => '2',
        ]);

        User::factory()->create([
            'name' => 'ESTUDIANTE',
            'email' => 'estudiante@info.com',
            'password' => Hash::make('password'),
            'tipo_usuario_id' => '3',
        ]);
        TipoEvento::factory()->create([
            'nombre_tipo_evento' => 'Reunión de Docentes',
            'tiene_memo' => 1
        ]);
        TipoEvento::factory()->create([
            'nombre_tipo_evento' => 'Reunión de Estudiantes',
            'tiene_memo' => 1
        ]);
        TipoEvento::factory()->create([
            'nombre_tipo_evento' => 'Jornada de Limpieza',
            'tiene_memo' => 1
        ]);
        TipoEvento::factory()->create([
            'nombre_tipo_evento' => 'Ensayo',
            'tiene_memo' => 0
        ]);
        TipoEvento::factory()->create([
            'nombre_tipo_evento' => 'Evento Deportivo',
            'tiene_memo' => 0
        ]);
        TipoEvento::factory()->create([
            'nombre_tipo_evento' => 'Entrenamiento Deportivo',
            'tiene_memo' => 0
        ]);
        TipoEvento::factory()->create([
            'nombre_tipo_evento' => 'Tutoría Grupal',
            'tiene_memo' => 0
        ]);
        TipoEvento::factory()->create([
            'nombre_tipo_evento' => 'Capacitación Docentes',
            'tiene_memo' => 1
        ]);
        TipoEvento::factory()->create([
            'nombre_tipo_evento' => 'Inducción',
            'tiene_memo' => 1
        ]);
        TipoEvento::factory()->create([
            'nombre_tipo_evento' => 'Congreso',
            'tiene_memo' => 1
        ]);
        TipoEvento::factory()->create([
            'nombre_tipo_evento' => 'Charla',
            'tiene_memo' => 1
        ]);
        TipoEvento::factory()->create([
            'nombre_tipo_evento' => 'Concurso de Programación',
            'tiene_memo' => 1
        ]);
        TipoEvento::factory()->create([
            'nombre_tipo_evento' => 'Actividad de medio ambiente',
            'tiene_memo' => 1
        ]);

        // seeders para usuarios
        User::factory()->create([
            'name' => 'ELMER COYLA IDME', 'email' => 'elmer@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '1',
        ]);
        User::factory()->create([
            'name' => 'HENRY IVÁN CONDORI ALEJO', 'email' => 'henryiván@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'EDELFRÉ FLORES VELÁSQUEZ', 'email' => 'edelfré@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'CARLOS BORIS SOSA MAYDANA', 'email' => 'carlosboris@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'EDGAR HOLGUIN HOLGUIN', 'email' => 'edgar@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'OLIVER AMADEO VILCA HUAYTA', 'email' => 'oliveramadeo@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'HUGO YOSEF GOMEZ QUISPE', 'email' => 'hugoyosef@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'ROBERT ANTONIO ROMERO FLORES', 'email' => 'robertantonio@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'MILDER ZANABRIA ORTEGA', 'email' => 'milder@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'MARGA ISABEL INGALUQUE ARAPA', 'email' => 'margaisabel@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'ALDO HERNÁN ZANABRIA GÁLVEZ', 'email' => 'aldohernán@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'ELVIS AUGUSTO ALIAGA PAYEHUANCA ', 'email' => 'elvisaugusto@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'GUINA GUADALUPE SOTOMAYOR ALZAMORA', 'email' => 'guinaguadalupe@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'EDWIN FREDY CALDERON VILCA', 'email' => 'edwinfredy@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'ADOLFO CARLOS JIMENEZ CHURA ', 'email' => 'adolfocarlos@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'IRENIO LUIS CHAGUA ADUVIRI', 'email' => 'irenioluis@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'FIDEL ERNESTO TICONA YANQUI', 'email' => 'fidelernesto@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'PEDRO FEDER PONCE CORDERO', 'email' => 'pedrofeder@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'MIGUEL ROMILIO ACEITUNO ROJO', 'email' => 'miguelromilio@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'DONIA ALIZANDRA RUELAS ACERO', 'email' => 'doniaalizandra@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'LENIN HUAYTA FLORES ', 'email' => 'lenin@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'MAYENKA FERNANDEZ CHAMBI', 'email' => 'mayenka@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'WILDO SUCASAIRE MONROY', 'email' => 'wildo@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'MAGALI GIANINA GONZALES PACO', 'email' => 'magaligianina@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'PABLO CESAR TAPIA CATACORA', 'email' => 'pablocesar@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'ZULEMA MAMANI HUACANI', 'email' => 'zulema@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'VICTOR HUGO BEJAR GONZALES', 'email' => 'victorhugo@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'LILIAN MAGNOLIA BENIQUE RUELAS', 'email' => 'lilianmagnolia@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'ROSARIO BUSTAMANTE ROJAS', 'email' => 'rosario@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'FREDY APARICIO CASTILLO SUAQUITA', 'email' => 'fredyaparicio@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'ALFREDO PABLO TICONA HUMPIRI', 'email' => 'alfredopablo@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'GIULIANA ALAVE CCAMAPAZA', 'email' => 'giuliana@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'EDWIN EDGAR MESTAS YUCRA ', 'email' => 'edwinedgar@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'MARCOS DENYS CHOQUE CASTRO', 'email' => 'marcosdenys@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'ALODIA FLORES ARNAO', 'email' => 'alodia@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'DAVID PAXI APAZA ', 'email' => 'david@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'FIDEL HUANCO RAMOS', 'email' => 'fidel@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'PERCY QUISPE ÑACA', 'email' => 'percy@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'UBALDO ALLCA MAMANI ', 'email' => 'ubaldo@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '2',
        ]);
        User::factory()->create([
            'name' => 'APAZA COILA IRVING DANIEL', 'email' => 'apazacoila@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'APAZA QUISPE JHON BRYAN', 'email' => 'apazaquispe@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'BUSTINZA NUÑEZ JHON ANTHONY', 'email' => 'bustinzanuñez@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'CABANA MAMANI MIGUEL ARNALDO', 'email' => 'cabanamamani@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'CALSIN BORDA WILLIAN DAVID', 'email' => 'calsinborda@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'CARRASCO MAMANI FRANK MAIKOL', 'email' => 'carrascomamani@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'CASA PAUCCAR RICHARD SALVADOR', 'email' => 'casapauccar@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'CCALLOMAMANI AROCUTIPA LIZBETH', 'email' => 'ccallomamaniarocutipa@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'CCARI LAURA MARCOS GERMAN', 'email' => 'ccarilaura@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'CCOPA CONDORI YOEL OSTERLING', 'email' => 'ccopacondori@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'CCORI ARAGON ERICK GONZALO', 'email' => 'ccoriaragon@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'CHATA MAMANI MIGUEL ANGEL', 'email' => 'chatamamani@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'CHILA VILCA ROSMEL RONALDO', 'email' => 'chilavilca@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'CHOQUEHUANCA CACERES WILIAN ADRIAN', 'email' => 'choquehuancacaceres@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'CHOQUEMAQUI HUALLA GUIDO RONY', 'email' => 'choquemaquihualla@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'CONDORI ALANGUIA IVAN', 'email' => 'condorialanguia@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'CONDORI GUTIERREZ RODRIGO BERNARDO', 'email' => 'condorigutierrez@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'CONDORI GUZMAN CRISTIAN', 'email' => 'condoriguzman@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'CONDORI MAYHUA IVAN ESMIT', 'email' => 'condorimayhua@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'CONDORI PILCO RUTH MILAGROS', 'email' => 'condoripilco@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'CORRALES YUCRA CARLOS WALTER', 'email' => 'corralesyucra@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'CUTIPA FLORES ALEX PEDRO', 'email' => 'cutipaflores@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'ESPINOZA MAMANI GABINO', 'email' => 'espinozamamani@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'FLORES OQUENDO JOSE MANUEL ANDRE', 'email' => 'floresoquendo@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'FONSECA LIZARRAGA YERSON JOEL', 'email' => 'fonsecalizarraga@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'GALINDO LEANDRES ERIK JHUNIOR', 'email' => 'galindoleandres@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'GOMEZ CALIZAYA KEPHLER', 'email' => 'gomezcalizaya@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'HUAMAN ORTIZ CRHISTIAN LEONEL', 'email' => 'huamanortiz@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'HUANCA CARDOZA ROYER MATIAZ', 'email' => 'huancacardoza@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'HUANCA GUERRA JOHN CARLOS', 'email' => 'huancaguerra@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'HUAQUILLA TORRES YURY BRAYAN', 'email' => 'huaquillatorres@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'HUARAYA CHIPANA HENRY DENILSON', 'email' => 'huarayachipana@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'JARATA QUISPE MILTON', 'email' => 'jarataquispe@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'LóPEZ CRUZ GABRIEL ALEXANDER', 'email' => 'lopezcruz@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'LUQUE CANAZA REYKER YAXKIN', 'email' => 'luquecanaza@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'LUQUE LEQQUE EDY ANTONY', 'email' => 'luqueleqque@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'MAMANI LOPEZ JULIO ELIAS', 'email' => 'mamanilopez@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'MAMANI MAMANI JHULISA SHARMELLY', 'email' => 'mamanijhulisa@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'MAMANI MAMANI LIZBETH MAYUMY', 'email' => 'mamanilizbeth@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'MAMANI MAMANI YELSIN RANGEL', 'email' => 'mamaniyelsin@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'MAMANI QUISPE BRAYAN ALDAHIR', 'email' => 'mamaniquispe@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'MAMANI TICONA DIEGO CHRISTIAN', 'email' => 'mamaniticona@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'MAQUERA RAMOS MILESA ROCIO', 'email' => 'maqueraramos@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'MAYTA QUISPE MARX JHOEL', 'email' => 'maytaquispe@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'MENDOZA NINA ADDERLY', 'email' => 'mendozanina@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'MIRANDA SABANAYA ALEXANDER', 'email' => 'mirandasabanaya@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'MOLINA BENITO MANUEL JOSE', 'email' => 'molinabenito@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'MOLLEAPAZA QUEA BRAULIO RAUL VLADIMIR', 'email' => 'molleapazaquea@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'MULLISACA JAEN HECTOR ARTURO', 'email' => 'mullisacajaen@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'MULLUNI CANDIA MAYKOL', 'email' => 'mullunicandia@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'OCHOA CHIPILE ALVARO UBER', 'email' => 'ochoachipile@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'PAREDES VILCA CRISTIAN ALEX', 'email' => 'paredesvilca@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'PARI HUANCA MARIBEL', 'email' => 'parihuanca@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'PARISACA HUISA JUAN CARLOS', 'email' => 'parisacahuisa@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'PEREZ CALIZAYA JORGE LUIS', 'email' => 'perezcalizaya@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'PERLAS ARROYO JUAN CARLOS', 'email' => 'perlasarroyo@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'QUISPE CARTAGENA JOSE JHONATAN', 'email' => 'quispecartagena@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'QUISPE GUTIERREZ ABRAHAM EINSTEIN', 'email' => 'quispegutierrez@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'QUISPE MAMANI EFREN HAMELL', 'email' => 'quispeefren@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'QUISPE MAMANI YONY SADAN', 'email' => 'quispeyony@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'QUISPE QUISPE WALDIR RIVALDO', 'email' => 'quispequispe@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'RAMOS PIEROLA YELSI JENISEHT', 'email' => 'ramospierola@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'ROMANI COTOHUANCA DIEGO ADOLFO', 'email' => 'romanicotohuanca@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'ROMERO FERNANDEZ MERY ISABEL', 'email' => 'romerofernandez@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'SALAS AGUILAR CLAUDIA MADELEYNE', 'email' => 'salasaguilar@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'SANCHEZ MAMANI BRAD TYLER', 'email' => 'sanchezmamani@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'TAPARA CANSAYA DENNIS HENRY', 'email' => 'taparacansaya@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'URVIOLA GARCIA CHRISTIAN ANDRE', 'email' => 'urviolagarcia@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
        User::factory()->create([
            'name' => 'VILCA QUISPE OSCAR EDY', 'email' => 'vilcaquispe@info.com', 'password' => Hash::make('password'), 'tipo_usuario_id' => '3',
        ]);
    }
}
