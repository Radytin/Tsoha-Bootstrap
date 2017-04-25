<?php

  class BaseModel{
    // "protected"-attribuutti on käytössä vain luokan ja sen perivien luokkien sisällä
    protected $validators;
    

    public function __construct($attributes = null){
      // Käydään assosiaatiolistan avaimet läpi
      foreach($attributes as $attribute => $value){
        // Jos avaimen niminen attribuutti on olemassa...
        if(property_exists($this, $attribute)){
          // ... lisätään avaimen nimiseen attribuuttin siihen liittyvä arvo
          $this->{$attribute} = $value;
        }
      }
    }

    public function errors(){
      // Lisätään $errors muuttujaan kaikki virheilmoitukset taulukkona
      $errors = array();

      foreach($this->validators as $validator){
        // Kutsu validointimetodia tässä ja lisää sen palauttamat virheet errors-taulukkoon
            $error = $this->{$validator}();
            if ($error != null) {
                $errors[] = $error;
          
      }
    }

      return $errors;
    }
    
    
    public function validate_name(){
        $errors = array();
        if($this-> username == '' | $this-> username == null){
            $errors[] ='Käyttäjätunnus ei saa olla tyhjä';
        }
        if(strlen($this->username) < 3){
            $errors[]='Käyttäjätunnuksen pitää olla vähintään kolme merkkiä pitkä!';
        }
         return $errors;
    }
    
     public function validate_password(){
        $errors = array();
        if($this-> password == '' | $this-> password == null){
            $errors[] ='Salasana ei saa olla tyhjä';
        }
        if(strlen($this->password) < 5){
            $errors[]='Salansanan pitää olla vähintään viisi merkkiä pitkä!';
        }
         return $errors;
    }

  }
