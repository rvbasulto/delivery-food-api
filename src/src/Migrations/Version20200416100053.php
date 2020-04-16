<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200416100053 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_plate (menu_id INT NOT NULL, plate_id INT NOT NULL, INDEX IDX_E032F43CCCD7E912 (menu_id), INDEX IDX_E032F43CDF66E98B (plate_id), PRIMARY KEY(menu_id, plate_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plate (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, price DOUBLE PRECISION DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE menu_plate ADD CONSTRAINT FK_E032F43CCCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_plate ADD CONSTRAINT FK_E032F43CDF66E98B FOREIGN KEY (plate_id) REFERENCES plate (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE restaurant');
        $this->addSql('DROP TABLE shop');
        $this->addSql('ALTER TABLE access_token CHANGE user_id user_id INT DEFAULT NULL, CHANGE expires_at expires_at INT DEFAULT NULL, CHANGE scope scope VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE bussines_id bussines_id INT DEFAULT NULL, CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE salt salt VARCHAR(255) DEFAULT NULL, CHANGE last_login last_login DATETIME DEFAULT NULL, CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT NULL, CHANGE password_requested_at password_requested_at DATETIME DEFAULT NULL, CHANGE nif nif VARCHAR(255) DEFAULT NULL, CHANGE surnames surnames VARCHAR(255) DEFAULT NULL, CHANGE phone phone VARCHAR(255) DEFAULT NULL, CHANGE created_date created_date DATETIME DEFAULT NULL, CHANGE updated_date updated_date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE refresh_token CHANGE user_id user_id INT DEFAULT NULL, CHANGE expires_at expires_at INT DEFAULT NULL, CHANGE scope scope VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE auth_code CHANGE user_id user_id INT DEFAULT NULL, CHANGE expires_at expires_at INT DEFAULT NULL, CHANGE scope scope VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE bussines CHANGE payment_status_id payment_status_id INT DEFAULT NULL, CHANGE type type VARCHAR(255) DEFAULT NULL, CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE logo logo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE customer CHANGE created created DATE DEFAULT NULL, CHANGE updated updated DATE DEFAULT NULL, CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE surname surname VARCHAR(255) DEFAULT NULL, CHANGE dni dni VARCHAR(255) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE phone phone VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE images_place CHANGE place_id place_id INT DEFAULT NULL, CHANGE image image VARCHAR(255) DEFAULT NULL, CHANGE created created DATE DEFAULT NULL, CHANGE updated updated DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE menu ADD category_id INT DEFAULT NULL, ADD restaurant_id INT DEFAULT NULL, ADD created DATE DEFAULT NULL, ADD updated DATE DEFAULT NULL, CHANGE name name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A9312469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93B1E7706E FOREIGN KEY (restaurant_id) REFERENCES place (id)');
        $this->addSql('CREATE INDEX IDX_7D053A9312469DE2 ON menu (category_id)');
        $this->addSql('CREATE INDEX IDX_7D053A93B1E7706E ON menu (restaurant_id)');
        $this->addSql('ALTER TABLE `order` CHANGE status status VARCHAR(255) DEFAULT NULL, CHANGE discount discount DOUBLE PRECISION DEFAULT NULL, CHANGE total total DOUBLE PRECISION DEFAULT NULL, CHANGE created created DATE DEFAULT NULL, CHANGE updated updated DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE payment CHANGE payment_status_id payment_status_id INT DEFAULT NULL, CHANGE status status VARCHAR(255) DEFAULT NULL, CHANGE amount amount DOUBLE PRECISION DEFAULT NULL, CHANGE type type VARCHAR(255) DEFAULT NULL, CHANGE created created DATE DEFAULT NULL, CHANGE updated updated DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE payment_status CHANGE rate_id rate_id INT DEFAULT NULL, CHANGE created created DATE DEFAULT NULL, CHANGE updated updated DATE DEFAULT NULL, CHANGE next_payment next_payment DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE place ADD discr VARCHAR(255) NOT NULL, CHANGE bussines_id bussines_id INT DEFAULT NULL, CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE lat lat VARCHAR(255) DEFAULT NULL, CHANGE lng lng VARCHAR(255) DEFAULT NULL, CHANGE image image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE product CHANGE name name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE product_stock ADD shop_id INT DEFAULT NULL, CHANGE product_id product_id INT DEFAULT NULL, CHANGE quantity quantity INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product_stock ADD CONSTRAINT FK_EA6A2D3C4D16C4DD FOREIGN KEY (shop_id) REFERENCES place (id)');
        $this->addSql('CREATE INDEX IDX_EA6A2D3C4D16C4DD ON product_stock (shop_id)');
        $this->addSql('ALTER TABLE rate CHANGE price price DOUBLE PRECISION DEFAULT NULL, CHANGE type type VARCHAR(255) DEFAULT NULL, CHANGE name name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE rider CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE surname surname VARCHAR(255) DEFAULT NULL, CHANGE dni dni VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A9312469DE2');
        $this->addSql('ALTER TABLE menu_plate DROP FOREIGN KEY FK_E032F43CDF66E98B');
        $this->addSql('CREATE TABLE restaurant (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, lat DOUBLE PRECISION DEFAULT \'NULL\', lng DOUBLE PRECISION DEFAULT \'NULL\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE shop (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE menu_plate');
        $this->addSql('DROP TABLE plate');
        $this->addSql('ALTER TABLE access_token CHANGE user_id user_id INT DEFAULT NULL, CHANGE expires_at expires_at INT DEFAULT NULL, CHANGE scope scope VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE auth_code CHANGE user_id user_id INT DEFAULT NULL, CHANGE expires_at expires_at INT DEFAULT NULL, CHANGE scope scope VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE bussines CHANGE payment_status_id payment_status_id INT DEFAULT NULL, CHANGE type type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE logo logo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE customer CHANGE created created DATE DEFAULT \'NULL\', CHANGE updated updated DATE DEFAULT \'NULL\', CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE surname surname VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE dni dni VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE phone phone VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE images_place CHANGE place_id place_id INT DEFAULT NULL, CHANGE image image VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE created created DATE DEFAULT \'NULL\', CHANGE updated updated DATE DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93B1E7706E');
        $this->addSql('DROP INDEX IDX_7D053A9312469DE2 ON menu');
        $this->addSql('DROP INDEX IDX_7D053A93B1E7706E ON menu');
        $this->addSql('ALTER TABLE menu DROP category_id, DROP restaurant_id, DROP created, DROP updated, CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE `order` CHANGE status status VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE discount discount DOUBLE PRECISION DEFAULT \'NULL\', CHANGE total total DOUBLE PRECISION DEFAULT \'NULL\', CHANGE created created DATE DEFAULT \'NULL\', CHANGE updated updated DATE DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE payment CHANGE payment_status_id payment_status_id INT DEFAULT NULL, CHANGE status status VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE amount amount DOUBLE PRECISION DEFAULT \'NULL\', CHANGE type type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE created created DATE DEFAULT \'NULL\', CHANGE updated updated DATE DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE payment_status CHANGE rate_id rate_id INT DEFAULT NULL, CHANGE created created DATE DEFAULT \'NULL\', CHANGE updated updated DATE DEFAULT \'NULL\', CHANGE next_payment next_payment DATE DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE place DROP discr, CHANGE bussines_id bussines_id INT DEFAULT NULL, CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE lat lat VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE lng lng VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE image image VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE product CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE product_stock DROP FOREIGN KEY FK_EA6A2D3C4D16C4DD');
        $this->addSql('DROP INDEX IDX_EA6A2D3C4D16C4DD ON product_stock');
        $this->addSql('ALTER TABLE product_stock DROP shop_id, CHANGE product_id product_id INT DEFAULT NULL, CHANGE quantity quantity INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rate CHANGE price price DOUBLE PRECISION DEFAULT \'NULL\', CHANGE type type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE refresh_token CHANGE user_id user_id INT DEFAULT NULL, CHANGE expires_at expires_at INT DEFAULT NULL, CHANGE scope scope VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE rider CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE surname surname VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE dni dni VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE bussines_id bussines_id INT DEFAULT NULL, CHANGE salt salt VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE last_login last_login DATETIME DEFAULT \'NULL\', CHANGE confirmation_token confirmation_token VARCHAR(180) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE password_requested_at password_requested_at DATETIME DEFAULT \'NULL\', CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE nif nif VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE surnames surnames VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE phone phone VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE created_date created_date DATETIME DEFAULT \'NULL\', CHANGE updated_date updated_date DATETIME DEFAULT \'NULL\'');
    }
}
