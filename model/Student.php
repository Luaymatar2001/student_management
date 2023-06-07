<?

namespace model;

require_once "../autoload.php";

use model\Course;

class Student
{
    //properties
    public readonly int $ID;
    public $email;
    public $course = array();

    function __construct($ID, $email, Course ...$course)
    {
        $this->ID = $ID;
        $this->email = $email;
        $this->course = $course;
    }
}
