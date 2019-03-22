<?php
echo 1;
class Users extends AbstractTable
{

    protected $table_info = [
                        'table'     => 'users',
                        'columns'   => [                   
                            'huiii',
                            'colun2',
                            'colun3',
                            'colun4',
                            'colun5',
                        ]
    ];

    function __construct()
    {
        $this -> createTable();
    }

    protected function createTable()
    {
        $sql = <<<SQL
    CREATE TABLE IF NOT EXISTS  `users`(
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `login` VARCHAR(45) NOT NULL,
    `password` VARCHAR(45) NOT NULL,
    `email` VARCHAR(45) NOT NULL,
    `displayName` VARCHAR(45) NOT NULL,
    `role_id` INT(11) UNSIGNED NOT NULL ,
    PRIMARY KEY (`id`),
    CONSTRAINT `fk_role_id` FOREIGN KEY (`role_id`)
    REFERENCES `role` (`id`)
    ON UPDATE CASCADE ON
    DELETE CASCADE
    );
SQL;

        try {
            $res = $this->conn->exec($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}