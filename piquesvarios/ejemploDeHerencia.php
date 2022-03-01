<?php
        // First, we create the father class
        class Human{

                //  We declare the attributes we are going to use
                private $name;
                private $lastName;
                private $age;
                private $gender;

                /*
                 * In the next lines we can watch
                 * a distribution of 2 blocks of code
                 * where the first is the setter and the
                 * next is the getter. These are related
                 * to the attributes above
                        * */

                function setName($name){
                        $this -> name = $name;
                }
                function getName(){
                        return $this->name;
                }

                function setLastName($lastName){
                        $this->lastName = $lastName;
                }
                function getLastName(){
                        return $this->lastName;
                }

                function setAge($age){
                        $this->age = $age;
                }
                function getAge(){
                        return $this->age;
                }

                function setGender($gender){
                        $this->gender = $gender;
                }
                function getGender(){
                        return $this->gender;
                }

                // In this function we make use of
                // all the attributes initialized
                function describeYourself(){
                        print "Hi, I am a ".$this->gender." my name is ".$this->name." ".$this->lastName." and I am ".$this->age." years old \n";  --Mo }
        }

        // Here we have the two classes with the inheritance of the Human class
        // They are empty because all is in the father class
        class Man extends Human{

        }

        class Woman extends Human{

        }
        /*
         * In the next lines we have the creation of the objects
         * and the setting of all the attributes
         * at last we have the declaration of the function
         * where we use all the attributes
        * */

        $javier = new Man();
        $javier -> setName("Javier");
        $javier -> setLastName("Marin");
        $javier -> setAge(20);
        $javier -> setGender("man");
        $javier -> describeYourself();

        $ana = new Woman();
        $ana -> setName("Ana");
        $ana -> setLastName("Garcia");
        $ana -> setAge(59);
        $ana -> setGender("woman");
        $ana->describeYourself();

?>