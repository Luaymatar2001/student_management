<?

namespace model;

require_once "../autoload.php";

use traits\Loggable;
use model\Course;
use model\Student;

class GlobleVar
{
    use Loggable;
    static $StudentsRow = array();

    public function addInsertLog($studentObject)
    {
        $this->AddToLog("Date of INSERT (");
        $this->AddToLog(date('y-m-d h:m:s'));
        $this->AddToLog(")");
        $this->AddToLog(" : Insert new student by Admin : [ID : " . $studentObject->ID . " , Email : " . $studentObject->email);
        $this->AddToLog(" : Courses Name [");
        foreach ($studentObject->course as $courses) {
            $this->AddToLog($courses->Name . " , ");
        }
        $this->AddToLog(" ] ];");
        $this->AddToLog("<br>");
    }
}
