<?

namespace model;

require_once "../autoload.php";


class Course
{
    public readonly int $ID;
    public string $Name;

    public function __construct(int $ID, string $Name)
    {
        $this->ID = $ID;
        $this->Name = $Name;
    }
}
