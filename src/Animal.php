<?php
    class Animal
    {
        private $id;
        private $category_id;
        private $name;
        private $breed;
        private $gender;
        private $date_admitted;

        function __construct($id = null, $category_id, $name, $breed, $gender, $date_admitted)
        {
            $this->id = $id;
            $this->category_id = $category_id;
            $this->name = $name;
            $this->breed = $breed;
            $this->gender = $gender;
            $this->date_admitted = date_create($date_admitted);
        }

        function getId()
        {
            return $this->id;
        }

        function getCategoryId()
        {
            return $this->category_id;
        }

        function getName()
        {
            return $this->name;
        }

        function getBreed()
        {
            return $this->breed;
        }

        function getGender()
        {
            return $this->gender;
        }

        function getDateAdmitted()
        {
            return date_format($this->date_admitted, 'Y-m-d');
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO animals (id, category_id, name, breed, gender, date_admitted) VALUES ({$this->getId()}, {$this->getCategoryId()}, '{$this->getName()}', '{$this->getBreed()}', '{$this->getGender()}', '{$this->getDateAdmitted()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_animals = $GLOBALS['DB']->query("SELECT * FROM animals;");
            $animals = array();
            foreach($returned_animals as $animal) {
                $id = $animal['id'];
                $category_id = $animal['category_id'];
                $name = $animal['name'];
                $breed = $animal['breed'];
                $gender = $animal['gender'];
                $date_admitted = $animal['date_admitted'];
                $new_animal = new Animal($id, $category_id, $name, $breed, $gender, $date_admitted);
                array_push($animals, $new_animal);
            }
            return $animals;
        }

        static function deleteAll()
        {
          $GLOBALS['DB']->exec("DELETE FROM animals;");
        }


    }


?>
