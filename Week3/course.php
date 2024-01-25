<?php
class Course {
    public $courseName = "Web Programming";
    public $courseNumber = 337;
    public $program = "CSCV";

    function __construct($name, $number, $program) {
        $this->courseName = $name;
        $this->courseNumber = $number;
        $this->program = $program;
    }

    function getFullName() {
        return "{$this->program}{$this->courseNumber} {$this->courseName}";
    }


}
?>