<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190722054035 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE movie ADD body LONGTEXT NOT NULL, ADD lines_per_actor LONGTEXT NOT NULL, ADD words_per_actor LONGTEXT NOT NULL, ADD mentions_per_actor LONGTEXT NOT NULL, ADD movies_per_year LONGTEXT NOT NULL, ADD percent_of_fails LONGTEXT NOT NULL, DROP actor_name_1, DROP actor_name_2');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE movie ADD actor_name_1 LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, ADD actor_name_2 LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, DROP body, DROP lines_per_actor, DROP words_per_actor, DROP mentions_per_actor, DROP movies_per_year, DROP percent_of_fails');
    }
}
