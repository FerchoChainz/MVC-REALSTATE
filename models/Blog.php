<?php  

namespace Model;

use PDO;

class Blog extends ActiveRecord{

    protected static $table = 'posts';
    protected static $DBcols = ['id','tittle','date','author','description','image','content'];

    public $id;
    public $tittle;
    public $date;
    public $author;
    public $description;
    public $image;
    public $content;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->tittle = $args['tittle'] ?? '';
        $this->date = date('Y/m/d') ?? '';
        $this->author = $args['author'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->image = $args['image'] ?? null;
        $this->content = $args['content'] ?? '';
    }

    public function validate(){
        if(!$this->tittle){
            self::$errors[] = "Tittle can't be empty.";
        }

        if(!$this->author){
            self::$errors[] = "Author can't be empty.";
        }

        if(!$this->image){
            self::$errors[] = 'Image is mandatory.';
        }

        if(!$this->description){
            self::$errors[] = "Description can't be empty";
        }

        if(!$this->content){
            self::$errors[] = "Content can't be empty";
        }


        return self::$errors;
    }

    
}