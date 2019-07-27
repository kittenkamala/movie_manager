<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190727194129 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE script CHANGE lines_per_actor lines_per_actor INT UNSIGNED DEFAULT 0, CHANGE words_per_actor words_per_actor LONGTEXT NOT NULL, CHANGE movies_per_year movies_per_year LONGTEXT NOT NULL, CHANGE mentions_per_actor mentions_per_actor LONGTEXT NOT NULL, CHANGE percent_of_fails percent_of_fails LONGTEXT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE script CHANGE lines_per_actor lines_per_actor INT NOT NULL, CHANGE words_per_actor words_per_actor INT NOT NULL, CHANGE mentions_per_actor mentions_per_actor INT NOT NULL, CHANGE movies_per_year movies_per_year INT NOT NULL, CHANGE percent_of_fails percent_of_fails INT NOT NULL');
    }
}
