<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211229173230 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE trick ADD user_id INT NOT NULL, ADD type_tricks_id INT NOT NULL, ADD create_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD update_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD main_picture VARCHAR(50) NOT NULL, CHANGE title title VARCHAR(45) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE trick DROP user_id, DROP type_tricks_id, DROP create_at, DROP update_at, DROP main_picture, CHANGE title title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
