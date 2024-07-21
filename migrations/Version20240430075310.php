<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240430075310 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE azul (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaires (id INT AUTO_INCREMENT NOT NULL, hotel_id INT NOT NULL, text VARCHAR(500) NOT NULL, INDEX IDX_D9BEC0C43243BB18 (hotel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C43243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE reservation CHANGE client_id_id client_id_id INT NOT NULL, CHANGE chambre_id_id chambre_id_id INT NOT NULL, CHANGE hotel_id_id hotel_id_id INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C43243BB18');
        $this->addSql('DROP TABLE azul');
        $this->addSql('DROP TABLE commentaires');
        $this->addSql('ALTER TABLE reservation CHANGE client_id_id client_id_id INT DEFAULT NULL, CHANGE chambre_id_id chambre_id_id INT DEFAULT NULL, CHANGE hotel_id_id hotel_id_id INT DEFAULT NULL');
    }
}
