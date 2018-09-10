<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180910103415 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE policy ADD client_id INT NOT NULL');
        $this->addSql('ALTER TABLE policy ADD CONSTRAINT FK_F07D051619EB6921 FOREIGN KEY (client_id) REFERENCES clients (id)');
        $this->addSql('CREATE INDEX IDX_F07D051619EB6921 ON policy (client_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE policy DROP FOREIGN KEY FK_F07D051619EB6921');
        $this->addSql('DROP INDEX IDX_F07D051619EB6921 ON policy');
        $this->addSql('ALTER TABLE policy DROP client_id');
    }
}
