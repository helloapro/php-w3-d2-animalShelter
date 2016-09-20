<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Animal.php";
    require_once "src/Category.php";

    $server = 'mysql:host=localhost;dbname=animal_shelter_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class AnimalTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Animal::deleteAll();
        }

        function test_getName()
        {
            $id = null;
            $category_id = 1;
            $name = "Bobby";
            $breed = "Husky";
            $gender = "neutral";
            $date_admitted = "2016-09-02";
            $test_animal = new Animal($id, $category_id, $name, $breed, $gender, $date_admitted);
            $result = $test_animal->getName();
            $this->assertEquals($name, $result);
        }

        function test_getBreed()
        {
            $id = null;
            $category_id = 1;
            $name = "Bobby";
            $breed = "Husky";
            $gender = "neutral";
            $date_admitted = "2016-09-02";
            $test_animal = new Animal($id, $category_id, $name, $breed, $gender, $date_admitted);
            $result = $test_animal->getBreed();
            $this->assertEquals($breed, $result);
        }

        function test_getGender()
        {
            $id = null;
            $category_id = 1;
            $name = "Bobby";
            $breed = "Husky";
            $gender = "neutral";
            $date_admitted = "2016-09-02";
            $test_animal = new Animal($id, $category_id, $name, $breed, $gender, $date_admitted);
            $result = $test_animal->getGender();
            $this->assertEquals($gender, $result);
        }

        function test_getId()
        {
            $id = null;
            $category_id = 1;
            $name = "Bobby";
            $breed = "Husky";
            $gender = "neutral";
            $date_admitted = "2016-09-02";
            $test_animal = new Animal($id, $category_id, $name, $breed, $gender, $date_admitted);
            $result = $test_animal->getId();
            $this->assertEquals($id, $result);
        }

        function test_getCategoryId()
        {
            $id = null;
            $category_id = 1;
            $name = "Bobby";
            $breed = "Husky";
            $gender = "neutral";
            $date_admitted = "2016-09-02";
            $test_animal = new Animal($id, $category_id, $name, $breed, $gender, $date_admitted);
            $result = $test_animal->getCategoryId();
            $this->assertEquals($category_id, $result);
        }

        function test_getDate()
        {
            $id = null;
            $category_id = 1;
            $name = "Bobby";
            $breed = "Husky";
            $gender = "neutral";
            $date_admitted = "2016-09-02";
            $test_animal = new Animal($id, $category_id, $name, $breed, $gender, $date_admitted);
            $result = $test_animal->getDateAdmitted();
            $this->assertEquals($date_admitted, $result);
        }

        function test_save()
        {
            $id = null;
            $category_id = 1;
            $name = "Bobby";
            $breed = "Husky";
            $gender = "neutral";
            $date_admitted = "2016-09-02";
            $test_animal = new Animal($id, $category_id, $name, $breed, $gender, $date_admitted);
            $test_animal->save();
            $result = Animal::getAll();
            $this->assertEquals($test_animal, $result[0]);
        }

    }

?>
