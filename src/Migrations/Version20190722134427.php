<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190722134427 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE movie DROP lines_per_actor, DROP words_per_actor, DROP mentions_per_actor, DROP movies_per_year, DROP percent_of_fails');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE movie ADD lines_per_actor LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, ADD words_per_actor LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, ADD mentions_per_actor LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, ADD movies_per_year LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, ADD percent_of_fails LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
