<?php
require_once 'VehicleActions.php';
require_once 'VehicleBase.php';
require_once 'FileHandler.php';
class VehicleManager extends VehicleBase implements vehiclesActions{
    use FileHandler;
    public function addVehicles($data){
        $vehicles = $this->readFile();
        $vehicles[]=$data;
        $this->writeFile($vehicles);
    }
    public function editVehicle($id, $data){
        $vehicles = $this->readFile();
        if(isset($vehicles)){
            $vehicles[$id]= $data;
            $this->writeFile($vehicles);

        }
    }
    public function deleteVehicle($id){

   }
   public function getVehicles(){
    return $this->readFile();
}
    public function getDetails(){
        return [
            'name'=>$this->name,
            'type'=>$this->type,
            'price'=>$this->price,
            'image'=>$this->image,
        ];
    }
   
}