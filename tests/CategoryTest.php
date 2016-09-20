<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Category.php";

    $server = 'mysql:host=localhost;dbname=animal_shelter_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class CategoryTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Category::deleteAll();
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
            $id = null;
            $test_category = new Category($name, $id);
            $test_category->save();
            $test_category->save();
            $result = Category::getAll();
            $this->assertEquals($test_category, $result[0]);
        }

    }

?>
