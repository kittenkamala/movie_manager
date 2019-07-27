<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190727195112 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE script CHANGE words_per_actor words_per_actor INT UNSIGNED DEFAULT 0, CHANGE movies_per_year movies_per_year INT UNSIGNED DEFAULT 0, CHANGE mentions_per_actor mentions_per_actor INT UNSIGNED DEFAULT 0, CHANGE percent_of_fails percent_of_fails INT UNSIGNED DEFAULT 0');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE script CHANGE words_per_actor words_per_actor LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE mentions_per_actor mentions_per_actor LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE movies_per_year movies_per_year LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE percent_of_fails percent_of_fails LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
