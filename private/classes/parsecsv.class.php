<?php
class ParseCsv{
    private $filename;
    private $header;
    private $data = [];
    public static $delimiter = ',';
    private $rowCount = 0;
    public function __construct($filename =''){
        if($filename != ''){
            $this->file($filename);
        }
    }
    public function file($filename){
        if(!file_exists($filename)){
            echo "File doesn't exist";
            return false;
        }elseif(!is_readable($filename)){
            echo "File isn't readable";
            return false;
        }
        $this->filename = $filename;
        return true;
    }
    public function parse(){
        if(!isset($this->filename)){
            echo "File isn't set";
            return false;
        }
        $this->reset();

        $file = fopen($this->filename,'r');
        while(!feof($file)){
            $row = fgetcsv($file,0,self::$delimiter);
            //print_r($row);
            if($row == [NULL] ||$row === false){
                //echo "hi";
                continue;
            }
            if(!$this->header){
                $this->header = $row;
            }else{
                $this->data[] = array_combine($this->header,$row);
                $this->$rowCount++; 
                
            }
        }
        fclose($file);
        return $this->data;
        }
        public function last_result (){
            return $this->data;
        }
        private function reset(){
            $this->data = [];
            $this->rowcCount = 0;
            $this->header = NULL;
        }
}
?>