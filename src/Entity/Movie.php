<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Service\ScriptMetrics;


/**
 * @ORM\Entity(repositoryClass="App\Repository\MovieRepository")
 */
class Movie
{
    /** 
    *@ORM\Column(type="text")
    */
   /* private $scriptMetrics;

    public function __construct(ScriptMetrics $scriptMetrics)
    {
        $this->scriptMetrics = $scriptMetrics;
    } */
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * *@ORM\Column(type="text", length=100)
     */
     private $title;

    /** 
    *@ORM\Column(type="text")
    */
    private $body;

    /** 
    *@ORM\Column(type="text")
    */
    private $company;

    /** 
    *@ORM\Column(type="text")
    */
    private $actor_name; 

    /** 
    *@ORM\Column(type="text")
    */
    private $actor_pay;

    /** 
    *@ORM\Column(type="text")
    */
    private $actor_revenue;

    /** 
    *@ORM\Column(type="text")
    */
    private $company_revenue;

      /** 
    *@ORM\Column(type="text")
    */
    private $losses;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Script", mappedBy="script_id", cascade={"persist", "remove"})
     */
    private $script_id;




    //getters and setters

    //get id
    public function getId(): ?int
    {
        return $this->id;
    }

    //get title
    public function getTitle() {
        return $this->title;
    }

    //set title
    public function setTitle($title) {
        $this->title = $title;
    }

    //get body
    public function getBody() {
        return $this->body;
    }

    //set body
    public function setBody($body) {
         $this->body = $body;
    }

    //get company
    public function getCompany() {
        return $this->title;
    }

    //set company
    public function setCompany($company) {
        $this->company = $company;
    }

    //get actor name 
    public function getActor() {
        return $this->actor_name;
    }

    //set actor name  
    public function setActor($actor_name) {
        $this->actor_name = $actor_name;
    }

    //get actor pay
    public function getActorPay() {
        return $this->actor_pay;
    }
    //set actor pay
    public function setActorPay($actor_pay) {
        $this->actor_pay = $actor_pay;
    }

    //get average actor revenue #todo 
    public function getActorRevenue() {
        return $this->actor_revenue;
    }
    //set actor revenue
    public function setActorRevenue($actor_revenue) {
        $this->actor_revenue = $actor_revenue;
    }

    //get company revenue
    public function getCompanyRevenue() {
        return $this->company_revenue;
    }
    //set company revenue
    public function setCompanyRevenue($company_revenue) {
        $this->company_revenue = $company_revenue;
    }

    //get losses
    public function getLosses() {
        return $this->losses;
    }
    //set losses
    public function setLosses($losses) {
        $this->losses = $losses;
    }

    public function getScript(): ?Script
    {
        return $this->script_id;
    }

    public function setScript(?Script $script): self
    {
        $this->script_id = $script_id;

        // set (or unset) the owning side of the relation if necessary
        $newScript_id = $script_id === null ? null : $this;
        if ($newScript_id !== $script->getScriptId()) {
            $script_id->setScriptId($newScript_id);
        }

        return $this;
    }
    
}
