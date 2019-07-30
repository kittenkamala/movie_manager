<?php

namespace App\Entity;
use App\Entity;
use Symfony\Component\Routing\Annotation;
use App\Service\ScriptMetrics;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ScriptRepository")
 */
class Script
{

    /*
    private $ScriptMetrics;

    public function __construct(ScriptMetrics $ScriptMetrics)
    {
        $this->ScriptMetrics = $ScriptMetrics;
    }  */
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @ORM\OneToOne(targetEntity="Movie")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }


    /** 
    *@ORM\Column(type="integer", name="lines_per_actor", nullable=true, options={"unsigned":true, "default":0})
    */
    private $lines_per_actor;


    /** 
    *@ORM\Column(type="integer", name="words_per_actor", nullable=true, options={"unsigned":true, "default":0})
    */
    private $words_per_actor;


    /** 
    *@ORM\Column(type="integer", name="mentions_per_actor", nullable=true, options={"unsigned":true, "default":0})
    */
    private $mentions_per_actor;


    /** 
    *@ORM\Column(type="integer", name="movies_per_year", nullable=true, options={"unsigned":true, "default":0})
    */
    private $movies_per_year;

    /** 
    *@ORM\Column(type="integer", name="percent_of_fails", nullable=true, options={"unsigned":true, "default":0})
    */
    private $percent_of_fails;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Movie", inversedBy="script_id", cascade={"persist", "remove"})
     */
    private $script_id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $body;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $actor_name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $company;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $actor_pay;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $actor_revenue;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $company_revenue;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $losses;


    //getters and setters

    //get id
    public function getId2() {
        return $this->id;
    }

    //get lines per actor 
    public function getLinesPerActor() {
        return $this->lines_per_actor;
    }
   
    //set lines per actor 
    public function setLinesPerActor($lines_per_actor) {
        return $this->lines_per_actor = $lines_per_actor;
    }


    //get words per actor  #todo build functionality for this 
    public function getWordsPerActor() {
        return $this->words_per_actor;
    }
   
    //set words per actor 
    public function setWordsPerActor($words_per_actor) {
        return $this->words_per_actor = $words_per_actor;
    }


    //get mentions per actor 
    public function getMentionsPerActor() {
        //this is where your regex should go for # of lines, something like /^/$actor_name.*$/
        return $this->mentions_per_actor;
    }
   
    //set mentions per actor 
    public function setMentionsPerActor($mentions_per_actor) {
        return $this->mentions_per_actor = $mentions_per_actor;
    }

    
    //get MoviesPerYear
    public function getMoviesPerYear() {
        return $this->movies_per_year;
    }

    //set MoviesPerYear
    public function setMoviesPerYear($movies_per_year) {
        return $this->movies_per_year = $movies_per_year;
    }


    //get percent of fails 
    public function getPercentOfFails() {
        return $this->percent_of_fails;
    }

    //set percent of fails
    public function setPercentOfFails($percent_of_fails) {
        return $this->percent_of_fails = $percent_of_fails;
    }

    //getters and setters for relationship to movies table
    public function getScriptId(): ?Movie
    {
        return $this->script_id;
    }

    public function setScriptId(?Movie $script_id): self
    {
        $this->script_id = $script_id;

        return $this;
    }

    //get and set script title
    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    //get and set script body 
    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(?string $body): self
    {
        $this->body = $body;

        return $this;
    }

    public function getActorName(): ?string
    {
        return $this->actor_name;
    }

    public function setActorName(?string $actor_name): self
    {
        $this->actor_name = $actor_name;

        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(?string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getActorPay(): ?int
    {
        return $this->actor_pay;
    }

    public function setActorPay(?int $actor_pay): self
    {
        $this->actor_pay = $actor_pay;

        return $this;
    }

    public function getActorRevenue(): ?int
    {
        return $this->actor_revenue;
    }

    public function setActorRevenue(?int $actor_revenue): self
    {
        $this->actor_revenue = $actor_revenue;

        return $this;
    }

    public function getCompanyRevenue(): ?int
    {
        return $this->company_revenue;
    }

    public function setCompanyRevenue(?int $company_revenue): self
    {
        $this->company_revenue = $company_revenue;

        return $this;
    }

    public function getLosses(): ?int
    {
        return $this->losses;
    }

    public function setLosses(?int $losses): self
    {
        $this->losses = $losses;

        return $this;
    }
}