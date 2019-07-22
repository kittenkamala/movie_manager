<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ScriptRepository")
 */
class Script
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }


    /** 
    *@ORM\Column(type="text")
    */
    private $lines_per_actor;


    /** 
    *@ORM\Column(type="text")
    */
    private $words_per_actor;


    /** 
    *@ORM\Column(type="text")
    */
    private $mentions_per_actor;


    /** 
    *@ORM\Column(type="text")
    */
    private $movies_per_year;

      /** 
    *@ORM\Column(type="text")
    */
    private $percent_of_fails;


    //getters and setters

    //get id
    public function getId2() {
        return $this->id;
    }

    //get lines per actor #todo, build functionality for this
    public function getLinesPerActor() {
        //this is where your regex should go for # of lines, something like /^/$actor_name.*$/
        return $this->$lines_per_actor;
    }
   
    //set lines per actor 1 #todo
    public function setLinesPerActor() {
        $lines_per_actor = 0;
        return $lines_per_actor;
      #  return $this->lines_per_actor = $lines_per_actor;
    }


    //get words per actor  #todo build functionality for this 
    public function getWordPerActor() {
        //this is where your regex should go for # of lines, something like /^/$actor_name.*$/
        return $this->$words_per_actor;
    }
   
    //set words per actor 
    public function setWordsPerActor() {
        $words_per_actor = 0;
        return $this->words_per_actor = $words_per_actor;
    }


    //get mentions per actor 
    public function getMentionsPerActor() {
        //this is where your regex should go for # of lines, something like /^/$actor_name.*$/
        return $this->$mentions_per_actor;
    }
   
    //set mentions per actor 
    public function setMentionsPerActor() {
        $mentions_per_actor = 0;
        return $this->mentions_per_actor = $mentions_per_actor;
    }

    
    //get MoviesPerYear
    public function getMoviesPerYear() {
        return $this->$movies_per_year;
    }

    //set MoviesPerYear
    public function setMoviesPerYear() {
        $movies_per_year = 0;
        return $this->movies_per_year = $movies_per_year;
    }


    //get percent of fails 
    public function getPercentOfFails() {
        return $this->$percent_of_fails;
    }

    //set percent of fails
    public function setPercentOfFails() {
        $percent_of_fails = 0;
        return $this->percent_of_fails = $percent_of_fails;
    }
}