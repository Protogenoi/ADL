<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180910095508 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE clients (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(10) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, dob DATE NOT NULL, email VARCHAR(255) DEFAULT NULL, phone_number VARCHAR(15) NOT NULL, alt_number VARCHAR(15) DEFAULT NULL, title2 VARCHAR(255) DEFAULT NULL, first_name2 VARCHAR(255) DEFAULT NULL, last_name2 VARCHAR(255) DEFAULT NULL, dob2 DATE DEFAULT NULL, email2 VARCHAR(255) DEFAULT NULL, address1 VARCHAR(255) NOT NULL, address2 VARCHAR(255) DEFAULT NULL, address3 VARCHAR(255) DEFAULT NULL, town VARCHAR(255) DEFAULT NULL, postcode VARCHAR(20) NOT NULL, owner VARCHAR(100) NOT NULL, added_by VARCHAR(100) NOT NULL, added_date DATETIME NOT NULL, updated_by VARCHAR(100) DEFAULT NULL, updated_date DATETIME DEFAULT NULL, dealsheet_id INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE clients');
    }
}
