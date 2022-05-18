<?php
/**
 * User: PaulTung
 * Date: 7/10/2020
 * Time: 8:07 AM
 */

class m0002_user_leve1 {
    public function up()
    {
        $db = \app\mvcCore\Application::$app->db;
        $db->pdo->exec("CREATE TABLE tbl_user_leve1 (
                          id			serial NOT NULL,
                          code		varchar(20),
                          name		varchar(60),
                          PRIMARY KEY (id)
                        );");
    }

    public function down()
    {
        $db = \app\mvcCore\Application::$app->db;
        $db->pdo->exec("DROP TABLE tbl_user_leve1;");
    }
}