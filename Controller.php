<?php

/****** Bootstrap ******/

function autoLoader($className){
	$path = str_replace('\\', '/', $className . '.php');
	if(file_exists($path)) {
		require_once($path);
    	return;
	}
	
}
spl_autoload_register('autoLoader');

/****** Bootstrap ******/

use Model\Howitzer,
    Model\Angle,
    Model\User,
    Model\Shot,
    Model\Distance,
    Model\Result,
    Model\Speed,
    Model\Target,
    Library\Database\PdoAdapter,
    Model\Mapper\AngleMapper,
    Model\Mapper\DistanceMapper,
    Model\Mapper\HowitzerMapper,
    Model\Mapper\ResultMapper,
    Model\Mapper\ShotMapper,
    Model\Mapper\SpeedMapper,
    Model\Mapper\TargetMapper,
    Model\Mapper\UserMapper,
    Model\Mapper\TopNumberAcurateUsersMapper,
    Service\ShotService,
    Service\UserService;

// create a PDO adapter
$adapter = new PdoAdapter("mysql:host=localhost;dbname=test", "root", "root");

// create the mappers
$angleMapper = new AngleMapper($adapter);
$distanceMapper = new DistanceMapper($adapter);
$howitzerMapper = new HowitzerMapper($adapter);
$userMapper = new UserMapper($adapter);
$speedMapper = new SpeedMapper($adapter);
$targetMapper = new TargetMapper($adapter);
$shotMapper = new ShotMapper(	$adapter, 
								$userMapper,
								$howitzerMapper,
								$targetMapper,
								$distanceMapper,
								$speedMapper,
								$angleMapper
							);

$resultMapper = new ResultMapper($adapter, $userMapper, $shotMapper);


$users = $userMapper->findAll();
$listHowitzerShell = $howitzerMapper->findAll();
$listDistance = $distanceMapper->findAll();
$listSizeTarget = $targetMapper->findAll();
$listSpeed = $speedMapper->findAll();
$listAngle = $angleMapper->findAll();
$topFive = $resultMapper;
$totalshotAllUser = count($shotMapper->findAll());
$avgShotByUser = ($totalshotAllUser / count($users));
$allRankings = $resultMapper->getRankingAllUsers();

if(!isset($_GET['selectUser'])){
    $_GET['selectUser'] = 1;
}
               
$totalshotByUser = count($shotMapper->findBy($_GET['selectUser']));
               
$totalUsers = count($userMapper->findAll());
if(isset($_POST['submit'])) 
{
	$submit = true;
	$user = $userMapper->findBy($_GET['selectUser']);
	$howitzer = $howitzerMapper->getTopAcurateUsersByLimit();
	$target = $targetMapper->findById($_POST['selectSizeTarget']);
	$distance = $distanceMapper->findById($_POST['selectDistanceTarget']);
	$speed = $speedMapper->findById($_POST['selectMuzzleSpeed']);
	$angle = $angleMapper->findById($_POST['selectAngleShot']);
					
	$idShot = $shotMapper->insert( 
									$user, 
									$howitzer, 
									$target, 
									$distance, 
									$speed, 
									$angle
			);
					
	$shotService = new ShotService($shotMapper);
	$impact = $shotService->calculateTrajectoire($shotMapper->findById($idShot));
    	 			
    if(isset($impact)){
    	if(($impact >= ($_POST['selectDistanceTarget'] - ($_POST['selectSizeTarget']/2))) && ($impact <= ($_POST['selectDistanceTarget'] + ($_POST['selectSizeTarget']/2)))){
     		$hit = 1;
     	} else {
     		$hit = 0;
     	}
     	$distance_target_impact = abs($_POST['selectDistanceTarget'] - $impact);
		$resultMapper->insert($shotMapper->findById($idShot), $user, $hit, $distance_target_impact);
     }
} 
include 'view/run.php'; 
