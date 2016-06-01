<?php
/**
 * File: Editor.php
 * User: Dylan Schirino
 * Date: 25/05/16
 * Time: 17:03
 */
namespace Models;
class Editor extends Model
{
    protected $table = 'editor';

    public function getEditorsByBookId($id)
    {
        $sql = 'SELECT editor.* FROM editor JOIN book ON book.editor_id=editor.id JOIN author ON author.editor_id=editor.id WHERE editor.id= :id';
        $pdoSt = $this->cn->prepare($sql);
        $pdoSt->execute([':id' => $id]);
        return $pdoSt->fetchAll();
    }

    public function getEditorsByAuthorId($id)
    {
        $sql = ' SELECT DISTINCT editor.* FROM editor JOIN author ON (editor.id=editor_id) WHERE author.id = :id';
        $pdoSt = $this->cn->prepare($sql);
        $pdoSt->execute(['id' => $id]);
        return $pdoSt->fetchAll();
    }
}