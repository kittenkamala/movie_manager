<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190722134213 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE script DROP title, DROP body, DROP actor_1, DROP actor_2, DROP lines_per_actor_2, DROP words_per_actor_2, DROP mentions_per_actor_2');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE script ADD title TINYTEXT NOT NULL COLLATE utf8mb4_unicode_ci, ADD body LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, ADD actor_1 LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, ADD actor_2 LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, ADD lines_per_actor_2 LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, ADD words_per_actor_2 LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, ADD mentions_per_actor_2 LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
