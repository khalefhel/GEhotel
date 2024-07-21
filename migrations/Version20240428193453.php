<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240428193453 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE hotel_id (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation ADD hotel_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849559C905093 FOREIGN KEY (hotel_id_id) REFERENCES hotel (id)');
        $this->addSql('CREATE INDEX IDX_42C849559C905093 ON reservation (hotel_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE hotel_id');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849559C905093');
        $this->addSql('DROP INDEX IDX_42C849559C905093 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP hotel_id_id');
    }
}
