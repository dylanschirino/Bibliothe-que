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
        $sql = 'SELECT editor.* FROM editor JOIN book ON (editor.id=editor_id) WHERE book.id= :id';
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
    public function updateEditors($id,$society,$description){
        $sql = 'UPDATE editor
                SET   society = :society,
                      description = :description
                WHERE id = :id';
        $pdost = $this->cn->prepare($sql);
        $pdost->execute([
            ':society' => $society,
            ':description' => $description,
            ':id' => $id
        ]);
    }
}