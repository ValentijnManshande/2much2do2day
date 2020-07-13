<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200713075056 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE task_list DROP FOREIGN KEY FK_377B6C637E3C61F9');
        $this->addSql('DROP INDEX IDX_377B6C637E3C61F9 ON task_list');
        $this->addSql('ALTER TABLE task_list CHANGE updated_at updated_at DATETIME DEFAULT NULL, CHANGE owner_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE task_list ADD CONSTRAINT FK_377B6C63A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_377B6C63A76ED395 ON task_list (user_id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE task_list DROP FOREIGN KEY FK_377B6C63A76ED395');
        $this->addSql('DROP INDEX IDX_377B6C63A76ED395 ON task_list');
        $this->addSql('ALTER TABLE task_list CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\', CHANGE user_id owner_id INT NOT NULL');
        $this->addSql('ALTER TABLE task_list ADD CONSTRAINT FK_377B6C637E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_377B6C637E3C61F9 ON task_list (owner_id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
