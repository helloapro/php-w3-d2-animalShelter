<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Category.php";
    require_once "src/Animal.php";

    $server = 'mysql:host=localhost;dbname=animal_shelter_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class CategoryTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Category::deleteAll();
            Animal::deleteAll();
        }

        function test_getName()
        {
            $name = "Cat";
            $id = null;
            $test_category = new Category($name, $id);
            $result = $test_category->getName();
            $this->assertEquals($name, $result);
        }

        function test_getId()
        {
            $name = "Cat";
            $id = 1;
            $test_category = new Category($name, $id);
            $result = $test_category->getId();
            $this->assertEquals($id, $result);
        }

        function test_save()
        {
            $name = "Cat";
            $test_category = new Category($name);
            $test_category->save();
            $result = Category::getAll();
            $this->assertEquals($test_category, $result[0]);
        }

        function test_getAnimals()
        {
            $name = "Cat";
            $id = null;
            $test_category = new Category($name, $id);
            $test_category->save();
            $name = "Dog";
            $id = null;
            $test_category2 = new Category($name, $id);
            $test_category2->save();


            $id = null;
            $category_id = $test_category->getId();
            $name = "Bobby";
            $breed = "Husky";
            $gender = "neutral";
            $date_admitted = "2016-09-02";
            $test_animal = new Animal($id, $category_id, $name, $breed, $gender, $date_admitted);
            $test_animal->save();
            $id = null;
            $category_id = $test_category2->getId();
            $name = "Fluffy";
            $breed = "Tabby";
            $gender = "Male";
            $date_admitted = "2016-09-10";
            $test_animal2 = new Animal($id, $category_id, $name, $breed, $gender, $date_admitted);
            $test_animal2->save();

            $result = $test_category->getAnimals();

            $this->assertEquals($test_animal, $result[0]);
        }

    }

?>
