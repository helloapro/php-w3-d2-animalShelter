<?php
    class Category
    {
        private $name;
        private $id;

        function __construct($name, $id = null)
        {
            $this->name = $name;
            $this->id = $id;
        }

        function getName()
        {
            return $this->name;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO categories (name) VALUES ('{$this->getName()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function getAnimals()
        {
            $animals = Array();
            $returned_animals = $GLOBALS['DB']->query("SELECT * FROM animals WHERE category_id = {$this->getId()};");
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

        static function find($search_id)
        {
            $found_category = null;
            $categories = Category::getAll();
            foreach($categories as $category) {
                $category_id = $category->getId();
                if ($category_id == $search_id) {
                  $found_category = $category;
                }
            }
            return $found_category;
        }

        static function getAll()
        {
            $returned_categories = $GLOBALS['DB']->query("SELECT * FROM categories;");
            $categories = array();
            foreach($returned_categories as $category) {
                $name = $category['name'];
                $id = $category['id'];
                $new_category = new Category($name, $id);
                array_push($categories, $new_category);
            }
            return $categories;
        }

        static function deleteAll()
        {
          $GLOBALS['DB']->exec("DELETE FROM categories;");
        }



    }
?>
