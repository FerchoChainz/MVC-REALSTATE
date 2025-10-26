<?php  

namespace Models;

use Model\ActiveRecord;
use PDO;

class Blog extends ActiveRecord{

    protected static $table = 'posts';
    protected static $DBcols = ['id','tittle','created','author','description','image','content'];

    public $id;
    public $tittle;
    public $created;
    public $author;
    public $description;
    public $image;
    public $content;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->tittle = $args['tittle'] ?? '';
        $this->created = date('Y/m/d') ?? '';
        $this->author = $args['author'] ?? '';
        $this->description = $args['description'] ?? null;
        $this->image = $args['image'] ?? null;
        $this->content = $args['content'] ?? null;
    }

    
}