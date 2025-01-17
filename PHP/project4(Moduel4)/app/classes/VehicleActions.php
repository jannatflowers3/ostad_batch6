<?php

interface vehiclesActions{
    public function addVehicles($data);
    public function editVehicle($id,$data);
    public function deleteVehicle($id);
    public function getVehicles();
}