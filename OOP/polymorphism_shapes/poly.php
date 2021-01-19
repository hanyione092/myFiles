<?php

    interface Shape {
        public function calcArea();
    }
    //to calculate the area of circle
    Class Circle implements Shape
    {
        private $radius;

        public function __construct($radius)
        {
            $this->radius = $radius;
        }

        public function calcArea()
        {
            return ($this->radius * $this->radius)*pi();
        }
    }

    //to calculate the area of rectangle
    Class Rectangle implements Shape
    {
        private $width;
        private $height;

        public function __construct($width, $height)
        {
            $this->width = $width;
            $this->height = $height;
        }

        public function calcArea()
        {
            return $this->width * $this->height;
        }
    }
?>