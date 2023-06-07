<?

namespace traits;

trait Loggable
{
    const filename = "../log.txt";

    public function AddToLog($message): void
    {

        $file = fopen(self::filename, "a");
        if ($file) {
            fwrite($file, $message);
            fclose($file);
        } else {
            echo "=> Faild to access the file ! <br> ";
        }
        // 
    }
    public function ReadLog()
    {

        $file = file_get_contents(self::filename);
        if ($file) {
            echo $file;
        } else {
            echo " => Faild to access the file ! <br> ";
        }
    }
    public function clearFile()
    {
        file_put_contents(self::filename, "");
    }
}
