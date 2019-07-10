<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
  public function newQuery(){
    $query = parent::newQuery();
    if(auth()-> check()){
      if(auth()-> user()-> role_id === User::CUSTOMER){
        if(auth()-> user()-> customer){
          return $query-> where('customer_id', auth()-> user()-> customer-> id);
        }
        return $query-> where('customer_id', -1);
      }
    }
    return $query;
  }
}
