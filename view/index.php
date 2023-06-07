<?

namespace view;

require_once "../autoload.php";


use \model\Course;
use \model\Student;
use \model\Manager;


$std1 = new Student(
    1,
    "Luay",
    new Course(1, "Laravel"),
    new Course(2, "php"),
    new Course(3, "css"),
    new Course(4, "js"),
    new Course(5, "html")
);

$std2 = new Student(
    2,
    "Ali",
    new Course(1, "Laravel"),
    new Course(2, "php"),
    new Course(3, "css"),
    new Course(4, "js"),

);
$std3 = new Student(
    5,
    "ALI",
    new Course(2, "php"),
    new Course(4, "js"),
    new Course(5, "html")
);


$std4 = new Student(
    10,
    "Ahmed",
    new Course(1, "Laravel"),
    new Course(2, "php"),
    new Course(3, "css"),
    new Course(4, "js"),
    new Course(5, "html")
);


$admin = new Manager();
echo "---------------------- Add new Students -------------------------------------------- <br>";
echo $admin->addStudent($std1, $std2, $std3, $std3);
echo "<br>";

echo "<br>";
echo "<br>";
echo "<br>";
echo "---------------------- retrieve student by ID -------------------------------------------- <br>";
echo $admin->retrieve_student(1, 10, 11);
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "---------------------- Update student by ID -------------------------------------------- <br>";
$stdUpdate = new Student(
    10,
    "Ipraheam",
    new Course(1, "Laravel"),
    new Course(4, "js"),
    new Course(5, "html")
);
echo $admin->update_student(1, $stdUpdate);
echo $admin->retrieve_student(1);
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";


echo "---------------------- DELETE student by ID -------------------------------------------- <br>";
echo $admin->Delete_Student(10, 1);
echo $admin->retrieve_student(10, 1);
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";


echo "---------------------- Show Log File -------------------------------------------- <br>";
echo "<br>";
echo $admin->ReadLogFile();
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";


echo "---------------------- clear Log File -------------------------------------------- <br>";
echo "<br>";
echo $admin->clearLog();
