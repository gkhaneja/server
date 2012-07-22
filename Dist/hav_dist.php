<?php
require_once 'location_type.php';

class Location{

public $location_array;
private $latitude;
private $longitude;

 public function __construct ()
  {
#    echo "Creating Location .. ";
    $this->location_array = array(LocationType::LATITUDE => '0',LocationType::LONGITUDE => '0',
           LocationType::DES_LATITUDE => '0',LocationType::DES_LONGITUDE => '0');
    $this->latitude = 0;
    $this->longitude = 0 ;
  }
 
 public function setLocation($value)
 {
  $this->latitude = $value['latitude'];
  $this->longitude = $value['longitude'];
  $this->location_array = array(LocationType::LATITUDE => $value['latitude'] , LocationType::LONGITUDE => $value['longitude'],LocationType::DES_LATITUDE => $value['des_latitude'] , LocationType::DES_LONGITUDE => $value['des_longitude'],LocationType::USERID => $value['userid']); 
 }

 public function setLocationfromObject($value)
 {
  $this->latitude = $value->latitude;
  $this->longitude = $value->longitude;
  $this->location_array = array(LocationType::LATITUDE => $value->latitude , LocationType::LONGITUDE => $value->longitude,LocationType::DES_LATITUDE => $value->des_latitude , LocationType::DES_LONGITUDE => $value->des_longitude,LocationType::USERID => $value->userid);
 }

 
 public function setLocationfromJSON($jsonstring)
 {
  
  $this->latitude = $jsonstring['latitude'];
  $this->longitude = $jsonstring['longitude'];
  $this->location_array = array(LocationType::LATITUDE => $jsonstring['latitude'] , LocationType::LONGITUDE => $jsonstring['longitude'],LocationType::DES_LATITUDE => $jsonstring['des_latitude'] , LocationType::DES_LONGITUDE => $jsonstring['des_longitude'],LocationType::USERID => $jsonstring['userid']);

 }

 public function getLocation()
 {
   $loc;
   $loc['latitude']= $this->latitude;
   $loc['longitude'] = $this->longitude;
   return $this->location_array;
 }
 
 public function getVal($attr)
 {
   return $this->location_array[$attr];
 }

 public function getHaversineDis($l)
 {
  $earth_radius = 3960.00; # in miles
  $lat_1 = $this->location_array[LocationType::DES_LATITUDE];
  $lon_1 = $this->location_array[LocationType::DES_LONGITUDE];
  $lat_2 = $l->location_array[LocationType::DES_LATITUDE];
  $lon_2 = $l->location_array[LocationType::DES_LONGITUDE];
  $delta_lat = $lat_2 - $lat_1 ;
  $delta_lon = $lon_2 - $lon_1 ;
 
  $alpha    = $delta_lat/2;
  $beta     = $delta_lon/2;
  $a        = sin(deg2rad($alpha)) * sin(deg2rad($alpha)) + cos(deg2rad($lat_1)) * cos(deg2rad($lat_2)) * sin(deg2rad($beta)) * sin(deg2rad($beta)) ;
  $c        = asin(min(1, sqrt($a)));
  $distance = 2*$earth_radius * $c;
  $distance = round($distance, 4);
 
  return $distance;	
 }
}
?>
