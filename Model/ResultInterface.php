<?php
namespace Model;

interface ResultInterface
{
 	public function setId($id);
 	public function getId();

 	public function setShot( ShotInterface $shot);
 	public function getShot();
 	
 	public function setUser( UserInterface $user);
 	public function getUser();
 	
 	public function setHit($hit);
 	public function getHit();
 	
 	public function setDistanceTargetImpact($distance_target_impact);
 	public function getDistanceTargetImpact();
}