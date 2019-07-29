<?php
namespace App\Service;

class ScriptMetrics {


   # private $scriptMetrics;

    #public function __construct(ScriptMetrics $scriptMetrics)
    #{
     #   $this->scriptMetrics = $scriptMetrics;
    #}

    private $lines_per_actor = 0;
    private $words_per_actor = 0;
    private $mentions_per_actor = 0;
    private $movies_per_year = 10;
    private $percent_of_fails = 5;

    public function linesPerActor($id) {
        $body = $this->getDoctrine()->getRepository(Movie::class)->find($body);
        $lines = preg_split("/^/$actor_name.*$/", "$body");
        $lines_per_actor = count($lines);
        $newScript = new Script();
        $newScript->setLinesPerActor($lines_per_actor);
        // tell Doctrine to save lines per actor data for future use (but no db queries yet)
        //$entityManager->persist($newScript);
        // saves data, executes INSERT query 
        if (!$session->has('lines_per_actor')) {
            $em->persist($newScript);
            $em->flush();
            $session->set('lines_per_actor',$newScript);
        }
        $entityManager->flush();
        //this might process the text multiple times :/ need to be more specific 
    }

    //words per actor 
    public function wordsPerActor($body) {
        return 'it does a thing';
    }

    //mentions per actor #todo
    public function mentionsPerActor($body) {
        return 'it does a thing here too';
        //using regex something like /^/$actor_name.*$/
    }

    //movies per year
    public function moviesPerYear() {
        return 'it does a thing one';
        //something #todo
    }

    //fails per year
    public function failsPerYear() {
        return 'it does a thing two';
        //something #todo
    }







}