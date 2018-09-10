<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180910105547 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE aegon_policy (id INT AUTO_INCREMENT NOT NULL, reference VARCHAR(100) NOT NULL, app_id VARCHAR(45) DEFAULT NULL, type VARCHAR(45) DEFAULT NULL, premium NUMERIC(5, 2) DEFAULT NULL, commission NUMERIC(10, 2) DEFAULT NULL, non_idem_comm NUMERIC(10, 2) DEFAULT NULL, drip NUMERIC(10, 2) DEFAULT NULL, cover_amount NUMERIC(10, 2) DEFAULT NULL, term VARCHAR(45) DEFAULT NULL, cb_term VARCHAR(45) DEFAULT NULL, comm_type VARCHAR(45) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE policy ADD aegon_policy_id INT NOT NULL');
        $this->addSql('ALTER TABLE policy ADD CONSTRAINT FK_F07D05168CB3C444 FOREIGN KEY (aegon_policy_id) REFERENCES aegon_policy (id)');
        $this->addSql('CREATE INDEX IDX_F07D05168CB3C444 ON policy (aegon_policy_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE policy DROP FOREIGN KEY FK_F07D05168CB3C444');
        $this->addSql('DROP TABLE aegon_policy');
        $this->addSql('DROP INDEX IDX_F07D05168CB3C444 ON policy');
        $this->addSql('ALTER TABLE policy DROP aegon_policy_id');
    }
}
