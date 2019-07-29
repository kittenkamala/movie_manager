<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190728220035 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE script ADD script_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE script ADD CONSTRAINT FK_1C81873A1382B1C8 FOREIGN KEY (script_id_id) REFERENCES movie (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1C81873A1382B1C8 ON script (script_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE script DROP FOREIGN KEY FK_1C81873A1382B1C8');
        $this->addSql('DROP INDEX UNIQ_1C81873A1382B1C8 ON script');
        $this->addSql('ALTER TABLE script DROP script_id_id');
    }
}
