<?

namespace model;

// require_once "../";
require_once  "../autoload.php";


use model\GlobleVar;
use model\Student;
use model\Course;
use traits\Loggable;



class Manager
{
    //loggable trait
    use Loggable;

    public function addStudent(Student ...$studentArr)
    {
        $globleVar = new GlobleVar();

        $str = "";
        foreach ($studentArr as $student) {
            // $result  = array_push(GlobleVar::$StudentsRow, array($student->ID => $student));
            $result = GlobleVar::$StudentsRow[$student->ID] = $student;
            if ($result) {
                $globleVar->addInsertLog($student);
                $str  .= "Success for insert " . $student->ID . " student record <br>";
            } else {
                $str  .=  "Failed for insert " . $student->ID . " student record <br>";
            }
        }
        $str .= "------------------------------------------- <br>";
        return $str;
    }
    public function retrieve_student(...$Id)
    {
        $str = "";
        echo "--START SEARCH-- <br>";

        foreach ($Id as $id) {
            $this->AddToLog("Date of RETRIVE (");
            $this->AddToLog(date('y-m-d h:m:s'));
            $this->AddToLog(")");
            $this->AddToLog(" : the Admin Request Retrive ID (" . $id . ") Student");
            $this->AddToLog("<br>");
            if (array_key_exists($id, GlobleVar::$StudentsRow)) {
                $value = GlobleVar::$StudentsRow[$id];
                // echo $value;
                if (is_object($value)) {
                    //  $student = array_values(GlobleVar::$StudentsRow[$id])[1];
                    $str .= "______________________________________________________________________________________<br>";

                    $str .= <<<EVO
                      the student id :$value?->ID <br>
                      student email:$value?->email <br>
                      EVO;
                    if (count($value?->course) != 0) {
                        $str .= "<br>#the student courses # <br>";
                        foreach ($value->course as $courseObject) {
                            $str .= "-------------------------------------------<br>";
                            $str .= "=> course ID : " . $courseObject?->ID . "<br>";
                            $str .= "=> course ID : " . $courseObject?->Name . "<br>";
                        }
                    }
                }
            } else {
                $str .= "______________________________________________________________________________________<br>";
                $str .=  "the ID (" . $id . ") Student Record not exist !<br>";
                $str .= "______________________________________________________________________________________<br>";
            }
        }
        $str .= "__________________________________END SEARCH___________________________________________________________________________________";
        return $str;
    }


    public function update_student(int $ID, Student $new_student)
    {
        $str = "";
        if (array_key_exists($ID, GlobleVar::$StudentsRow)) {
            $result =  GlobleVar::$StudentsRow[$ID] = $new_student;
            $this->AddToLog("Date of UPDATE (");
            $this->AddToLog(date('y-m-d h:m:s'));
            $this->AddToLog(")");
            $this->AddToLog(" : the Admin update Student ID (" . $ID . ")");
            $this->AddToLog("<br>");
            if ($result) {
                $str = "update a student has been successful !<br>";
            } else {
                $str = "update a new student has been Faild !<br>";
            }
        } else {
            $str = "the ID (" . $ID . ") Student Record not exist !<br>";
        }
        return $str;
    }

    public function Delete_Student(int ...$ID)
    {
        $str = "";
        echo "---START DELETE---<br>";
        foreach ($ID as $id) {
            if (array_key_exists($id, GlobleVar::$StudentsRow)) {
                $this->AddToLog("Date of DELETE (");
                $this->AddToLog(date('y-m-d h:m:s'));
                $this->AddToLog(")");
                $this->AddToLog(" : the Admin DELETE Student ID (" . $id . ")");
                $this->AddToLog("<br>");
                unset(GlobleVar::$StudentsRow[$id]);
                $str .= "deleted a student has been success !<br>";
                $str .= "--------------------<br>";
            } else {
                $str .= "the ID (" . $id . ") Student Record not exist !<br>";
                $str .= "--------------------<br>";
            }
        }

        return $str;
    }

    public function ReadLogFile()
    {
        $this->ReadLog();
    }
    public function clearLog()
    {
        $this->clearFile();
        return "Log file cleanup completed successfully";
    }
}
