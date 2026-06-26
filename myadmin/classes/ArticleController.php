<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
require_once 'Database.php';
require_once 'Access.php';

class ArticleController extends Database
{
    protected $table = 'cms_articles';
    protected $primaryKey = 'id';
    protected $fillables = ['author_id','short_name', 'long_name', 'category_id', 'article_summary', 'article_content', 'large_image_url', 'small_image_url', 'url_slug', 'status', 'large_image_status'];
    protected $optional = ['author_id','large_image_url','small_image_url', 'status', 'large_image_status'];
    protected $errors = [];
    protected $message = [];
    protected $values = [];
    protected $queryStr = "";
    protected $revision_id = "";

    public function index($limit = 0, $offset = 0)
    {
        return $this->readData($this->table, [], ['status' => 1], '', $limit, $offset, ['created_at DESC']);
    }

    public function category($cat_slug, $limit = 0, $offset = 0)
    {
        if(is_numeric($cat_slug))
        {
            $category = $this->readData('cms_categories', [], ['category_id' => $cat_slug]);
        }
        else
        {
            $category = $this->readData('cms_categories', [], ['url_slug' => $cat_slug]);
        }
        if (count($category) > 0)
        {
            $articles = $this->readData($this->table, [], ['category_id' => $category[0]->category_id, 'status' => 1], '', $limit, $offset, ['created_at DESC']);
            return ['category_name' => $category[0]->short_name, 'articles' => $articles];
        }
        return [];
    }

    public function adminIndex($limit = 0, $offset = 0)
    {
        return $this->readData($this->table, [], [], '', $limit, $offset, ['id DESC']);
    }

    public function checkSlug($slug, $id = 0)
    {
        $chk = $this->readData($this->table,  [], ['url_slug' => $slug]);

        if (count($chk) > 0)
        {
            if($id > 0)
            {
                if ($chk[0]->id == $id)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        else
        {
            return true;
        }

    }

    public function store()
    {

        $this->validate();
        if (empty($this->errors) && count($this->errors) < 1)
        {
            $stmt = $this->insertData($this->table, $this->fillables, $this->values);
            if ($stmt){
                session_start();
                $this->message = ['success' => true, 'message' => 'Article saved successfully!!'];
                $_SESSION['success'] = $this->message;

                $article = $chk = $this->readData($this->table,  [], ['url_slug' => $_POST['url_slug']]);

                if (isset($_POST['continue']))
                {
                    if ($article)
                    {
                        header("Location: " . Root . "/edit.php?article=".$article[0]->id);
                    }
                    else
                    {
                        header("Location: " . Root . "/articles.php");
                    }
                }
                else
                {
                    header("Location: " . Root . "/articles.php");
                }
            }else {
                header("Location: ".Root."/create.php?error=url_slug");;
            }
        }
        else
        {
            session_start();
            $_SESSION['errors'] = $this->errors;
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }
    }

    public function update($id)
    {

        $this->validate($id);
        if (empty($this->errors) && count($this->errors) < 1)
        {
            $revision_history = $this->revisionHistory($id);
            if($revision_history)
            {
                $timestamp = date("Y-m-d H:i:s");
                $this->queryStr .= "revision_id = '$this->revision_id', updated_at = '$timestamp'";
            }

            $stmt = $this->updateData($this->table, $this->queryStr, $id);

            if ($stmt){
                session_start();
                $this->message = ['success' => true, 'message' => 'Article saved successfully!!'];
                $_SESSION['success'] = $this->message;
                header("Location: ".$_SERVER['HTTP_REFERER']);
            }
            return false;
        }
        else
        {
            session_start();
            $_SESSION['errors'] = $this->errors;
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }
    }

    public function destroy($id)
    {
        $action = 'delete';

        if (!$this->isOwner($id)) {
            return false; 
        }

        if (!$this->revisionHistory($id, $action)) {
            return false; 
        }

        return $this->updateData($this->table, "status = '-1'", $id);
    }


    public function isOwner($id)
    {
        session_start();
        if (Access::check("manager") == false)
        {
            $chk = $this->readData($this->table, [], ['author_id' => $_SESSION["id"], 'id' => $id]);
            if (count($chk) < 1)
            {
                return false;
            }
            return true;
        }
        return true;
    }


    public function search($keyword = null, $order_by = null, $limit = 0, $offset = 0)
    {
        $sql = 'SELECT * FROM `cms_articles` WHERE';
        if(isset($keyword) && !empty($keyword))
        {
            $sql .=  ' AND short_name LIKE "%'.$keyword.'%"';
        }

        if(isset($order_by) && !empty($order_by))
        {
            $sql .=  ' ORDER BY '.$order_by;
        }

        if ($limit > 0)
        {
            if($offset > 0)
            {
                $sql .= ' LIMIT ' . $limit.','.$offset;
            }
            else
            {
                $sql .= ' LIMIT ' . $limit;
            }
        }


        $query = $this->getConnection()->query($sql);

        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }

    public function validate($id = 0)
    {

        session_start();

        foreach($this->fillables as $field)
        {
            if(empty($_POST[$field]) && !in_array($field, $this->optional))
            {
                $this->errors[] = $field;
                if($field == "url_slug")
                {
                    if(!$this->checkSlug($_POST[$field], $id))
                    {
                        $this->errors[] = 'url_slug';
                    }
                }
            }
            else
            {
                $this->values[$field] = addslashes($_POST[$field]);

                if($field == "url_slug")
                {
                    if(!$this->checkSlug($this->values[$field], $id))
                    {
                        $this->errors[] = 'url_slug';
                    }
                }
                if($field == 'article_content')
                {
                    $this->values[$field] = addslashes($_POST[$field]);
                }
                if($field == 'author_id')
                {
                    session_start();
                    $this->values[$field] = $_SESSION['id'];
                }
                if($id > 0)
                {
                    if($field == 'author_id')
                    {
                        $uid = $_SESSION['id'];
                        $this->queryStr .= "$field = '$uid',";
                    }else{
                        $post = addslashes($_POST[$field]);
                        $this->queryStr .= "$field = '$post',";
                    }
                }
            }
        }
    }

    public function revisionHistory($article_id, $action = "")
    {
        $revisionTable = 'cms_articles_history';

        $articles = $this->readData($this->table, [], ['id' => $article_id]);
        if (!$articles) {
            return false; 
        }

        $this->revision_id = $articles[0]->revision_id + 1;
        $fieldsToCheck = $action === 'delete' ? ['status'] : $this->fillables;

        foreach ($fieldsToCheck as $field) {
            $newValue = $action === 'delete' ? '-1' : trim(strip_tags($this->values[$field] ?? ''));
            $oldValue = trim(strip_tags($articles[0]->$field ?? ''));

            if ($newValue === $oldValue) {
                continue;
            }

            $this->insertData(
                $revisionTable,
                ['revision_id', 'article_id', 'key_name', 'old_value', 'new_value'],
                [$this->revision_id, $article_id, $field, addslashes($oldValue), addslashes($newValue)]
            );
        }

        return true;
    }

}