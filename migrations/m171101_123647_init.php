<?php

use yii\db\Migration;

class m171101_123647_init extends Migration
{
    public function safeUp()
    {
        $this->execute("CREATE TABLE IF NOT EXISTS `cities` (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `name` VARCHAR(50) NULL DEFAULT NULL,
                PRIMARY KEY (`id`)
            )
            COLLATE='utf8_general_ci'
            ENGINE=InnoDB;");
        $this->execute("CREATE TABLE IF NOT EXISTS `distances` (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `from_city` INT(11) NOT NULL,
                `to_city` INT(11) NOT NULL,
                `distance` DECIMAL(10,3) NOT NULL,
                PRIMARY KEY (`id`),
                INDEX `distance` (`from_city`, `to_city`)
            )
            COLLATE='utf8_general_ci'
            ENGINE=InnoDB;");
        $this->execute("INSERT INTO `cities` (`id`, `name`) VALUES (1, 'Винница');
            INSERT INTO `cities` (`id`, `name`) VALUES (2, 'Днепропетровск');
            INSERT INTO `cities` (`id`, `name`) VALUES (3, 'Донецк');
            INSERT INTO `cities` (`id`, `name`) VALUES (4, 'Житомир');
            INSERT INTO `cities` (`id`, `name`) VALUES (5, 'Запорожье');
            INSERT INTO `cities` (`id`, `name`) VALUES (6, 'Ивано-Франковск');
            INSERT INTO `cities` (`id`, `name`) VALUES (7, 'Киев');
            INSERT INTO `cities` (`id`, `name`) VALUES (8, 'Кировоград');
            INSERT INTO `cities` (`id`, `name`) VALUES (9, 'Луганск');
            INSERT INTO `cities` (`id`, `name`) VALUES (10, 'Луцк');
            INSERT INTO `cities` (`id`, `name`) VALUES (11, 'Львов');
            INSERT INTO `cities` (`id`, `name`) VALUES (12, 'Николаев');
            INSERT INTO `cities` (`id`, `name`) VALUES (13, 'Одесса');
            INSERT INTO `cities` (`id`, `name`) VALUES (14, 'Полтава');
            INSERT INTO `cities` (`id`, `name`) VALUES (15, 'Ровно');
            INSERT INTO `cities` (`id`, `name`) VALUES (16, 'Симферополь');
            INSERT INTO `cities` (`id`, `name`) VALUES (17, 'Сумы');
            INSERT INTO `cities` (`id`, `name`) VALUES (18, 'Тернополь');
            INSERT INTO `cities` (`id`, `name`) VALUES (19, 'Ужгород');
            INSERT INTO `cities` (`id`, `name`) VALUES (20, 'Харьков');
            INSERT INTO `cities` (`id`, `name`) VALUES (21, 'Херсон');
            INSERT INTO `cities` (`id`, `name`) VALUES (22, 'Хмельницкий');
            INSERT INTO `cities` (`id`, `name`) VALUES (23, 'Черкассы');
            INSERT INTO `cities` (`id`, `name`) VALUES (24, 'Черновцы');
            INSERT INTO `cities` (`id`, `name`) VALUES (25, 'Чернигов');
            ");

    }

    public function safeDown()
    {
        echo "m171101_123647_init cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171101_123647_init cannot be reverted.\n";

        return false;
    }
    */
}
