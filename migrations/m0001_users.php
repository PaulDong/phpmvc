<?php
/**
 * User: PaulTung
 * Date: 7/10/2020
 * Time: 8:07 AM
 */

class m0001_users {
    public function up()
    {
        $db = \app\mvcCore\Application::$app->db;
        $SQL = "CREATE TABLE tbl_users (
                  user_id			MEDIUMINT NOT NULL AUTO_INCREMENT,
                  domain_id		integer NOT NULL DEFAULT -1,
                  firstname		varchar(100),
                  lastname		varchar(100),
                  password		varchar(120) NOT NULL DEFAULT '',
                  user_remind		varchar(120) NOT NULL DEFAULT '',
                  email		varchar(100) NOT NULL DEFAULT '',
                  user_leve1		SMALLINT DEFAULT 5 NOT NULL,
                  PRIMARY KEY (user_id)
                );";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \app\mvcCore\Application::$app->db;
        $SQL = "DROP TABLE tbl_users;";
        $db->pdo->exec($SQL);
    }
}