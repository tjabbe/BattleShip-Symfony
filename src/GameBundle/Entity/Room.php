<?php

namespace GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use GameBundle\Entity\Player;
use GameBundle\Entity\PlayerRoom;

/**
 * Room
 *
 * @ORM\Table(name="room")
 * @ORM\Entity
 */
class Room
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="player_room_1_id", type="integer", nullable=false)
     */
    private $playerRoom1Id;

    /**
     * @var integer
     *
     * @ORM\Column(name="player_room_2_id", type="integer", nullable=true)
     */
    private $playerRoom2Id;

    /**
     * @var string
     *
     * @ORM\Column(name="winner", type="string", length=255, nullable=false)
     */
    private $winner;

    /**
     * @var string
     *
     * @ORM\Column(name="turn", type="string", length=255, nullable=false)
     */
    private $turn;

    /**
     * @var boolean
     *
     * @ORM\Column(name="started", type="boolean", nullable=false)
     */
    private $started;

    /**
     * @var boolean
     *
     * @ORM\Column(name="done", type="boolean", nullable=false)
     */
    private $done;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="datetime", nullable=false)
     */
    private $creationDate;

    public function __construct()
    {
        $this->winner       = 'No winner yet!';
        $this->started      = false;
        $this->done         = false;
        $this->creationDate = new \DateTime();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set playerRoom1Id
     *
     * @param integer $playerRoom1Id
     *
     * @return Room
     */
    public function setPlayerRoom1Id($playerRoom1Id)
    {
        $this->playerRoom1Id = $playerRoom1Id;

        return $this;
    }

    /**
     * Get playerRoom1Id
     *
     * @return integer
     */
    public function getPlayerRoom1Id()
    {
        return $this->playerRoom1Id;
    }

    /**
     * Set playerRoom2Id
     *
     * @param integer $playerRoom2Id
     *
     * @return Room
     */
    public function setPlayerRoom2Id($playerRoom2Id)
    {
        $this->playerRoom2Id = $playerRoom2Id;

        return $this;
    }

    /**
     * Get playerRoom2Id
     *
     * @return integer
     */
    public function getPlayerRoom2Id()
    {
        return $this->playerRoom2Id;
    }

    /**
     * Set winner
     *
     * @param string $winner
     *
     * @return Room
     */
    public function setWinner($winner)
    {
        $this->winner = $winner;

        return $this;
    }

    /**
     * Get winner
     *
     * @return string
     */
    public function getWinner()
    {
        return $this->winner;
    }

    /**
     * Set turn
     *
     * @param string $turn
     *
     * @return Room
     */
    public function setTurn($turn)
    {
        $this->turn = $turn;

        return $this;
    }

    /**
     * Get turn
     *
     * @return string
     */
    public function getTurn()
    {
        return $this->turn;
    }

    /**
     * Set started
     *
     * @param boolean $started
     *
     * @return Room
     */
    public function setStarted($started)
    {
        $this->started = $started;

        return $this;
    }

    /**
     * Get started
     *
     * @return boolean
     */
    public function getStarted()
    {
        return $this->started;
    }

    /**
     * Set done
     *
     * @param boolean $done
     *
     * @return Room
     */
    public function setDone($done)
    {
        $this->done = $done;

        return $this;
    }

    /**
     * Get done
     *
     * @return boolean
     */
    public function getDone()
    {
        return $this->done;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Room
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @ORM\OneToOne(targetEntity="PlayerRoom", cascade={"persist"})
     * @ORM\JoinColumn(name="player_room_1_id", referencedColumnName="id")
     */
    private $player1;

    /**
     * @ORM\OneToOne(targetEntity="PlayerRoom", cascade={"persist"})
     * @ORM\JoinColumn(name="player_room_2_id", referencedColumnName="id")
     */
    private $player2;

    /**
     * Set player1
     *
     * @param \GameBundle\Entity\PlayerRoom $player1
     *
     * @return Room
     */
    public function setPlayer1(PlayerRoom $player1 = null)
    {
        $this->player1 = $player1;

        return $this;
    }

    /**
     * Get player1
     *
     * @return \GameBundle\Entity\PlayerRoom
     */
    public function getPlayer1()
    {
        return $this->player1;
    }

    /**
     * Set player2
     *
     * @param \GameBundle\Entity\PlayerRoom $player2
     *
     * @return Room
     */
    public function setPlayer2(PlayerRoom $player2 = null)
    {
        $this->player2 = $player2;

        return $this;
    }

    /**
     * Get player2
     *
     * @return \GameBundle\Entity\PlayerRoom
     */
    public function getPlayer2()
    {
        return $this->player2;
    }

    public function isFull()
    {
        if ($this->getPlayer1() && $this->getPlayer2()){
            return true;
        }

        else {
            return false;
        }
    }

    public function hasPlayer(Player $player)
    {
        if ($this->getPlayer1()->getPlayer() === $player || $this->getPlayer2()->getPlayer() === $player){
            return true;
        }

        else {
            return false;
        }
    }
}