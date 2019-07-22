<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190722033458 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE script ADD actor_1 LONGTEXT NOT NULL, ADD actor_2 LONGTEXT NOT NULL, ADD lines_per_actor_2 LONGTEXT NOT NULL, ADD words_per_actor_2 LONGTEXT NOT NULL, ADD mentions_per_actor LONGTEXT NOT NULL, ADD mentions_per_actor_2 LONGTEXT NOT NULL, ADD percent_of_fails LONGTEXT NOT NULL, DROP number_of_mentions, DROP loss_metrics');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE script ADD number_of_mentions LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, ADD loss_metrics LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, DROP actor_1, DROP actor_2, DROP lines_per_actor_2, DROP words_per_actor_2, DROP mentions_per_actor, DROP mentions_per_actor_2, DROP percent_of_fails');
    }
}
