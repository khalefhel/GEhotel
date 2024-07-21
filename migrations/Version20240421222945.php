<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240421222945 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chambre ADD hotel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE chambre ADD CONSTRAINT FK_C509E4FF3243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id)');
        $this->addSql('CREATE INDEX IDX_C509E4FF3243BB18 ON chambre (hotel_id)');
        $this->addSql('ALTER TABLE reservation ADD client_id_id INT NOT NULL, ADD chambre_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955DC2902E0 FOREIGN KEY (client_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849552680A339 FOREIGN KEY (chambre_id_id) REFERENCES chambre (id)');
        $this->addSql('CREATE INDEX IDX_42C84955DC2902E0 ON reservation (client_id_id)');
        $this->addSql('CREATE INDEX IDX_42C849552680A339 ON reservation (chambre_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chambre DROP FOREIGN KEY FK_C509E4FF3243BB18');
        $this->addSql('DROP INDEX IDX_C509E4FF3243BB18 ON chambre');
        $this->addSql('ALTER TABLE chambre DROP hotel_id');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955DC2902E0');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849552680A339');
        $this->addSql('DROP INDEX IDX_42C84955DC2902E0 ON reservation');
        $this->addSql('DROP INDEX IDX_42C849552680A339 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP client_id_id, DROP chambre_id_id');
    }
}
