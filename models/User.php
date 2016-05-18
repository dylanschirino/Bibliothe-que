<?php
/**
 * File: User.php
 * User: Dylan Schirino
 */
namespace Models;

class User extends Model
{
    protected $table = 'users';

    public function check($credentials)
    {
        $sql = 'SELECT * FROM users WHERE username=:username AND password=:password';
        $pdoSt = $this->cn->prepare($sql);
        $pdoSt->execute([
            ':username' => $credentials['username'],
            ':password' => $credentials['password']
        ]);

        return $pdoSt->fetch();
    }
}