<?php
namespace models;
class user extends dtbase{
function Insert(array $data){
   return $this->SendData("INSERT INTO `vdata`.`user` (`user_name`, `user_surname`,`pseudo`,`_password`, `user_role`) VALUES (?, ?, ?, ?, ?);",$data);
}
function Update(array $data){
    return $this ->SendData("UPDATE user SET (pseudo=?,_password=?,user_name=?,user_surname=?,user_role=?)WHERE id=?",$data);
}
function GetUser(){
    return $this ->GetManyData("SELECT pseudo,_password, user_name, user_surname, user_role FROM user WHERE id=?");
}
function GetAdminByLogin(string $login){
    return $this->GetOneData("SELECT  pseudo, _password, user_role FROM user WHERE pseudo=?",[$login]);
    
}
function verifUser(string $login){
    return $this->GetOneData("SELECT  user_name, user_surname, pseudo, _password, user_role FROM user WHERE pseudo=?",[$login]);
}
}
?>